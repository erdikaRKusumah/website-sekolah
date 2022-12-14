<?php

namespace App\Http\Controllers;

use App\Models\Kelas;
use App\Models\Tapel;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\ClassGroup;
use Illuminate\Http\Request;

class KelasFEController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Kelas';
        $data_tapel = Tapel::all();

        return view('frontend.kesiswaan.classes', compact('title', 'data_tapel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $title = 'Data Kelas';
        $data_tapel = Tapel::all();

        $tapel = Tapel::findorfail($request->tapel_id);

        $data_kelas = Kelas::where('tapel_id', $tapel->id)->orderBy('class_level', 'ASC')->get();
        foreach ($data_kelas as $kelas) {
            $jumlah_anggota = Student::where('kelas_id', $kelas->id)->count();
            $kelas->jumlah_anggota = $jumlah_anggota;
        }
        $teachers = Teacher::orderBy('full_name', 'ASC')->get();
        return view('frontend.kesiswaan.showClasses', compact('title', 'data_kelas', 'tapel', 'data_tapel', 'teachers'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Anggota Kelas';
        $kelas = Kelas::findorfail($id);
        $anggota_kelas = ClassGroup::join('students', 'class_groups.student_id', '=', 'students.id')
            ->orderBy('students.full_name', 'ASC')
            ->where('class_groups.kelas_id', $id)
            ->get();
        return view('frontend.kesiswaan.showStudents', compact('title', 'kelas', 'anggota_kelas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function edit(Kelas $kelas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Kelas $kelas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Kelas $kelas)
    {
        //
    }
}
