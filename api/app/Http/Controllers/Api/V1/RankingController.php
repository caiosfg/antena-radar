<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Resources\RankingResource;
use App\Models\Satellite;

class RankingController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    /**
     * @OA\Get(
     *   path="/api/v1/ranking",
     *   summary="Get all ranking datas",
     *   tags={"ranking"},
     *   @OA\Response(
     *     response=200,
     *     description="Successful Operation"
     *   )
     * )
     */
    public function getUfsRanking()
    {
        return RankingResource::collection(Satellite::groupBy('uf')->selectRaw('count(*) as total, uf')->get());
    }

}
