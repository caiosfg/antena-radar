<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSatelliteRequest;
use App\Http\Requests\UpdateSatelliteRequest;
use App\Models\Satellite;

class SatelliteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSatelliteRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Satellite $satellite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Satellite $satellite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSatelliteRequest $request, Satellite $satellite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Satellite $satellite)
    {
        //
    }
}
