<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data User';
        $users = User::where('id', '!=', Auth::user()->id)->orderBy('role', 'ASC')->orderBy('username', 'ASC')->get();
        return view('admin.users.index', compact('title', 'users'));
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
            'full_name' => 'required|min:3|max:100',
            'gender' => 'required',
            'birth_date' => 'required',
            'email' => 'required|email|min:5|max:100|unique:admin',
            'phone_number' => 'required|numeric|digits_between:11,13|unique:admin',
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
                'role' => 1
                ]);
            $user->save();
        } catch (\Throwable $th) {
            return back()->with('error', 'Username sudah digunakan.');
        }
        $admin = new Admin([
            'user_id' => $user->id,
            'full_name' => strtoupper($request->full_name),
            'gander' => $request->gander,
            'birth_date' => $request->birth_date,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'image' => 'default.png'
        ]);
        $notifSuccess = array
        (
            'message' => 'Data User Berhasil Ditambah',
            'alert-type' => 'success'
        );
        $admin->save();
        return back()->with($notifSuccess);
    }
}

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findorfail($id);
        $data = [
            'password' => bcrypt($request->password)
        ];

        $notifSuccess = array
        (
            'message' => 'Data User Berhasil Diubah',
            'alert-type' => 'success'
        );

        $user->update($data);
        return back()->with($notifSuccess);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
