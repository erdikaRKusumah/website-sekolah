<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KdMapel;
use App\Models\Kelas;
use App\Models\Tapel;
use App\Models\Subject;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KdMapelController extends Controller
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
        $data_mapel = Subject::where('tapel_id', $tapel->id)->orderBy('subject_name', 'ASC')->get();
        $id_mapel = Subject::where('tapel_id', $tapel->id)->get('id');

        $data_kelas = Kelas::where('tapel_id', $tapel->id)->groupBy('class_level')->orderBy('class_level', 'ASC')->get();

        if (count($data_mapel) == 0) {
            $notifWarning = array
            (
                'message' => 'Mohon isikan data mata pelajaran',
                'alert-type' => 'warning'
            );
            return redirect('admin/subjects')->with($notifWarning);
        } elseif (count($data_kelas) == 0) {
            $notifWarning = array
            (
                'message' => 'Mohon isikan data kelas',
                'alert-type' => 'warning'
            );
            return redirect('admin/kelas')->with($notifWarning);
        } else {
            $data_kd = KdMapel::whereIn('subject_id', $id_mapel)->get();
            return view('admin.kd.index', compact('title', 'data_mapel', 'data_kelas', 'data_kd'));
        }
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
            $data_mapel = Subject::where('tapel_id', $tapel->id)->orderBy('subject_name', 'ASC')->get();
            $data_kelas = Kelas::where('tapel_id', $tapel->id)->groupBy('class_level')->orderBy('class_level', 'ASC')->get();
            return view('admin.kd.create', compact('title', 'mapel_id', 'tingkatan_kelas', 'tapel', 'data_mapel', 'data_kelas'));
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
            for ($count = 0; $count < count($request->tipe); $count++) {
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
            return redirect('admin/kd')->with($notifSuccess);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KdMapel  $kdmapel
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
