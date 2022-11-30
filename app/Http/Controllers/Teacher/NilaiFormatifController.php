<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ClassGroup;
use App\Models\Pembelajaran;
use App\Models\RencanaPenilaianFormatif;
use App\Models\Kelas;
use App\Models\Teacher;
use App\Models\Tapel;
use App\Models\NilaiFormatif;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class NilaiFormatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Nilai Formatif';
        $tapel = Tapel::findorfail(session()->get('tapel_id'));

        $guru = Teacher::where('user_id', Auth::user()->id)->first();
        $id_kelas = Kelas::where('tapel_id', $tapel->id)->get('id');

        $data_penilaian = Pembelajaran::where('teacher_id', $guru->id)->whereIn('kelas_id', $id_kelas)->where('status', 1)->orderBy('subject_id', 'ASC')->orderBy('kelas_id', 'ASC')->get();

        foreach ($data_penilaian as $penilaian) {
            $data_rencana_nilai = RencanaPenilaianFormatif::where('pembelajaran_id', $penilaian->id)->groupBy('kode_penilaian')->get();
            $id_rencana_nilai = RencanaPenilaianFormatif::where('pembelajaran_id', $penilaian->id)->groupBy('kode_penilaian')->get('id');
            $telah_dinilai = nilaiFormatif::whereIn('rencana_penilaian_formatif_id', $id_rencana_nilai)->groupBy('rencana_penilaian_formatif_id')->get();

            $penilaian->jumlah_rencana_penilaian = count($data_rencana_nilai);
            $penilaian->jumlah_telah_dinilai = count($telah_dinilai);
            $penilaian->data_rencana_nilai = $data_rencana_nilai;
        }

        return view('teacher.nilaiformatif.index', compact('title', 'data_penilaian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kode_penilaian' => 'required',
        ]);
        if ($validator->fails()) {
            $notifError = array
            (
                'message' => $validator->messages()->all()[0],
                'alert-type' => 'error'
            );
            return back()->with($notifError)->withInput();
        } else {
            $kode_penilaian = $request->kode_penilaian;
            $pembelajaran = Pembelajaran::findorfail($request->pembelajaran_id);
            $data_anggota_kelas = ClassGroup::where('kelas_id', $pembelajaran->kelas_id)->get();

            $id_data_rencana_penilaian = RencanaPenilaianFormatif::where('pembelajaran_id', $request->pembelajaran_id)->where('kode_penilaian', $kode_penilaian)->orderBy('kd_mapel_id', 'DESC')->get('id');

            $data_kd_nilai = NilaiFormatif::whereIn('rencana_penilaian_formatif_id', $id_data_rencana_penilaian)->groupBy('rencana_penilaian_formatif_id')->get();
            $count_kd_nilai = count($data_kd_nilai);

            $data_kode_penilaian = RencanaPenilaianFormatif::where('pembelajaran_id', $request->pembelajaran_id)->orderBy('kode_penilaian', 'ASC')->groupBy('kode_penilaian')->get();

            if ($count_kd_nilai == 0) {
                $data_rencana_penilaian = RencanaPenilaianFormatif::where('pembelajaran_id', $request->pembelajaran_id)->where('kode_penilaian', $kode_penilaian)->get();
                $count_kd = count($data_rencana_penilaian);
                $title = 'Input Nilai formatif';
                return view('teacher.nilaiformatif.create', compact('title', 'kode_penilaian', 'pembelajaran', 'data_anggota_kelas', 'data_rencana_penilaian', 'data_kode_penilaian', 'count_kd'));
            } else {
                foreach ($data_anggota_kelas as $anggota_kelas) {
                    $data_nilai = NilaiFormatif::where('class_group_id', $anggota_kelas->id)->whereIn('rencana_penilaian_formatif_id', $id_data_rencana_penilaian)->get();
                    $anggota_kelas->data_nilai = $data_nilai;
                }
                $title = 'Edit Nilai formatif';
                return view('teacher.nilaiformatif.edit', compact('title', 'kode_penilaian', 'pembelajaran', 'data_anggota_kelas', 'data_kode_penilaian', 'count_kd_nilai', 'data_kd_nilai'));
            }
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
        if (is_null($request->class_group_id)) {
            $notifError = array
            (
                'message' => 'Data siswa tidak ditemukan',
                'alert-type' => 'error'
            );
            return back()->with($notifError);
        } else {
            for ($cound_siswa = 0; $cound_siswa < count($request->class_group_id); $cound_siswa++) {
                for ($count_penilaian = 0; $count_penilaian < count($request->rencana_penilaian_formatif_id); $count_penilaian++) {

                    if ($request->nilai[$count_penilaian][$cound_siswa] >= 0 && $request->nilai[$count_penilaian][$cound_siswa] <= 100) {
                        $data_nilai = array(
                            'class_group_id'  => $request->class_group_id[$cound_siswa],
                            'rencana_penilaian_formatif_id' => $request->rencana_penilaian_formatif_id[$count_penilaian],
                            'nilai'  => ltrim($request->nilai[$count_penilaian][$cound_siswa]),
                            'created_at'  => Carbon::now(),
                            'updated_at'  => Carbon::now(),
                        );
                        $data_penilaian_siswa[] = $data_nilai;
                    } else {
                        $notifError = array
                        (
                            'message' => 'Nilai harus berisi antara 0 s.d 100',
                            'alert-type' => 'error'
                        );
                        return back()->with($notifError);
                    }
                }
                $store_data_penilaian = $data_penilaian_siswa;
            }
            NilaiFormatif::insert($store_data_penilaian);
            $notifSuccess = array
            (
                'message' => 'Data nilai berhasil disimpan',
                'alert-type' => 'success'
            );
            return redirect('teacher/nilaiformatif')->with($notifSuccess);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NilaiFormatif  $nilaiformatif
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        for ($cound_siswa = 0; $cound_siswa < count($request->class_group_id); $cound_siswa++) {
            for ($count_penilaian = 0; $count_penilaian < count($request->rencana_penilaian_formatif_id); $count_penilaian++) {
                if ($request->nilai[$count_penilaian][$cound_siswa] >= 0 && $request->nilai[$count_penilaian][$cound_siswa] <= 100) {
                    $nilai = NilaiFormatif::where('class_group_id', $request->class_group_id[$cound_siswa])->where('rencana_penilaian_formatif_id', $request->rencana_penilaian_formatif_id[$count_penilaian])->first();
                    $data_nilai = [
                        'nilai'  => ltrim($request->nilai[$count_penilaian][$cound_siswa]),
                        'updated_at'  => Carbon::now(),
                    ];
                    $nilai->update($data_nilai);
                } else {
                    $notifError = array
                    (
                        'message' => 'Nilai harus berisi antara 0 s.d 100',
                        'alert-type' => 'error'
                    );
                    return back()->with($notifError);
                }
            }
        }
        $notifSuccess = array
            (
                'message' => 'Data nilai berhasil diubah',
                'alert-type' => 'success'
            );
        return redirect('teacher/nilaiformatif')->with($notifSuccess);
    }
}
