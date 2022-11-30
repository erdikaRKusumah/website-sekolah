<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KkmMapel;
use App\Models\Subject;
use App\Models\Tapel;

use Illuminate\Http\Request;

class IntervalPredikatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Interval Predikat';
        $tapel = Tapel::findorfail(session()->get('tapel_id'));
        $id_mapel = Subject::where('tapel_id', $tapel->id)->get('id');
        $data_kkm = KkmMapel::whereIn('subject_id', $id_mapel)->orderBy('kelas_id', 'ASC')->get();

        if (count($id_mapel) == 0) {
            $notifWarning = array
            (
                'message' => 'Mohon isikan data mata pelajaran',
                'alert-type' => 'warning'
            );
            return redirect('admin/subjects')->with($notifWarning);
        } else {
            foreach ($data_kkm as $kkm) {
                $range = (100 - $kkm->kkm) / 3;
                $kkm->predikat_c = round($kkm->kkm, 0);
                $kkm->predikat_b = round($kkm->kkm + $range, 0);
                $kkm->predikat_a = round($kkm->kkm + ($range * 2), 0);
            }
            return view('admin.interval_predikat.index', compact('title', 'data_kkm'));
        }
    }
}
