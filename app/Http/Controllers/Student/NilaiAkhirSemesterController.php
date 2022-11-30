<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\ClassGroup;
use App\Models\NilaiAkhirRapot;
use App\Models\Kelas;
use App\Models\Pembelajaran;
use App\Models\Student;
use Illuminate\Support\Facades\Auth;

class NilaiAkhirSemesterController extends Controller
{
    public function index()
    {
        $title = 'Nilai Akhir Semester';
        $siswa = Student::where('user_id', Auth::user()->id)->first();

        $data_id_kelas = Kelas::where('tapel_id', session()->get('tapel_id'))->get('id');
        $anggota_kelas = ClassGroup::whereIn('kelas_id', $data_id_kelas)->where('student_id', $siswa->id)->first();
        if (is_null($anggota_kelas)) {
            return back()->with('toast_warning', 'Anda belum masuk ke anggota kelas');
        } else {
            $data_pembelajaran = Pembelajaran::where('kelas_id', $anggota_kelas->kelas_id)->where('status', 1)->get();
            foreach ($data_pembelajaran as $pembelajaran) {
                $pembelajaran->nilai = NilaiAkhirRapot::where('pembelajaran_id', $pembelajaran->id)->where('class_group_id', $anggota_kelas->id)->first();
            }
            return view('student.nilaiakhirsemester.index', compact('title', 'siswa', 'data_pembelajaran'));
        }
    }
}
