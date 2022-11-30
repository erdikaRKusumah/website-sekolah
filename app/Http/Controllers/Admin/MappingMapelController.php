<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MappingMapel;
use App\Models\Subject;
use App\Models\Tapel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MappingMapelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Mapping Mata Pelajaran';
        $tapel = Tapel::findorfail(session()->get('tapel_id'));
        $data_mapel = Subject::where('tapel_id', $tapel->id)->orderBy('subject_name', 'ASC')->get();

        if (count($data_mapel) == 0) {
            $notifWarning = array
            (
                'message' => 'Mohon isikan data mata pelajaran',
                'alert-type' => 'warning'
            );
            return redirect('admin/subjects')->with($notifWarning);
        } else {
            foreach ($data_mapel as $mapel) {
                $mapping = MappingMapel::where('subject_id', $mapel->id)->first();
                if (is_null($mapping)) {
                    $mapel->nomor_urut = null;
                } else {
                    $mapel->nomor_urut = $mapping->nomor_urut;
                }
            }
            return view('admin.mapping.index', compact('title', 'data_mapel'));
        }
    }

    public function store(Request $request)
    {
        for ($count = 0; $count < count($request->subject_id); $count++) {
            $mapel_mapping = MappingMapel::where('subject_id', $request->subject_id[$count])->first();
            if (is_null($mapel_mapping)) {
                $mapping = new MappingMapel([
                    'subject_id' => $request->subject_id[$count],
                    'nomor_urut' => $request->nomor_urut[$count],
                ]);
                $mapping->save();
            } else {
                $update_mapping = [
                    'nomor_urut' => $request->nomor_urut[$count],
                ];
                $mapel_mapping->update($update_mapping);
            }
        }
        $notifSuccess = array
        (
            'message' => 'Mapping mata pelajaran berhasil disimpan',
            'alert-type' => 'success'
        );
        return redirect('admin/mapping')->with($notifSuccess);
    }

}
