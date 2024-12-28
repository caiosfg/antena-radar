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
     * Store a newly created resource in storage.
     */
    public function store(StoreSatelliteRequest $request)
    {
        $satellite = Satellite::create($request->validated());

        return SatelliteResource::make($satellite);
    }

    /**
     * Display the specified resource.
     */
    public function show(Satellite $satellite)
    {
        return SatelliteResource::make($satellite);
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSatelliteRequest $request, Satellite $satellite)
    {
        $satellite->update($request->validated());

        return SatelliteResource::make($satellite);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Satellite $satellite)
    {
        $satellite->delete();

        return response()->noContent();
    }
}
