<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\RencanaBobotPenilaian;
use App\Models\Teacher;
use App\Models\Pembelajaran;
use App\Models\Kelas;
use App\Models\Tapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class RencanaBobotPenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Rencana Bobot Sumatif PTS & PAS';
        $tapel = Tapel::findorfail(session()->get('tapel_id'));

        $guru = Teacher::where('user_id', Auth::user()->id)->first();
    $id_kelas = Kelas::where('tapel_id', $tapel->id)->get('id');

        $data_rencana_bobot_nilai = Pembelajaran::where('teacher_id', $guru->id)->whereIn('kelas_id', $id_kelas)->where('status', 1)->orderBy('subject_id', 'ASC')->orderBy('kelas_id', 'ASC')->get();
        foreach ($data_rencana_bobot_nilai as $penilaian) {
            $bobot = RencanaBobotPenilaian::where('pembelajaran_id', $penilaian->id)->first();
            if (is_null($bobot)) {
                $penilaian->bobot_sumatif = null;
                $penilaian->bobot_pts = null;
                $penilaian->bobot_pas = null;
            } else {
                $penilaian->bobot_sumatif = $bobot->bobot_sumatif;
                $penilaian->bobot_pts = $bobot->bobot_pts;
                $penilaian->bobot_pas = $bobot->bobot_pas;
            }
        }

        return view('teacher.bobotnilai.index', compact('title', 'data_rencana_bobot_nilai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pembelajaran_id' => 'required',
            'bobot_sumatif' => 'required|numeric|between:1,5',
            'bobot_pts' => 'required|numeric|between:1,5',
            'bobot_pas' => 'required|numeric|between:1,5',
        ]);
        if ($validator->fails()) {
            $notifError = array
            (
                'message' => $validator->messages()->all()[0],
                'alert-type' => 'error'
            );
            return back()->with($notifError)->withInput();
        } else {
            $bobot = new RencanaBobotPenilaian([
                'pembelajaran_id' => $request->pembelajaran_id,
                'bobot_sumatif' => $request->bobot_sumatif,
                'bobot_pts' => $request->bobot_pts,
                'bobot_pas' => $request->bobot_pas,
            ]);
            $bobot->save();
            $notifSuccess = array
            (
                'message' => 'Bobot penilaian berhasil disimpan',
                'alert-type' => 'success'
            );
            return back()->with($notifSuccess);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  \App\Models\RencanaBobotPenilaian  $rencanaBobotPenilaian
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'bobot_sumatif' => 'required|numeric|between:1,5',
            'bobot_pts' => 'required|numeric|between:1,5',
            'bobot_pas' => 'required|numeric|between:1,5',
        ]);
        if ($validator->fails()) {
            $notifError = array
            (
                'message' => $validator->messages()->all()[0],
                'alert-type' => 'error'
            );
            return back()->with($notifError)->withInput();
        } else {
            $bobot = RencanaBobotPenilaian::where('pembelajaran_id', $id)->first();
            $data = [
                'bobot_sumatif' => $request->bobot_sumatif,
                'bobot_pts' => $request->bobot_pts,
                'bobot_pas' => $request->bobot_pas,
            ];

            $bobot->update($data);
            $notifSuccess = array
            (
                'message' => 'Bobot penilaian berhasil diubah',
                'alert-type' => 'success'
            );
            return back()->with($notifSuccess);
        }
    }
}
