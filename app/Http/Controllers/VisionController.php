<?php

namespace App\Http\Controllers;

use App\Models\Vision;
use App\Http\Requests\StoreVisionRequest;
use App\Http\Requests\UpdateVisionRequest;

class VisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreVisionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVisionRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vision  $vision
     * @return \Illuminate\Http\Response
     */
    public function show(Vision $vision)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vision  $vision
     * @return \Illuminate\Http\Response
     */
    public function edit(Vision $vision)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateVisionRequest  $request
     * @param  \App\Models\Vision  $vision
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVisionRequest $request, Vision $vision)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vision  $vision
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vision $vision)
    {
        //
    }
}
