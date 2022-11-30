<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KkmMapel;
use App\Models\Subject;
use App\Models\Tapel;
use App\Models\Pembelajaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KkmMapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'KKM Mata Pelajaran';
        $tapel = Tapel::findorfail(session()->get('tapel_id'));
        $data_mapel = Subject::where('tapel_id', $tapel->id)->orderBy('subject_name', 'ASC')->get();
        $id_mapel = Subject::where('tapel_id', $tapel->id)->get('id');

        $cek_pembelajaran = Pembelajaran::whereIn('subject_id', $id_mapel)->whereNotNull('teacher_id')->where('status', 1)->get();
        if (count($cek_pembelajaran) == 0) {
            $notifWarning = array
            (
                'message' => 'Mohon isikan data pembelajaran',
                'alert-type' => 'warning'
            );
            return redirect('admin/pembelajaran')->with($notifWarning);
        } else {
            $data_kkm = KkmMapel::whereIn('subject_id', $id_mapel)->get();
            return view('admin.kkm.index', compact('title', 'data_mapel', 'data_kkm'));
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
            'subject_id' => 'required',
            'kelas_id' => 'required',
            'kkm' => 'required|numeric|between:0,100',
        ]);
        if ($validator->fails()) {
            $notifError = array
            (
                'message' => $validator->messages()->all()[0],
                'alert-type' => 'error'
            );
            return back()->with($notifError)->withInput();
        } else {
            $cek_kkm = KkmMapel::where('subject_id', $request->subject_id)->where('kelas_id', $request->kelas_id)->first();
            if (is_null($cek_kkm)) {
                $kkm = new KkmMapel([
                    'subject_id' => $request->subject_id,
                    'kelas_id' => $request->kelas_id,
                    'kkm' => ltrim($request->kkm),
                ]);
                $kkm->save();
                $notifSuccess = array
                (
                    'message' => 'KKM berhasil ditambahkan',
                    'alert-type' => 'success'
                );
                return back()->with($notifSuccess);
            } else {
                $notifError = array
                (
                    'message' => 'Data KKM sudah ada!',
                    'alert-type' => 'error'
                );
                return back()->with($notifError);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\KkmMapel  $kkmMapel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kkm' => 'required|numeric|between:0,100',
        ]);
        if ($validator->fails()) {
            $notifError = array
            (
                'message' => $validator->messages()->all()[0],
                'alert-type' => 'error'
            );
            return back()->with($notifError)->withInput();
        } else {
            $kkm = KkmMapel::findorfail($id);
            $data = [
                'kkm' => ltrim($request->kkm),
            ];
            $kkm->update($data);
            $notifSuccess = array
                (
                    'message' => 'KKM berhasil diedit',
                    'alert-type' => 'success'
                );
            return back()->with($notifSuccess);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KkmMapel  $kkmMapel
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kkm = KkmMapel::findorfail($id);
        try {
            $kkm->delete();
            $notifSuccess = array
                (
                    'message' => 'KKM berhasil dihapus',
                    'alert-type' => 'success'
                );
            return back()->with($notifSuccess);
        } catch (\Throwable $th) {
            $notifWarning = array
                (
                    'message' => 'KKM tidak dapat dihapus',
                    'alert-type' => 'warning'
                );
            return back()->with($notifWarning);
        }
    }
}
