<?php

namespace App\Http\Controllers\Walikelas;

use App\Http\Controllers\Controller;
use App\Models\ClassGroup;
use App\Models\Teacher;
use App\Models\Kelas;
use App\Models\Tapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesertaDidikController extends Controller
{
    public function index()
    {
        $title = 'Data Peserta Didik';
        $tapel = Tapel::findorfail(session()->get('tapel_id'));
        $guru = Teacher::where('user_id', Auth::user()->id)->first();
        $id_kelas_diampu = Kelas::where('tapel_id', $tapel->id)->where('teacher_id', $guru->id)->get('id');
        $data_anggota_kelas = ClassGroup::whereIn('kelas_id', $id_kelas_diampu)->get();

        return view('walikelas.pesertadidik.index', compact('title', 'data_anggota_kelas'));
    }
}
