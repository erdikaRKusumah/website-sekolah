<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\HasilNilaiFormatif;
use App\Models\RencanaPenilaianFormatif;
use App\Models\NilaiFormatif;
use App\Models\Pembelajaran;
use App\Models\ClassGroup;
use App\Models\Teacher;
use App\Models\Kelas;
use App\Models\Tapel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KirimNilaiFormatifController extends Controller
{
    public function index()
    {
        $title = 'Kirim Nilai Formatif';
        $tapel = Tapel::findorfail(session()->get('tapel_id'));

        $guru = Teacher::where('user_id', Auth::user()->id)->first();
        $id_kelas = Kelas::where('tapel_id', $tapel->id)->get('id');
        $data_pembelajaran = Pembelajaran::where('teacher_id', $guru->id)->whereIn('kelas_id', $id_kelas)->where('status', 1)->orderBy('subject_id', 'ASC')->orderBy('kelas_id', 'ASC')->get();

        return view('teacher.kirimnilaiformatif.index', compact('title', 'data_pembelajaran'));

    }

    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'pembelajaran_id' => 'required',
        ]);
        if ($validator->fails()) {
            $notifError = array
            (
                'message' => $validator->messages()->all()[0],
                'alert-type' => 'error'
            );
            return back()->with($notifError)->withInput();
        } else {
            $pembelajaran = Pembelajaran::findorfail($request->pembelajaran_id);

            $rencana_nilai_formatif = RencanaPenilaianFormatif::where('pembelajaran_id', $pembelajaran->id)->get('id');

            if (count($rencana_nilai_formatif) == 0) {
                $notifWarning = array
                (
                    'message' => 'Data rencana penilaian tidak ditemukan',
                    'alert-type' => 'warning'
                );
                return back()->with($notifWarning);
            } else {
                $nilai_formatif = NilaiFormatif::whereIn('rencana_penilaian_formatif_id', $rencana_nilai_formatif)->groupBy('rencana_penilaian_formatif_id')->get();

                if (count($rencana_nilai_formatif) != count($nilai_formatif)) {
                    $notifWarning = array
                    (
                        'message' => 'Jumlah penilaian tidak sesuai dengan jumlah perencanaan',
                        'alert-type' => 'warning'
                    );
                    return back()->with($notifWarning);
                } else {
                    $data_nilai_formatif = NilaiFormatif::where('pembelajaran_id', $pembelajaran->id)->get();

                    if (count($data_nilai_formatif) == 0) {
                        $notifWarning = array
                        (
                            'message' => 'Nilai formatif tidak ditemukan',
                            'alert-type' => 'warning'
                        );
                        return back()->with($notifWarning);
                    } else {

                        // Data Master
                        $title = 'Kirim Nilai Formatif';
                        $tapel = Tapel::findorfail(session()->get('tapel_id'));

                        $guru = Teacher::where('user_id', Auth::user()->id)->first();
                        $id_kelas = Kelas::where('tapel_id', $tapel->id)->get('id');
                        $data_pembelajaran = Pembelajaran::where('teacher_id', $guru->id)->whereIn('kelas_id', $id_kelas)->where('status', 1)->orderBy('subject_id', 'ASC')->orderBy('kelas_id', 'ASC')->get();

                        // Data Nilai
                        $data_anggota_kelas = ClassGroup::where('kelas_id', $pembelajaran->kelas_id)->get();
                        foreach ($data_anggota_kelas as $anggota_kelas) {

                            // Olah Nilai Formatif
                            $data_nilai_formatif = NilaiFormatif::whereIn('rencana_penilaian_formatif_id', $rencana_nilai_formatif)->where('class_group_id', $anggota_kelas->id)->get();
                            dd($data_nilai_formatif);
                            foreach ($data_nilai_formatif as $nilai) {
                                $bobot = RencanaPenilaianFormatif::findorfail($nilai->rencana_penilaian_formatif_id);
                                $nilai->nilai_formatif = $nilai->nilai * $bobot->bobot_teknik_penilaian;
                                $nilai->bobot_penilaian = $bobot->bobot_teknik_penilaian;
                            }

                            $nilai_sumatif_akhir = NilaiSumatifAkhir::where('pembelajaran_id', $pembelajaran->id)->where('class_group_id', $anggota_kelas->id)->first();
                            $rencana_bobot_penilaian = RencanaBobotPenilaian::where('pembelajaran_id', $pembelajaran->id)->first();

                            $rata_nilai_sumatif = $data_nilai_sumatif->sum('nilai_sumatif') / $data_nilai_sumatif->sum('bobot_penilaian');
                            $nilai_akhir_sumatif = (($rata_nilai_sumatif * $rencana_bobot_penilaian->bobot_sumatif) + ($nilai_sumatif_akhir->nilai_pts * $rencana_bobot_penilaian->bobot_pts) + ($nilai_sumatif_akhir->nilai_pas * $rencana_bobot_penilaian->bobot_pas)) / ($rencana_bobot_penilaian->bobot_sumatif + $rencana_bobot_penilaian->bobot_pts + $rencana_bobot_penilaian->bobot_pas);
                            // Akhir Olah Nilai Sumatif

                            $anggota_kelas->nilai_sumatif = round($nilai_akhir_sumatif, 0);
                        }
                        return view('teacher.kirimnilaiakhir.create', compact('title', 'data_pembelajaran', 'pembelajaran', 'kkm', 'data_anggota_kelas'));
                    }
                }
            }
        }
    }
}
