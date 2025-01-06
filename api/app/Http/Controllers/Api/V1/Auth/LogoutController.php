<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     */

    /**
     * @OA\Post(
     *   path="/api/auth/logout",
     *   summary="Logout method",
     *   tags={"Auth"},
     *   @OA\Parameter(
     *     name="access_token",
     *     in="query",
     *     required=true,
      *          @OA\Schema(
     *              type="string"
     *          )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Successful Operation"
     *   ),
     *   security={{ "security": {} }}
     * )
     *
     */

    public function __invoke(Request $request)
    {
       $request->user()->currentAccessToken()->delete();
    }
}
