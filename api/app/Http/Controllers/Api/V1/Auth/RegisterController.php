<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\User;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     */

    /**
     * @OA\Post(
     *   path="/api/auth/register",
     *   summary="Register method",
     *   tags={"Auth"},
     *   @OA\Parameter(
     *     name="name",
     *     in="query",
     *     required=true,
      *          @OA\Schema(
     *              type="string"
     *          )
     *   ),
     *   @OA\Parameter(
     *     name="email",
     *     in="query",
     *     required=true,
      *          @OA\Schema(
     *              type="string"
     *          )
     *   ),
     *   @OA\Parameter(
     *     name="password",
     *     in="query",
     *     required=true,
      *          @OA\Schema(
     *              type="string"
     *          )
     *   ),
     *   @OA\Response(
     *     response=200,
     *     description="Successful Operation"
     *   )
     * )
     *
     */
    public function __invoke(RegisterRequest $request)
    {
        $user = User::create($request->getData());


        return response()->json([
            'user' => $user,
            'token' => $user->createToken('laravel_api_token')->plainTextToken
        ]);
    }
}
