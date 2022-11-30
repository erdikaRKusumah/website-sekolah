<?php

namespace App\Http\Controllers\Walikelas;

use App\Http\Controllers\Controller;
use App\Models\ClassGroup;
use App\Models\Teacher;
use App\Models\NilaiAkhirRapot;
use App\Models\Kelas;
use App\Models\Subject;
use App\Models\MappingMapel;
use App\Models\Pembelajaran;
use App\Models\Tapel;
use Illuminate\Support\Facades\Auth;

class HasilPengelolaanNilaiController extends Controller
{
    public function index()
    {
        $title = 'Hasil Pengelolaan Nilai Siswa';
        $sekolah = 'SMPN 1 CILAMAYA WETAN';
        $tapel = Tapel::findorfail(session()->get('tapel_id'));
        $guru = Teacher::where('user_id', Auth::user()->id)->first();
        $id_kelas_diampu = Kelas::where('tapel_id', $tapel->id)->where('teacher_id', $guru->id)->get('id');

        $data_id_mapel_semester_ini = Subject::where('tapel_id', $tapel->id)->get('id');
        $data_id_mapel = MappingMapel::whereIn('subject_id', $data_id_mapel_semester_ini)->get('subject_id');


        $data_anggota_kelas = ClassGroup::whereIn('kelas_id', $id_kelas_diampu)->get();
        foreach ($data_anggota_kelas as $anggota_kelas) {
            $data_id_pembelajaran = Pembelajaran::where('kelas_id', $anggota_kelas->kelas_id)->whereIn('subject_id', $data_id_mapel)->get('id');

            $data_nilai = NilaiAkhirRapot::whereIn('pembelajaran_id', $data_id_pembelajaran)->where('class_groups_id', $anggota_kelas->id)->get();

            $anggota_kelas->data_nilai = $data_nilai;
        }
        return view('walikelas.hasilnilai.index', compact('title', 'sekolah', 'data_anggota_kelas'));
    }
}
