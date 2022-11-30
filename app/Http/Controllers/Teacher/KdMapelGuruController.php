<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\KdMapel;
use App\Models\Pembelajaran;
use App\Models\Kelas;
use App\Models\Tapel;
use App\Models\Subject;
use App\Models\Teacher;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KdMapelGuruController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Capaian Kompetensi';
        $tapel = Tapel::findorfail(session()->get('tapel_id'));

        $guru = Teacher::where('user_id', Auth::user()->id)->first();
        $id_kelas = Kelas::where('tapel_id', $tapel->id)->get('id');

        $id_mapel_diampu = Pembelajaran::where('teacher_id', $guru->id)->whereIn('kelas_id', $id_kelas)->where('status', 1)->get('subject_id');
        $id_kelas_diampu = Pembelajaran::where('teacher_id', $guru->id)->whereIn('kelas_id', $id_kelas)->where('status', 1)->get('kelas_id');
        $tingkatan_kelas_diampu = Kelas::whereIn('id', $id_kelas_diampu)->groupBy('class_level')->get('class_level');

        $data_mapel_diampu = Subject::whereIn('id', $id_mapel_diampu)->get();

        $data_kd = KdMapel::whereIn('subject_id', $id_mapel_diampu)->whereIn('class_level', $tingkatan_kelas_diampu)->get();

        return view('teacher.ck.index', compact('title', 'data_mapel_diampu', 'tingkatan_kelas_diampu', 'data_kd'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'subject_id' => 'required',
            'class_level' => 'required',
        ]);
        if ($validator->fails()) {
            $notifError = array
            (
                'message' => $validator->messages()->all()[0],
                'alert-type' => 'error'
            );
            return back()->with($notifError)->withInput();
        } else {
            $title = 'Tambah Capaian Kompetensi';
            $mapel_id = $request->subject_id;
            $tingkatan_kelas = $request->class_level;

            $tapel = Tapel::findorfail(session()->get('tapel_id'));
            $guru = Teacher::where('user_id', Auth::user()->id)->first();
            $id_kelas = Kelas::where('tapel_id', $tapel->id)->get('id');

            $id_mapel_diampu = Pembelajaran::where('teacher_id', $guru->id)->whereIn('kelas_id', $id_kelas)->where('status', 1)->get('subject_id');
            $id_kelas_diampu = Pembelajaran::where('teacher_id', $guru->id)->whereIn('kelas_id', $id_kelas)->where('status', 1)->get('kelas_id');
            $tingkatan_kelas_diampu = Kelas::whereIn('id', $id_kelas_diampu)->groupBy('class_level')->get('class_level');

            $data_mapel_diampu = Subject::whereIn('id', $id_mapel_diampu)->get();

            return view('teacher.ck.create', compact('title', 'mapel_id', 'tingkatan_kelas', 'tapel', 'data_mapel_diampu', 'tingkatan_kelas_diampu'));
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
            'kode_kd.*' => 'required|min:2|max:10',
            'kompetensi_dasar.*' => 'required|min:10|max:255',
            'ringkasan_kompetensi.*' => 'required|min:10|max:150',
        ]);
        if ($validator->fails()) {
            $notifError = array
            (
                'message' => $validator->messages()->all()[0],
                'alert-type' => 'error'
            );
            return back()->with($notifError)->withInput();
        } else {
            for ($count = 0; $count < count($request->kode_kd); $count++) {
                $data_kd = array(
                    'subject_id'  => $request->subject_id,
                    'class_level'  => $request->class_level,
                    'semester'  => $request->semester,
                    'tipe'  => $request->tipe[$count],
                    'kode_kd'  => $request->kode_kd[$count],
                    'kompetensi_dasar'  => $request->kompetensi_dasar[$count],
                    'ringkasan_kompetensi'  => $request->ringkasan_kompetensi[$count],
                    'created_at'  => Carbon::now(),
                    'updated_at'  => Carbon::now(),
                );
                $store_data_kd[] = $data_kd;
            }
            KdMapel::insert($store_data_kd);
            $notifSuccess = array
            (
                'message' => 'Data kompetensi berhasil ditambahkan',
                'alert-type' => 'success'
            );
            return redirect('teacher/ck')->with($notifSuccess);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KdMapelGuru  $kdmapelguru
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kompetensi_dasar' => 'required|min:10|max:255',
            'ringkasan_kompetensi' => 'required|min:10|max:150',
        ]);
        if ($validator->fails()) {
            $notifError = array
            (
                'message' => $validator->messages()->all()[0],
                'alert-type' => 'error'
            );
            return back()->with($notifError)->withInput();
        } else {
            $kd = KdMapel::findorfail($id);
            $data_kd = [
                'kompetensi_dasar' => $request->kompetensi_dasar,
                'ringkasan_kompetensi' => $request->ringkasan_kompetensi,
            ];
            $kd->update($data_kd);
            $notifSuccess = array
            (
                'message' => 'Data kompetensi berhasil diubah',
                'alert-type' => 'success'
            );
            return back()->with($notifSuccess);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KdMapel  $kdMapel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kd = KdMapel::findorfail($id);
        try {
            $kd->delete();
            $notifSuccess = array
            (
                'message' => 'Data kompetensi berhasil dihapus',
                'alert-type' => 'success'
            );
            return back()->with($notifSuccess);
        } catch (\Throwable $th) {
            $notifError = array
            (
                'message' => 'Data kompetensi tidak dapat hapus',
                'alert-type' => 'error'
            );
            return back()->with($notifError);
        }
    }
}
