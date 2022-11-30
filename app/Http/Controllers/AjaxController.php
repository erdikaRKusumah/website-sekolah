<?php

namespace App\Http\Controllers;

use App\Models\ClassGroup;
use App\Models\Kelas;
use App\Models\Pembelajaran;

use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function ajax_kelas($id)
    {
        $data_kelas = Pembelajaran::whereNotNull('teacher_id')->where('subject_id', $id)->where('status', true)->get('kelas_id');
        foreach ($data_kelas as $kelas) {
            $kls = Kelas::findorfail($kelas->kelas_id);
            $kelas->class_level = $kls->class_level;
            $kelas->class_name = $kls->class_name;
        }
        // dd($data_kelas);
        return json_encode($data_kelas, true);
    }
}
