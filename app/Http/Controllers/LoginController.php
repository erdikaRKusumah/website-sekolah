<?php

namespace App\Http\Controllers;

use App\Models\Tapel;
use App\Models\User;
use App\Models\Teacher;
use App\Models\Kelas;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        $data_tapel = Tapel::orderBy('id', 'DESC')->get();
        if (count($data_tapel) == 0) {
            $title = 'Setting Tahun Pelajaran';
            return view('auth.setting_tapel', compact('title'));
        } else {
            $title = 'Login';
            return view('auth.login', compact('title', 'data_tapel'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|exists:users',
            'password' => 'required',
            'school_year' => 'required'
        ]);
        if ($validator->fails()) {
            $notifError = array
            (
                'message' => $validator->messages()->all()[0],
                'alert-type' => 'error'
            );
            return back()->with($notifError)->withInput();
        } else {
            if (!Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
                $notifError = array
                (
                    'message' => 'Password salah!',
                    'alert-type' => 'error'
                );
                return back()->with($notifError);
            } else {
                session([
                    'tapel_id' => $request->school_year,
                ]);
                if (Auth::user()->role == 2) {
                    session([
                        'akses_sebagai' => 'Guru Mapel',
                    ]);
                }
                $notifSuccess = array
                (
                    'message' => 'Login berhasil',
                    'alert-type' => 'success'
                );
                return redirect('/dashboard')->with($notifSuccess);
            }
        }
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required|exists:users',
            'password' => 'required',
            'school_year' => 'required'

        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        $notifError = array
        (
            'message' => 'Login gagal',
            'alert-type' => 'Error'
        );
        return back()->with($notifError);
    }

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken( );

        return redirect('/');

    }

    public function setting_tapel(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'school_year' => 'required|min:9|max:9',
            'semester' => 'required',
        ]);
        if ($validator->fails()) {
            $notifError = array
            (
                'message' => $validator->messages()->all()[0],
                'alert-type' => 'error'
            );
            return back()->with($notifError)->withInput();
        } else {
            $tapel = new Tapel([
                'school_year' => $request->school_year,
                'semester' => $request->semester,
            ]);
            $tapel->save();
            $notifSuccess = array
            (
                'message' => 'Registrasi Berhasil',
                'alert-type' => 'success'
            );
            return back()->with($notifSuccess);
        }
    }

    public function view_ganti_password()
    {
        $title = 'Ganti Password';
        return view('auth.ganti_password', compact('title'));
    }

    public function ganti_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'password_lama' => ['required', new MatchOldPassword],
            'password_baru' => 'required|min:6',
            'konfirmasi_password' => 'required|same:password_baru',
        ]);

        if ($validator->fails()) {
            $notifError = array
            (
                'message' => $validator->messages()->all()[0],
                'alert-type' => 'error'
            );
            return back()->with($notifError)->withInput();
        } else {
            $user = User::findorfail(Auth::id());
            $data = [
                'password' => bcrypt($request->password_baru),
            ];
            $user->update($data);
            Auth::logout();
            $notifSuccess = array
            (
                'message' => 'Password berhasil diganti, silahkan login!',
                'alert-type' => 'success'
            );
            return redirect('/login')->with($notifSuccess);
        }
    }

    public function ganti_akses()
    {
        if (session()->get('akses_sebagai') == 'Guru Mapel') {
            $guru = Teacher::where('user_id', Auth::id())->first();
            $cek_wali_kelas = Kelas::where('teacher_id', $guru->id)->first();
            if (!is_null($cek_wali_kelas)) {
                session()->put([
                    'akses_sebagai' => 'Wali Kelas',
                ]);
                $notifSuccess = array
                (
                    'message' => 'Akses wali kelas berhasil',
                    'alert-type' => 'success'
                );
                return redirect('/dashboard')->with($notifSuccess);
            } else {
                $notifError = array
                (
                    'message' => 'Anda tidak memiliki akses sebagai wali kelas',
                    'alert-type' => 'error'
                );
                return back()->with($notifError);
            }
        } else {
            session()->put([
                'akses_sebagai' => 'Guru Mapel',
            ]);
            $notifSuccess = array
                (
                    'message' => 'Akses guru mapel berhasil',
                    'alert-type' => 'success'
                );
            return redirect('/dashboard')->with($notifSuccess);
        }
    }
}
