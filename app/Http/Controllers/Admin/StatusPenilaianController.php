<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NilaiAkhirRapot;
use App\Models\NilaiFormatif;
use App\Models\NilaiSumatif;
use App\Models\NilaiSumatifAkhir;
use App\Models\RencanaBobotPenilaian;
use App\Models\RencanaPenilaianSumatif;
use App\Models\RencanaPenilaianFormatif;
use App\Models\Kelas;
use App\Models\Pembelajaran;
use App\Models\Tapel;
use Illuminate\Http\Request;

class StatusPenilaianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Status Penilaian';
        $data_kelas = Kelas::where('tapel_id', session()->get('tapel_id'))->get();
        return view('admin.statuspenilaian.pilihkelas', compact('title', 'data_kelas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = 'Hasil Pengelolaan Nilai';
        $tapel = Tapel::findorfail(session()->get('tapel_id'));
        $data_kelas = Kelas::where('tapel_id', $tapel->id)->get();

        $kelas = Kelas::findorfail($request->kelas_id);

        $data_pembelajaran_kelas = Pembelajaran::where('kelas_id', $kelas->id)->where('status', 1)->get();
        foreach ($data_pembelajaran_kelas as $pembelajaran) {

            $rencana_nilai_formatif = RencanaPenilaianFormatif::where('pembelajaran_id', $pembelajaran->id)->first();
            if (is_null($rencana_nilai_formatif)) {
                $pembelajaran->rencana_nilai_formatif = 0;
                $pembelajaran->nilai_formatif = 0;
            } else {
                $pembelajaran->rencana_nilai_formatif = 1;
                $nilai_formatif = NilaiFormatif::where('rencana_penilaian_formatif_id', $rencana_nilai_formatif->id)->first();
                if (is_null($nilai_formatif)) {
                    $pembelajaran->nilai_formatif = 0;
                } else {
                    $pembelajaran->nilai_formatif = 1;
                }
            }

            $rencana_nilai_sumatif = RencanaPenilaianSumatif::where('pembelajaran_id', $pembelajaran->id)->first();
            if (is_null($rencana_nilai_sumatif)) {
                $pembelajaran->rencana_nilai_sumatif = 0;
                $pembelajaran->nilai_pengetahuan = 0;
            } else {
                $pembelajaran->rencana_nilai_sumatif = 1;
                $nilai_sumatif = NilaiSumatif::where('rencana_penilaian_sumatif_id', $rencana_nilai_sumatif->id)->first();
                if (is_null($nilai_sumatif)) {
                    $pembelajaran->nilai_sumatif = 0;
                } else {
                    $pembelajaran->nilai_sumatif = 1;
                }
            }

            $rencana_bobot = RencanaBobotPenilaian::where('pembelajaran_id', $pembelajaran->id)->first();
            if (is_null($rencana_bobot)) {
                $pembelajaran->rencana_bobot = 0;
            } else {
                $pembelajaran->rencana_bobot = 1;
            }

            $pts_pas = NilaiSumatifAkhir::where('pembelajaran_id', $pembelajaran->id)->first();
            if (is_null($pts_pas)) {
                $pembelajaran->pts_pas = 0;
            } else {
                $pembelajaran->pts_pas = 1;
            }

            $nilai_akhir = NilaiAkhirRapot::where('pembelajaran_id', $pembelajaran->id)->first();
            if (is_null($nilai_akhir)) {
                $pembelajaran->nilai_akhir = 0;
            } else {
                $pembelajaran->nilai_akhir = 1;
            }
        }
        return view('admin.statuspenilaian.index', compact('title', 'kelas', 'data_kelas', 'data_pembelajaran_kelas'));
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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
