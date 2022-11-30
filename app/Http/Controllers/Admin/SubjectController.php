<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use App\Models\Tapel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;


class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Mata Pelajaran';
        $tapel = Tapel::findorfail(session()->get('tapel_id'));
        $subjects = Subject::where('tapel_id', $tapel->id)->orderBy('subject_name', 'ASC')->get();
        return view('admin.subjects.index', compact('title', 'subjects', 'tapel'));
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
            'tapel_id' => 'required',
            'subject_name' => 'required|min:3|max:255',
            'subject_description' => 'required|min:2|max:50',
        ]);

        if ($validator->fails()) {
            $notifError = array
            (
                'message' => $validator->messages()->all()[0],
                'alert-type' => 'error'
            );
            return back()->with($notifError)->withInput();
        } else {
            $subject = new Subject([
                'tapel_id' => $request->tapel_id,
                'subject_name' => $request->subject_name,
                'subject_description' => $request->subject_description,
            ]);
            $subject->save();
            $notifSuccess = array
            (
                'message' => 'Data Mapel Berhasil Ditambah',
                'alert-type' => 'success'
            );
            return back()->with($notifSuccess);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'subject_name' => 'required|min:3|max:255',
            'subject_description' => 'required|min:2|max:50',
        ]);



        if ($validator->fails()) {
            $notifError = array
            (
                'message' => $validator->messages()->all()[0],
                'alert-type' => 'error'
            );
            return back()->with($notifError)->withInput();
        } else {
            $subject = Subject::findorfail($id);
            $subjects = [
                'subject_description' => $request->subject_description,
            ];
            $subject->update($subjects);
            $notifSuccess = array
            (
                'message' => 'Data Mapel Berhasil Diubah',
                'alert-type' => 'success'
            );
            return back()->with($notifSuccess);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $subject = Subject::findorfail($id);

        try {
            $subject->delete();
            $notifSuccess = array
            (
                'message' => 'Data Mapel Berhasil Dihapus',
                'alert-type' => 'success'
            );
            return back()->with($notifSuccess);
        } catch (\Throwable $th) {
            $notifError = array
            (
                'message' => 'Data Mapel Gagal Dihapus',
                'alert-type' => 'warning'
            );
            return back()->with($notifError);
        }
    }
}
