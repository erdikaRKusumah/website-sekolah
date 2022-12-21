<?php

namespace App\Http\Controllers\Walikelas;

use App\Http\Controllers\Controller;
use App\Models\ClassGroup;
use App\Models\Teacher;
use App\Models\NilaiFormatif;
use App\Models\RencanaPenilaianFormatif;
use App\Models\Kelas;
use App\Models\Subject;
use App\Models\MappingMapel;
use App\Models\Pembelajaran;
use Illuminate\Http\Request;
use App\Models\Tapel;
use Illuminate\Support\Facades\Auth;

class HasilNilaiFormatifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Hasil Nilai Formarif';
        $sekolah = 'SMPN 1 CILAMAYA WETAN';
        $tapel = Tapel::findorfail(session()->get('tapel_id'));
        $guru = Teacher::where('user_id', Auth::user()->id)->first();
        // $pembelajaran = Pembelajaran::where('pembelajaran_id', 1);
        $id_kelas_diampu = Kelas::where('tapel_id', $tapel->id)->where('teacher_id', $guru->id)->get('id');
        $kelas = Kelas::where('tapel_id', $tapel->id)->where('teacher_id', $guru->id)->first();
        $pembelajaran = Pembelajaran::where('teacher_id', $guru->id)->where('kelas_id', $kelas->id)->first();
        // dd($pembelajaran);

        $id_data_rencana_penilaian = RencanaPenilaianFormatif::where('pembelajaran_id', $pembelajaran->id)->orderBy('kd_mapel_id', 'DESC')->get('id');

        $data_kd_nilai = NilaiFormatif::whereIn('rencana_penilaian_formatif_id', $id_data_rencana_penilaian)->groupBy('rencana_penilaian_formatif_id')->get();


        $data_anggota_kelas = ClassGroup::whereIn('kelas_id', $id_kelas_diampu)->get();
        foreach ($data_anggota_kelas as $anggota_kelas) {
            $data_nilai = NilaiFormatif::where('class_group_id', $anggota_kelas->id)->whereIn('rencana_penilaian_formatif_id', $id_data_rencana_penilaian)->get();

            $anggota_kelas->data_nilai = $data_nilai;
        }
        // dd($data_anggota_kelas);
        return view('walikelas.hasilnilaiformatif.index', compact('title', 'sekolah', 'data_anggota_kelas', 'data_kd_nilai'));
    }


}
