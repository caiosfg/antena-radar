<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSatelliteRequest;
use App\Http\Requests\UpdateSatelliteRequest;
use App\Http\Resources\SatelliteResource;
use App\Models\Satellite;

class SatelliteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return SatelliteResource::collection(Satellite::all());
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
        return SatelliteResource::make($satellite);
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
