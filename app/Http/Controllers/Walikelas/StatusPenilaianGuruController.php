<?php

namespace App\Http\Controllers\Walikelas;

use App\Http\Controllers\Controller;
use App\Models\NilaiAkhirRapot;
use App\Models\NilaiFormatif;
use App\Models\NilaiSumatif;
use App\Models\NilaiSumatifAkhir;
use App\Models\RencanaBobotPenilaian;
use App\Models\RencanaPenilaianSumatif;
use App\Models\RencanaPenilaianFormatif;
use App\Models\MappingMapel;
use App\Models\Kelas;
use App\Models\Pembelajaran;
use App\Models\Tapel;
use App\Models\Teacher;
use Illuminate\Support\Facades\Auth;

class StatusPenilaianGuruController extends Controller
{
    public function index()
    {
        $title = 'Status Penilaian Oleh Guru';
        $tapel = Tapel::findorfail(session()->get('tapel_id'));
        $guru = Teacher::where('user_id', Auth::user()->id)->first();
        $id_kelas_diampu = Kelas::where('tapel_id', $tapel->id)->where('teacher_id', $guru->id)->get('id');
        $data_pembelajaran_kelas = Pembelajaran::whereIn('kelas_id', $id_kelas_diampu)->where('status', 1)->get();
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
        return view('walikelas.statusnilaiguru.index', compact('title', 'data_pembelajaran_kelas'));
    }
}
