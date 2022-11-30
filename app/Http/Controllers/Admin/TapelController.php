<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Tapel;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Data Tahun Pelajaran';
        $data_tapel = Tapel::orderBy('id', 'DESC')->get();
        return view('admin.tapel.index', compact('title', 'data_tapel'));
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
            'school_year' => 'required|min:9|max:9',
            'semester' => 'required',
        ]);


        if ($validator->fails()) {
            $notifError = array
            (
                'message' => $validator->messages()->all()[0],
                'alert-type' => 'error'
            );
            return back()->with($notifError)->withInput();
        } else {
            $tapel = new Tapel([
                'school_year' => $request->school_year,
                'semester' => $request->semester,
            ]);
            $tapel->save();
            Student::where('status', 1)->update(['kelas_id' => null]);
            $notifSuccess = array
            (
                'message' => 'Data Tahun Pelajaran Berhasil Ditambah',
                'alert-type' => 'success'
            );
            return back()->with($notifSuccess);
        }
    }
}
