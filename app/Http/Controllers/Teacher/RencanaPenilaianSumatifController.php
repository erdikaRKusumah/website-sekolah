<?php

namespace App\Http\Controllers\Teacher;

use App\Http\Controllers\Controller;
use App\Models\KdMapel;
use App\Models\RencanaPenilaianSumatif;
use App\Models\Teacher;
use App\Models\Kelas;
use App\Models\Pembelajaran;
use App\Models\Tapel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class RencanaPenilaianSumatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Rencana Penilaia Sumatif';
        $tapel = Tapel::findorfail(session()->get('tapel_id'));

        $guru = Teacher::where('user_id', Auth::user()->id)->first();
        $id_kelas = Kelas::where('tapel_id', $tapel->id)->get('id');

        $data_rencana_penilaian = Pembelajaran::where('teacher_id', $guru->id)->whereIn('kelas_id', $id_kelas)->where('status', 1)->orderBy('subject_id', 'ASC')->orderBy('kelas_id', 'ASC')->get();
        foreach ($data_rencana_penilaian as $penilaian) {
            $rencana_penilaian = RencanaPenilaianSumatif::where('pembelajaran_id', $penilaian->id)->groupBy('kode_penilaian')->get();
            $penilaian->jumlah_rencana_penilaian = count($rencana_penilaian);
        }

        return view('teacher.rencanasumatif.index', compact('title', 'data_rencana_penilaian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $title = 'Tambah Rencana Penilaian Sumatif';
        $tapel = Tapel::findorfail(session()->get('tapel_id'));

        $pembelajaran = Pembelajaran::findorfail($request->pembelajaran_id);
        $kelas = Kelas::findorfail($pembelajaran->kelas_id);
        $data_kd = KdMapel::where([
            'subject_id' => $pembelajaran->subject_id,
            'class_level' => $kelas->class_level,
            'semester' => $tapel->semester,
        ])->orderBy('kode_kd', 'ASC')->get();

        if (count($data_kd) == 0) {
            $notifError = array
            (
                'message' => 'Tidak ada data kompetensi, silahkan tambahkan data kompetensi',
                'alert-type' => 'error'
            );
            return redirect('teacher/ck')->with($notifError);
        } else {
            $jumlah_penilaian = $request->jumlah_penilaian;
            return view('teacher.rencanasumatif.create', compact('title', 'pembelajaran', 'jumlah_penilaian', 'data_kd'));
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
        try {
            for ($count_penilaian = 0; $count_penilaian < count($request->teknik_penilaian); $count_penilaian++) {
                for ($count_kd = 0; $count_kd < count($request->kd_mapel_id[$count_penilaian]); $count_kd++) {
                    $data_penilaian = array(
                        'pembelajaran_id' => $request->pembelajaran_id,
                        'kd_mapel_id'  => $request->kd_mapel_id[$count_penilaian][$count_kd],
                        'kode_penilaian'  => $request->kode_penilaian[$count_penilaian],
                        'teknik_penilaian'  => $request->teknik_penilaian[$count_penilaian],
                        'bobot_teknik_penilaian'  => $request->bobot_teknik_penilaian[$count_penilaian],
                        'created_at'  => Carbon::now(),
                        'updated_at'  => Carbon::now(),
                    );
                    $data_penilaian_permapel[] = $data_penilaian;
                }
                $store_data_penilaian = $data_penilaian_permapel;
            }
            RencanaPenilaianSumatif::insert($store_data_penilaian);
            $notifSuccess = array
            (
                'message' => 'Rencana penilaian sumatif berhasil disimpan.',
                'alert-type' => 'success'
            );
            return redirect('teacher/rencanasumatif')->with($notifSuccess);
        } catch (\Throwable $th) {
            $notifError = array
            (
                'message' => 'Pilih minimal 1 KD pada setiap kolom penilaian.',
                'alert-type' => 'error'
            );
            return back()->with($notifError);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Data Rencana Nilai Pengetahuan';
        $pembelajaran = Pembelajaran::findorfail($id);
        $data_rencana_penilaian = RencanaPenilaianSumatif::where('pembelajaran_id', $id)->orderBy('kode_penilaian', 'ASC')->orderBy('kd_mapel_id', 'DESC')->get();
        return view('teacher.rencanasumatif.show', compact('title', 'pembelajaran', 'data_rencana_penilaian'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $title = 'Edit Rencana Nilai Pengetahuan';
        $tapel = Tapel::findorfail(session()->get('tapel_id'));

        $pembelajaran = Pembelajaran::findorfail($request->pembelajaran_id);
        $kelas = Kelas::findorfail($pembelajaran->kelas_id);
        $data_kd = KdMapel::where([
            'subject_id' => $pembelajaran->subject_id,
            'class_level' => $kelas->class_level,
            'tipe' => 3,
            'semester' => $tapel->semester,
        ])->orderBy('kode_kd', 'ASC')->get();
        $jumlah_penilaian = $request->jumlah_penilaian;

        return view('teacher.rencanasumatif.edit', compact('title', 'pembelajaran', 'jumlah_penilaian', 'data_kd'));
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
        try {
            for ($count_penilaian = 0; $count_penilaian < count($request->teknik_penilaian); $count_penilaian++) {
                for ($count_kd = 0; $count_kd < count($request->kd_mapel_id[$count_penilaian]); $count_kd++) {
                    $data_penilaian = array(
                        'pembelajaran_id' => $request->pembelajaran_id,
                        'kd_mapel_id'  => $request->kd_mapel_id[$count_penilaian][$count_kd],
                        'kode_penilaian'  => $request->kode_penilaian[$count_penilaian],
                        'teknik_penilaian'  => $request->teknik_penilaian[$count_penilaian],
                        'bobot_teknik_penilaian'  => $request->bobot_teknik_penilaian[$count_penilaian],
                        'created_at'  => Carbon::now(),
                        'updated_at'  => Carbon::now(),
                    );
                    $data_penilaian_permapel[] = $data_penilaian;
                }
                $store_data_penilaian = $data_penilaian_permapel;
            }
            try {
                RencanaPenilaianSumatif::where('pembelajaran_id', $request->pembelajaran_id)->delete();
                RencanaPenilaianSumatif::insert($store_data_penilaian);
                $notifSuccess = array
                (
                    'message' => 'Rencana penilaian sumatif berhasil diubah',
                    'alert-type' => 'success'
                );
                return redirect('teacher/rencanasumatif')->with($notifSuccess);
            } catch (\Throwable $th) {
                $notifWarning = array
                (
                    'message' => 'Rencana penilaian tidak dapat diubah',
                    'alert-type' => 'warning'
                );
                return back()->with($notifWarning);
            }
        } catch (\Throwable $th) {
            $notifError = array
                (
                    'message' => 'Pilih minimal 1 KD pada setiap kolom penilaian.',
                    'alert-type' => 'error'
                );
            return back()->with($notifError);
        }
    }
}
