<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pembelajaran;
use App\Models\Tapel;
use App\Models\Kelas;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Http\Request;
use Carbon\Carbon;



class PembelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tapel = Tapel::findorfail(session()->get('tapel_id'));
        $data_mapel = Subject::where('tapel_id', $tapel->id)->orderBy('subject_name', 'ASC')->get();
        $data_kelas = Kelas::where('tapel_id', $tapel->id)->orderBy('class_level', 'ASC')->get();

        if (count($data_mapel) == 0) {
            return redirect('admin/subjects')->with('warning', 'Mohon isikan data mata pelajaran');
        } elseif (count($data_kelas) == 0) {
            return redirect('admin/kelas')->with('warning', 'Mohon isikan data kelas');
        } else {
            $title = 'Data Pembelajaran';
            $id_kelas = Kelas::where('tapel_id', $tapel->id)->orderBy('class_level', 'ASC')->get('id');
            $data_pembelajaran = Pembelajaran::whereIn('kelas_id', $id_kelas)->whereNotNull('teacher_id')->where('status', 1)->orderBy('kelas_id', 'ASC')->get();
            return view('admin.pembelajaran.index', compact('title', 'data_kelas', 'data_pembelajaran'));
        }
    }

    public function settings(Request $request)
    {
        $title = 'Setting Pembelajaran';
        $tapel = Tapel::findorfail(session()->get('tapel_id'));
        $kelas = Kelas::findorfail($request->kelas_id);
        $data_kelas = Kelas::where('tapel_id', $tapel->id)->orderBy('class_level', 'ASC')->get();

        $data_pembelajaran_kelas = Pembelajaran::where('kelas_id', $request->kelas_id)->get();
        $mapel_id_pembelajaran_kelas = Pembelajaran::where('kelas_id', $request->kelas_id)->get('subject_id');
        $data_mapel = Subject::whereNotIn('id', $mapel_id_pembelajaran_kelas)->get();
        $data_guru = Teacher::orderBy('full_name', 'ASC')->get();
        return view('admin.pembelajaran.settings', compact('title', 'tapel', 'kelas', 'data_kelas', 'data_pembelajaran_kelas', 'data_mapel', 'data_guru'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        if (!is_null($request->pembelajaran_id)) {
            for ($count = 0; $count < count($request->pembelajaran_id); $count++) {
                $pembelajaran = Pembelajaran::findorfail($request->pembelajaran_id[$count]);
                $update_data = array(
                    'teacher_id'  => $request->update_teacher_id[$count],
                    'status'  => $request->update_status[$count]
                );
                $pembelajaran->update($update_data);
            }
            if (!is_null($request->subject_id)) {
                for ($count = 0; $count < count($request->subject_id); $count++) {
                    $data_baru = array(
                        'kelas_id'  => $request->kelas_id[$count],
                        'subject_id'  => $request->subject_id[$count],
                        'teacher_id'  => $request->teacher_id[$count],
                        'status'  => $request->status[$count],
                        'created_at'  => Carbon::now(),
                        'updated_at'  => Carbon::now(),
                    );
                    $store_data_baru[] = $data_baru;
                }
                Pembelajaran::insert($store_data_baru);
            }
        } else {
            for ($count = 0; $count < count($request->subject_id); $count++) {
                $data_baru = array(
                    'kelas_id'  => $request->kelas_id[$count],
                    'subject_id'  => $request->subject_id[$count],
                    'teacher_id'  => $request->teacher_id[$count],
                    'status'  => $request->status[$count],
                    'created_at'  => Carbon::now(),
                    'updated_at'  => Carbon::now(),
                );
                $store_data_baru[] = $data_baru;
            }
            Pembelajaran::insert($store_data_baru);
        }
        $notifSuccess = array
            (
                'message' => 'Setting Pembelajaran Berhasil',
                'alert-type' => 'success'
            );
        return redirect('admin/pembelajaran')->with($notifSuccess);
    }
}
