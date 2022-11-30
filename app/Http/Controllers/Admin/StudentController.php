<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Tapel;
use App\Models\Kelas;
use App\Models\ClassGroup;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Siswa';
        $tapel = Tapel::findorfail(session()->get('tapel_id'));
        $jumlah_kelas = Kelas::where('tapel_id', $tapel->id)->count();

        if ($jumlah_kelas == 0) {
            $notifWarning = array
            (
                'message' => 'Mohon isikan data kelas',
                'alert-type' => 'warning'
            );
            return redirect('admin/kelas')->with($notifWarning);
        } else {
            $tingkatan_terendah = Kelas::where('tapel_id', $tapel->id)->min('class_level');
            $tingkatan_akhir = Kelas::where('tapel_id', $tapel->id)->max('class_level');
            $data_kelas_terendah = Kelas::where('tapel_id', $tapel->id)->where('class_level', $tingkatan_terendah)->orderBy('class_name', 'ASC')->get();
            $data_kelas_all = Kelas::where('tapel_id', $tapel->id)->orderBy('class_level', 'ASC')->get();
            $students = Student::where('status', 1)->orderBy('nis', 'ASC')->get();
            return view('admin.students.index', compact('title', 'data_kelas_all', 'data_kelas_terendah', 'students', 'tingkatan_akhir'));
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|min:3|max:100',
            'gender' => 'required',
            'registration_type' => 'required',
            'kelas_id' => 'required',
            'nis' => 'required|numeric|digits_between:1,10|unique:students',
            'birth_place' => 'required|min:3|max:50',
            'birth_date' => 'required',
            'religion' => 'required',
            'address' => 'required|min:3|max:255',
            'phone_number' => 'nullable|numeric|digits_between:11,13|unique:students',

            'father_name' => 'required|min:3|max:100',
            'mother_name' => 'required|min:3|max:100',
            'father_job' => 'required|min:3|max:100',
            'mother_job' => 'required|min:3|max:100'
        ]);

        if ($validator->fails()) {
            $notifError = array
            (
                'message' => $validator->messages()->all()[0],
                'alert-type' => 'error'
            );
            return back()->with($notifError)->withInput();
        } else {
            try {
                $user = new User([
                    'username' => strtolower(str_replace(' ', '', $request->full_name . $request->nis)),
                    'password' => bcrypt('123456'),
                    'role' => 3,
                ]);
                $user->save();
            } catch (\Throwable $th) {
                $notifError = array
                (
                    'message' => 'Username Telah Digunakan',
                    'alert-type' => 'error'
                );
                return back()->with('error', 'Username telah digunakan');
            }


            $student = new Student([
                'user_id' => $user->id,
                'kelas_id' => $request->kelas_id,
                'registration_type' => $request->registration_type,
                'nis' => $request->nis,
                'full_name' => strtoupper($request->full_name),
                'birth_place' => $request->birth_place,
                'birth_date' => $request->birth_date,
                'gender' => $request->gender,
                'religion' => $request->religion,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'father_job' => $request->father_job,
                'mother_job' => $request->mother_job,
                'image' => 'default.png',
                'status' => 1,
            ]);
            $student->save();

            $kelas_group = new ClassGroup([
                'student_id' => $student->id,
                'kelas_id' => $request->kelas_id,
                'registration_type' => $request->registration_type,
            ]);
            $kelas_group->save();
            $notifSuccess = array
            (
            'message' => 'Data Siswa Berhasil Ditambah',
            'alert-type' => 'success'
            );
            return back()->with($notifSuccess);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateStudentRequest  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $student = Student::findorfail($id);
        $validator = Validator::make($request->all(), [
            'full_name' => 'required|min:3|max:100',
            'gender' => 'required',
            'nis' => 'required|numeric|digits_between:1,10|unique:students,nis,' . $student->id,
            'birth_place' => 'required|min:3|max:50',
            'birth_date' => 'required',
            'religion' => 'required',
            'address' => 'required|min:3|max:255',
            'phone_number' => 'nullable|numeric|digits_between:11,13|unique:students,phone_number,' . $student->id,

            'father_name' => 'required|min:3|max:100',
            'mother_name' => 'required|min:3|max:100',
            'father_job' => 'required|min:3|max:100',
            'mother_job' => 'required|min:3|max:100'
        ]);

        if ($validator->fails()) {
            $notifError = array
            (
                'message' => $validator->messages()->all()[0],
                'alert-type' => 'error'
            );
            return back()->with($notifError)->withInput();
        } else {
            $student_data = [
                'nis' => $request->nis,
                'full_name' => strtoupper($request->full_name),
                'birth_place' => $request->birth_place,
                'birth_date' => $request->birth_date,
                'gender' => $request->gender,
                'religion' => $request->religion,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'father_name' => $request->father_name,
                'mother_name' => $request->mother_name,
                'father_job' => $request->father_job,
                'mother_job' => $request->mother_job
            ];
            $student->update($student_data);
            $notifSuccess = array
            (
                'message' => 'Data Siswa Berhasil Diubah',
                'alert-type' => 'success'
            );
            return back()->with($notifSuccess);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student_data = Student::findorfail($id);
        $user_data = User::findorfail($student_data->user_id);

        $kelas_group_data = ClassGroup::where('student_id', $student_data->id)->get();



        if ($kelas_group_data->count() == 0) {
            $student_data->delete();
            $user_data->delete();
            $notifSuccess = array
                (
                    'message' => 'Data Siswa Berhasil Dihapus',
                    'alert-type' => 'success'
                );
            return back()->with($notifSuccess);
        } elseif ($kelas_group_data->count() == 1) {
            try {
                $anggota_kelas = ClassGroup::where('student_id', $student_data->id)->first();
                $anggota_kelas->delete();
                $student_data->delete();
                $user_data->delete();
                $notifSuccess = array
                (
                    'message' => 'Data Siswa Berhasil Dihapus',
                    'alert-type' => 'success'
                );
                return back()->with($notifSuccess);
            } catch (\Throwable $th) {
                $notifError = array
                (
                    'message' => 'Data Siswa Gagal Dihapus',
                    'alert-type' => 'error'
                );
                return back()->with($notifError);
            }
        } else {
            $notifError = array
            (
                'message' => 'Data Siswa Gagal Dihapus',
                'alert-type' => 'error'
            );
            return back()->with($notifError);
        }
    }
}
