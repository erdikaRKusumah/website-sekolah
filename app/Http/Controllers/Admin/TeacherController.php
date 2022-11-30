<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Guru';
        $teachers = Teacher::orderBy('full_name', 'ASC')->get();
        return view('admin.teachers.index', compact('title', 'teachers'));
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
            'full_name' => 'required|min:3|max:100|unique:teachers',
            'title' => 'required|min:3|max:10',
            'nip' => 'nullable|digits:18|unique:teachers',
            'gender' => 'required',
            'birth_place' => 'required|min:3',
            'birth_date' => 'required',
            'phone_number' => 'required',
            'address' => 'required|min:4|max:255'
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
                    'username' => strtolower(str_replace(' ', '', $request->full_name)),
                    'password' => bcrypt('123456'),
                    'role' => 2
                ]);
                $user->save();
            } catch (\Throwable $th) {
                $notifError = array
                (
                    'message' => 'Username Telah Digunakan',
                    'alert-type' => 'error'
                );
                return back()->with($notifError);
            }

            $teacher = new Teacher([
            'user_id' => $user->id,
            'full_name' => strtoupper($request->full_name),
            'title' => $request->title,
            'nip' => $request->nip,
            'gender' => $request->gender,
            'birth_place' => $request->birth_place,
            'birth_date' => $request->birth_date,
            'phone_number' => $request->phone_number,
            'address' => $request->address
        ]);
            $teacher->save();
            $notifSuccess = array
            (
                'message' => 'Data Guru Berhasil Ditambah',
                'alert-type' => 'success'
            );

            return back()->with($notifSuccess);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3|max:10',
            'nip' => 'nullable|digits:18',
            'gender' => 'required',
            'birth_place' => 'required|min:3',
            'birth_date' => 'required',
            'phone_number' => 'required',
            'address' => 'required|min:4|max:255'
        ]);

        if ($validator->fails()) {
            $notifError = array
            (
                'message' => $validator->messages()->all()[0],
                'alert-type' => 'error'
            );
            return back()->with($notifError)->withInput();
        } else {
            $teacher = Teacher::findorfail($id);
            $teacher_data = [
                'title' => $request->title,
                'nip' => $request->nip,
                'gender' => $request->gender,
                'birth_place' => $request->birth_place,
                'birth_date' => $request->birth_date,
                'phone_number' => $request->phone_number,
                'address' => $request->address
            ];
            $notifSuccess = array
            (
                'message' => 'Data Guru Berhasil Diubah',
                'alert-type' => 'success'
            );
            $teacher->update($teacher_data);
            return back()->with($notifSuccess);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Teacher  $teacher
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::findorfail($id);
        $user = User::findorfail($teacher->user_id);
        $notifSuccess = array
        (
            'message' => 'Data Guru Berhasil Dihapus',
            'alert-type' => 'success'
        );

        $notifError = array
        (
            'message' => 'Data Guru Gagal Dihapus',
            'alert-type' => 'error'
        );
        try {
            $teacher->delete();
            $user->delete();
            return back()->with($notifSuccess);
        } catch (\Throwable $th) {
            return back()->with($notifError);
        }
    }
}
