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

    /**
     * @OA\Get(
     *   path="/api/v1/satellite",
     *   summary="Get all satellites",
     *   tags={"satellite"},
     *   @OA\Response(
     *     response=200,
     *     description="Successful Operation"
     *   )
     * )
     */
    public function index()
    {
        return SatelliteResource::collection(Satellite::all());
    }

    /**
     * Store a newly created resource in storage.
     */

    /**
     * @OA\Schema(
     *   schema="CreateSatellite",
     *   type="object",
     *   @OA\Property(property="name", type="string"),
     *   @OA\Property(property="description", type="string"),
     *   @OA\Property(property="uf", type="string"),
     *   @OA\Property(property="avatar", type="string"),
     *   @OA\Property(property="location", type="string"),
     *   @OA\Property(property="active", type="string"),
     *   @OA\Property(property="category", type="string"),
     *   @OA\Property(property="start_date", type="string"),
     *   @OA\Property(property="end_date", type="string"),
     *   @OA\Property(property="height", type="string"),
     * )
     * @OA\Post(
     *   path="/api/v1/satellite",
     *   summary="Store specific Satellite",
     *   tags={"satellite"},
     *   @OA\RequestBody(@OA\JsonContent(ref="#/components/schemas/CreateSatellite")),
     *   @OA\Response(
     *     response=200,
     *     description="Successful Operation"
     *   )
     * )
     */
    public function store(StoreSatelliteRequest $request)
    {
        $satellite = Satellite::create($request->validated());

        return SatelliteResource::make($satellite);
    }

    /**
     * Display the specified resource.
     */
    /**
     * @OA\Get(
     *   path="/api/v1/satellite/{id}",
     *   summary="Get specific Satellite",
     *   tags={"satellite"},
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="string"
     *     )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Successful Operation"
     *   )
     * )
     */
    public function show(Satellite $satellite)
    {
        return SatelliteResource::make($satellite);
    }


    /**
     * Update the specified resource in storage.
     */
    /**
     * @OA\Schema(
     *   schema="UpdateSatellite",
     *   type="object",
     *   @OA\Property(property="name", type="string"),
     *   @OA\Property(property="description", type="string"),
     *   @OA\Property(property="uf", type="string"),
     *   @OA\Property(property="avatar", type="string"),
     *   @OA\Property(property="location", type="string"),
     *   @OA\Property(property="active", type="string"),
     *   @OA\Property(property="category", type="string"),
     *   @OA\Property(property="start_date", type="string"),
     *   @OA\Property(property="end_date", type="string"),
     *   @OA\Property(property="height", type="string"),
     * ),
     * @OA\Put(
     *   path="/api/v1/satellite/{id}",
     *   summary="Update specific Satellite",
     *   tags={"satellite"},
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="string"
     *     )
     *   ),
     *   @OA\RequestBody(@OA\JsonContent(ref="#/components/schemas/UpdateSatellite")),
     *   @OA\Response(
     *     response=200,
     *     description="Successful Operation"
     *   )
     * )
     */
    public function update(UpdateSatelliteRequest $request, Satellite $satellite)
    {
        $satellite->update($request->validated());

        return SatelliteResource::make($satellite);
    }

    /**
     * Remove the specified resource from storage.
     */
        /**
     * @OA\Delete(
     *   path="/api/v1/satellite/{id}",
     *   summary="Delete specific Satellite",
     *   tags={"satellite"},
     *   @OA\Parameter(
     *     name="id",
     *     in="path",
     *     required=true,
     *     @OA\Schema(
     *       type="string"
     *     )
     *   ),
     *   @OA\Response(response=200, description="Successful Operation"),
     * )
     *
     */
    public function destroy(Satellite $satellite)
    {
        $satellite->delete();

        return response()->noContent();
    }
}
