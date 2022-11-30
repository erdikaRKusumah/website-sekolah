<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kelas;
use App\Models\Tapel;
use App\Models\Subject;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\ClassGroup;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class KelasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tapel = Tapel::findorfail(session()->get('tapel_id'));
        $data_mapel = Subject::where('tapel_id', $tapel->id)->get();
        if (count($data_mapel) == 0) {
            $notifWarning = array
            (
                'message' => 'Mohon isikan data mata pelajaran',
                'alert-type' => 'warning'
            );
            return redirect('admin/subjects')->with($notifWarning);
        } else {
            $title = 'Data Kelas';
            $data_kelas = Kelas::where('tapel_id', $tapel->id)->orderBy('class_level', 'ASC')->get();
            foreach ($data_kelas as $kelas) {
                $jumlah_anggota = Student::where('kelas_id', $kelas->id)->count();
                $kelas->jumlah_anggota = $jumlah_anggota;
            }
            $teachers = Teacher::orderBy('full_name', 'ASC')->get();
            return view('admin.kelas.index', compact('title', 'data_kelas', 'tapel', 'teachers'));
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
        $validator = Validator::make($request->all(), [
            'class_level' => 'required|numeric|digits_between:1,2',
            'class_name' => 'required|min:1|max:30',
            'teacher_id' => 'required',
        ]);

        if ($validator->fails()) {
            $notifError = array
            (
                'message' => $validator->messages()->all()[0],
                'alert-type' => 'error'
            );
            return back()->with($notifError)->withInput();
        } else {
            $tapel = Tapel::findorfail(session()->get('tapel_id'));
            $kelas = new Kelas([
                'tapel_id' => $tapel->id,
                'teacher_id' => $request->teacher_id,
                'class_level' => $request->class_level,
                'class_name' => $request->class_name
            ]);
            $kelas->save();
            $notifSuccess = array
            (
                'message' => 'Data Kelas Berhasil Ditambah',
                'alert-type' => 'success'
            );
            return back()->with($notifSuccess);
        }
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
        $siswa_belum_masuk_kelas = Student::where('status', 1)->where('kelas_id', null)->get();
        foreach ($siswa_belum_masuk_kelas as $belum_masuk_kelas) {
            $kelas_sebelumhya = ClassGroup::where('student_id', $belum_masuk_kelas->id)->orderBy('id', 'DESC')->first();
            if (is_null($kelas_sebelumhya)) {
                $belum_masuk_kelas->kelas_sebelumhya = null;
            } else {
                $belum_masuk_kelas->kelas_sebelumhya = $kelas_sebelumhya->kelas->class_name;
            }
        }
        return view('admin.kelas.show', compact('title', 'kelas', 'anggota_kelas', 'siswa_belum_masuk_kelas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKelasRequest  $request
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'class_name' => 'required|min:1|max:30',
            'teacher_id' => 'required',
        ]);


        if ($validator->fails()) {
            $notifError = array
            (
                'message' => $validator->messages()->all()[0],
                'alert-type' => 'error'
            );
            return back()->with($notifError)->withInput();
        } else {
            $kelas = Kelas::findorfail($id);
            $data_kelas = [
                'class_name' => $request->class_name,
                'teacher_id' => $request->teacher_id,
            ];
            $kelas->update($data_kelas);
            $notifSuccess = array
            (
                'message' => 'Data Kelas Berhasil Diubah',
                'alert-type' => 'success'
            );
            return back()->with($notifSuccess);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kelas  $kelas
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kelas = Kelas::findorfail($id);


        try {
            $kelas->delete();
            $notifSuccess = array
            (
                'message' => 'Data Kelas Berhasil Dihapus',
                'alert-type' => 'success'
            );
            return back()->with($notifSuccess);
        } catch (\Throwable $th) {
            $notifError = array
            (
                'message' => 'Kosongkan anggota kelas terlebih dahulu',
                'alert-type' => 'warning'
            );
            return back()->with($notifError);
        }
    }

    public function store_group(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'student_id' => 'required',
        ]);
        if ($validator->fails()) {
            $notifWarning = array
                (
                    'message' => 'Tidak ada siswa yang dipilih',
                    'alert-type' => 'warning'
                );
            return back()->with($notifWarning);
        } else {
            $student_id = $request->input('student_id');
            for ($count = 0; $count < count($student_id); $count++) {
                $data = array(
                    'student_id' => $student_id[$count],
                    'kelas_id'  => $request->kelas_id,
                    'registration'  => $request->registration,
                    'created_at'  => Carbon::now(),
                    'updated_at'  => Carbon::now(),
                );
                $insert_data[] = $data;
            }

            ClassGroup::insert($insert_data);
            Student::whereIn('id', $student_id)->update(['kelas_id' => $request->input('kelas_id')]);
            $notifSuccess = array
            (
                'message' => 'Anggota kelas berhasil ditambahkan',
                'alert-type' => 'success'
            );
            return back()->with($notifSuccess);
        }
    }

    public function delete_group($id)
    {
        try {
            $anggota_kelas = ClassGroup::findorfail($id);
            $student = Student::findorfail($anggota_kelas->student_id);

            $update_kelas_id = [
                'kelas_id' => null,
            ];
            $anggota_kelas->delete();
            $student->update($update_kelas_id);
            $notifSuccess = array
            (
                'message' => 'Anggota kelas berhasil dihapus',
                'alert-type' => 'success'
            );
            return back()->with($notifSuccess);
        } catch (\Throwable $th) {
            $notifError = array
            (
                'message' => 'Anggota kelas berhasil dihapus',
                'alert-type' => 'error'
            );
            return back()->with($notifError);
        }
    }
}
