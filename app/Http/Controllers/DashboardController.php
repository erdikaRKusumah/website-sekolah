<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Tapel;
use App\Models\Teacher;
use App\Models\Student;
use App\Models\Kelas;
use App\Models\Pembelajaran;
use App\Models\ClassGroup;
use App\Models\NilaiAkhirRapot;
use App\Models\Extracurricular;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Dashboard';
        $tapel = Tapel::findorfail(session()->get('tapel_id'));

        if (Auth::user()->role == 1) {
            $jumlah_guru = Teacher::all()->count();
            $jumlah_siswa = Student::where('status', 1)->count();
            $jumlah_kelas = Kelas::where('tapel_id', $tapel->id)->count();
            $jumlah_ekstrakulikuler = Extracurricular::all()->count();
            $announcements = DB::table("posts")->select('body', 'updated_at', 'title', 'created_at')->where('category_id', 5)->get();

            return view('dashboard.admin', compact(
                'title',
                'tapel',
                'jumlah_ekstrakulikuler',
                'announcements',
                'jumlah_guru',
                'jumlah_siswa',
                'jumlah_kelas'
            ));
        } elseif (Auth::user()->role == 2) {
            $guru = Teacher::where('user_id', Auth::user()->id)->first();

            // Dashboard Guru Mapel
            if (session()->get('akses_sebagai') == 'Guru Mapel') {
                $id_kelas = Kelas::where('tapel_id', $tapel->id)->get('id');

                $jumlah_kelas_diampu = count(Pembelajaran::where('teacher_id', $guru->id)->whereIn('kelas_id', $id_kelas)->where('status', 1)->groupBy('kelas_id')->get());
                $jumlah_mapel_diampu = count(Pembelajaran::where('teacher_id', $guru->id)->whereIn('kelas_id', $id_kelas)->where('status', 1)->groupBy('subject_id')->get());

                $id_kelas_diampu = Pembelajaran::where('teacher_id', $guru->id)->whereIn('kelas_id', $id_kelas)->where('status', 1)->groupBy('kelas_id')->get('kelas_id');
                $jumlah_siswa_diampu = ClassGroup::whereIn('kelas_id', $id_kelas_diampu)->count();

                $data_capaian_penilaian = Pembelajaran::where('teacher_id', $guru->id)->whereIn('kelas_id', $id_kelas)->where('status', 1)->get();

                $announcements = DB::table("posts")->select('body', 'updated_at', 'title', 'created_at')->where('category_id', 5)->get();

                return view('dashboard.teacher', compact(
                    'title',
                    'tapel',
                    'announcements',
                    'jumlah_kelas_diampu',
                    'jumlah_mapel_diampu',
                    'jumlah_siswa_diampu',
                    'data_capaian_penilaian'
                ));
            } elseif (session()->get('akses_sebagai') == 'Wali Kelas') {

                $id_kelas_diampu = Kelas::where('tapel_id', $tapel->id)->where('teacher_id', $guru->id)->get('id');
                $jumlah_anggota_kelas = count(ClassGroup::whereIn('kelas_id', $id_kelas_diampu)->get());

                $id_pembelajaran_kelas = Pembelajaran::whereIn('kelas_id', $id_kelas_diampu)->where('status', 1)->get('id');
                //Kurikulum Merdeka
                $jumlah_kirim_nilai = count(NilaiAkhirRapot::whereIn('pembelajaran_id', $id_pembelajaran_kelas)->groupBy('pembelajaran_id')->get());
                $announcements = DB::table("posts")->select('body', 'updated_at', 'title', 'created_at')->where('category_id', 5)->get();

                // Dashboard Wali Kelas
                return view('dashboard.walikelas', compact(
                    'title',
                    'tapel',
                    'announcements',
                    'jumlah_anggota_kelas',
                    'jumlah_kirim_nilai'
                ));
            }
        } elseif (Auth::user()->role == 3) {

            $siswa = Student::where('user_id', Auth::user()->id)->first();

            $data_id_kelas = Kelas::where('tapel_id', $tapel->id)->get('id');

            $anggota_kelas = ClassGroup::whereIn('kelas_id', $data_id_kelas)->where('student_id', $siswa->id)->first();
            if (is_null($anggota_kelas)) {
                $jumlah_mapel = '-';
            } else {
                $jumlah_mapel = Pembelajaran::where('kelas_id', $anggota_kelas->kelas->id)->where('status', 1)->count();
            }

            $announcements = DB::table("posts")->select('body', 'updated_at', 'title', 'created_at')->where('category_id', 5)->get();

            return view('dashboard.student', compact(
                'title',
                'tapel',
                'jumlah_mapel',
                'announcements'
            ));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
