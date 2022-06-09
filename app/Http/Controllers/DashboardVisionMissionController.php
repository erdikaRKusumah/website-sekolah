<?php

namespace App\Http\Controllers;

use App\Models\VisionMission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\storage;

class DashboardVisionMissionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('dashboard.vision_missions.index', [
            'vision_missions' => VisionMission::all()
            // 'visions' => vision::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.visions.create', [
            // 'vision_missions' => VisionMission::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VisionMission  $visionMission
     * @return \Illuminate\Http\Response
     */
    public function show(VisionMission $visionMission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\VisionMission  $visionMission
     * @return \Illuminate\Http\Response
     */
    public function edit(VisionMission $visionMission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VisionMission  $visionMission
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VisionMission $visionMission)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VisionMission  $visionMission
     * @return \Illuminate\Http\Response
     */
    public function destroy(VisionMission $visionMission)
    {
        //
    }
}
