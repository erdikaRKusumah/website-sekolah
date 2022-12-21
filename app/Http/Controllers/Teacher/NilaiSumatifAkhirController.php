<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\ClassGroup;
use App\Models\Pembelajaran;
use App\Models\Teacher;
use App\Models\NilaiSumatifAkhir;
use App\Models\Kelas;
use App\Models\Tapel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class NilaiSumatifAkhirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Nilai Sumatif Akhir';
        $tapel = Tapel::findorfail(session()->get('tapel_id'));

        $guru = Teacher::where('user_id', Auth::user()->id)->first();
        $id_kelas = Kelas::where('tapel_id', $tapel->id)->get('id');

        $data_penilaian = Pembelajaran::where('teacher_id', $guru->id)->whereIn('kelas_id', $id_kelas)->where('status', 1)->orderBy('subject_id', 'ASC')->orderBy('kelas_id', 'ASC')->get();

        foreach ($data_penilaian as $penilaian) {
            $data_anggota_kelas = ClassGroup::where('kelas_id', $penilaian->kelas_id)->get();
            $data_nilai_pts_pas = NilaiSumatifAkhir::where('pembelajaran_id', $penilaian->id)->get();

            $penilaian->jumlah_anggota_kelas = count($data_anggota_kelas);
            $penilaian->jumlah_telah_dinilai = count($data_nilai_pts_pas);
        }

        return view('teacher.nilaisumatifakhir.index', compact('title', 'data_penilaian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $pembelajaran = Pembelajaran::findorfail($request->pembelajaran_id);
        $data_anggota_kelas = ClassGroup::where('kelas_id', $pembelajaran->kelas_id)->get();

        $data_nilai_pts_pas = NilaiSumatifAkhir::where('pembelajaran_id', $pembelajaran->id)->get();

        if (count($data_nilai_pts_pas) == 0) {
            $title = 'Input Nilai Sumatif Akhir';
            return view('teacher.nilaisumatifakhir.create', compact('title', 'pembelajaran', 'data_anggota_kelas'));
        } else {
            $title = 'Edit Nilai Sumatif Akhir';
            return view('teacher.nilaisumatifakhir.edit', compact('title', 'pembelajaran', 'data_nilai_pts_pas'));
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

                if ($request->nilai_pts[$cound_siswa] >= 0 && $request->nilai_pts[$cound_siswa] <= 100 || $request->nilai_pas[$cound_siswa] >= 0 && $request->nilai_pas[$cound_siswa] <= 100) {
                    $data_nilai = array(
                        'pembelajaran_id'  => $request->pembelajaran_id,
                        'class_group_id'  => $request->class_group_id[$cound_siswa],
                        'nilai_pts'  => ltrim($request->nilai_pts[$cound_siswa]),
                        'nilai_pas'  => ltrim($request->nilai_pas[$cound_siswa]),
                        'created_at'  => Carbon::now(),
                        'updated_at'  => Carbon::now(),
                    );
                    $data_nilai_siswa[] = $data_nilai;
                } else {
                    $notifError = array
                    (
                        'message' => 'Nilai harus berisi antara 0 s.d 100',
                        'alert-type' => 'error'
                    );
                    return back()->with($notifError);
                }
            }
            $store_data_nilai = $data_nilai_siswa;
            NilaiSumatifAkhir::insert($store_data_nilai);
            $notifSuccess = array
            (
                'message' => 'Data nilai berhasil disimpan',
                'alert-type' => 'success'
            );
            return redirect('teacher/nilaisumatifakhir')->with($notifSuccess);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NilaiSumatifAkhir $nilaisumatifakhir
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        for ($cound_siswa = 0; $cound_siswa < count($request->class_group_id); $cound_siswa++) {

            if ($request->nilai_pts[$cound_siswa] >= 0 && $request->nilai_pts[$cound_siswa] <= 100 || $request->nilai_pas[$cound_siswa] >= 0 && $request->nilai_pas[$cound_siswa] <= 100) {
                $nilai = NilaiSumatifAkhir::where('pembelajaran_id', $id)->where('class_group_id', $request->class_group_id[$cound_siswa])->first();

                $data_nilai = [
                    'nilai_pts'  => ltrim($request->nilai_pts[$cound_siswa]),
                    'nilai_pas'  => ltrim($request->nilai_pas[$cound_siswa]),
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
        $notifSuccess = array
        (
            'message' => 'Data nilai berhasil diubah',
            'alert-type' => 'success'
        );
        return redirect('teacher/nilaisumatifakhir')->with($notifSuccess);
    }
}
