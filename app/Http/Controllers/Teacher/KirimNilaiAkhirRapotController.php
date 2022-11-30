<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\RencanaBobotPenilaian;
use App\Models\RencanaPenilaianSumatif;
use App\Models\NilaiAkhirRapot;
use App\Models\NilaiSumatif;
use App\Models\NilaiSumatifAkhir;
use App\Models\KkmMapel;
use App\Models\Teacher;
use App\Models\Pembelajaran;
use App\Models\ClassGroup;
use App\Models\Kelas;
use App\Models\Tapel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class KirimNilaiAkhirRapotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Kirim Nilai Akhir';
        $tapel = Tapel::findorfail(session()->get('tapel_id'));

        $guru = Teacher::where('user_id', Auth::user()->id)->first();
        $id_kelas = Kelas::where('tapel_id', $tapel->id)->get('id');
        $data_pembelajaran = Pembelajaran::where('teacher_id', $guru->id)->whereIn('kelas_id', $id_kelas)->where('status', 1)->orderBy('subject_id', 'ASC')->orderBy('kelas_id', 'ASC')->get();

        return view('teacher.kirimnilaiakhir.index', compact('title', 'data_pembelajaran'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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

            $kkm = KkmMapel::where('subject_id', $pembelajaran->subject_id)->where('kelas_id', $pembelajaran->kelas_id)->first();
            $bobot_penilaian = RencanaBobotPenilaian::where('pembelajaran_id', $pembelajaran->id)->first();

            if (is_null($kkm)) {
                $notifWarning = array
                (
                    'message' => 'KKM mata pelajaran belum ditentukan',
                    'alert-type' => 'warning'
                );
                return back()->with($notifWarning);
            } elseif (is_null($bobot_penilaian)) {
                $notifWarning = array
                (
                    'message' => 'Bobot penilaian belum ditentukan',
                    'alert-type' => 'warning'
                );
                return back()->with($notifWarning);
            }

            $rencana_nilai_sumatif = RencanaPenilaianSumatif::where('pembelajaran_id', $pembelajaran->id)->get('id');

            if (count($rencana_nilai_sumatif) == 0) {
                $notifWarning = array
                (
                    'message' => 'Data rencana penilaian tidak ditemukan',
                    'alert-type' => 'warning'
                );
                return back()->with($notifWarning);
            } else {
                $nilai_sumatif = NilaiSumatif::whereIn('rencana_penilaian_sumatif_id', $rencana_nilai_sumatif)->groupBy('rencana_penilaian_sumatif_id')->get();

                if (count($rencana_nilai_sumatif) != count($nilai_sumatif)) {
                    $notifWarning = array
                    (
                        'message' => 'Jumlah penilaian tidak sesuai dengan jumlah perencanaan',
                        'alert-type' => 'warning'
                    );
                    return back()->with($notifWarning);
                } else {
                    $data_nilai_sumatif_akhir = NilaiSumatifAkhir::where('pembelajaran_id', $pembelajaran->id)->get();

                    if (count($data_nilai_sumatif_akhir) == 0) {
                        $notifWarning = array
                        (
                            'message' => 'Nilai sumatif akhir tidak ditemukan',
                            'alert-type' => 'warning'
                        );
                        return back()->with($notifWarning);
                    } else {

                        // Data Master
                        $title = 'Kirim Nilai Akhir';
                        $tapel = Tapel::findorfail(session()->get('tapel_id'));

                        $guru = Teacher::where('user_id', Auth::user()->id)->first();
                        $id_kelas = Kelas::where('tapel_id', $tapel->id)->get('id');
                        $data_pembelajaran = Pembelajaran::where('teacher_id', $guru->id)->whereIn('kelas_id', $id_kelas)->where('status', 1)->orderBy('subject_id', 'ASC')->orderBy('kelas_id', 'ASC')->get();

                        // Interval KKM
                        $range = (100 - $kkm->kkm) / 3;
                        $kkm->predikat_c = round($kkm->kkm, 0);
                        $kkm->predikat_b = round($kkm->kkm + $range, 0);
                        $kkm->predikat_a = round($kkm->kkm + ($range * 2), 0);

                        // Data Nilai
                        $data_anggota_kelas = ClassGroup::where('kelas_id', $pembelajaran->kelas_id)->get();
                        foreach ($data_anggota_kelas as $anggota_kelas) {

                            // Olah Nilai Sumatif
                            $data_nilai_sumatif = NilaiSumatif::whereIn('rencana_penilaian_sumatif_id', $rencana_nilai_sumatif)->where('class_group_id', $anggota_kelas->id)->get();
                            foreach ($data_nilai_sumatif as $nilai) {
                                $bobot = RencanaPenilaianSumatif::findorfail($nilai->rencana_penilaian_sumatif_id);
                                $nilai->nilai_sumatif = $nilai->nilai * $bobot->bobot_teknik_penilaian;
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        for ($cound_siswa = 0; $cound_siswa < count($request->class_group_id); $cound_siswa++) {
            $data_nilai = array(
                'pembelajaran_id' => $request->pembelajaran_id,
                'kkm' => $request->kkm,
                'class_group_id'  => $request->class_group_id[$cound_siswa],
                'nilai_sumatif'  => ltrim($request->nilai_sumatif[$cound_siswa]),
                'predikat'  => $request->predikat[$cound_siswa],
                'created_at'  => Carbon::now(),
                'updated_at'  => Carbon::now(),
            );

            $cek_nilai = NilaiAkhirRapot::where('pembelajaran_id', $request->pembelajaran_id)->where('class_group_id', $request->class_group_id[$cound_siswa])->first();
            if (is_null($cek_nilai)) {
                NilaiAkhirRapot::insert($data_nilai);
            } else {
                $cek_nilai->update($data_nilai);
            }
        }
        $notifSuccess = array
        (
            'message' => 'Nilai akhir raport berhasil dikirim',
            'alert-type' => 'success'
        );
        return back()->with($notifSuccess);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NilaiAkhirRapot  $nilaiAkhirRapot
     * @return \Illuminate\Http\Response
     */
    public function show(NilaiAkhirRapot $nilaiAkhirRapot)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NilaiAkhirRapot  $nilaiAkhirRapot
     * @return \Illuminate\Http\Response
     */
    public function edit(NilaiAkhirRapot $nilaiAkhirRapot)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNilaiAkhirRapotRequest  $request
     * @param  \App\Models\NilaiAkhirRapot  $nilaiAkhirRapot
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNilaiAkhirRapotRequest $request, NilaiAkhirRapot $nilaiAkhirRapot)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NilaiAkhirRapot  $nilaiAkhirRapot
     * @return \Illuminate\Http\Response
     */
    public function destroy(NilaiAkhirRapot $nilaiAkhirRapot)
    {
        //
    }
}
