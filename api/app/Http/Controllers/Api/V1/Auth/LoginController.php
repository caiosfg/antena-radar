<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /**
     * Handle the incoming request.
     */

    /**
     * @OA\Post(
     *   path="/api/auth/login",
     *   summary="Login method",
     *   tags={"Auth"},
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
    public function __invoke(LoginRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password )) {
            throw ValidationException::withMessages([
                'email' => ['Invalid credentials']
            ]);
        }

        return response()->json([
            'user' => $user,
            'token' => $user->createToken('laravel_api_token')->plainTextToken
        ]);
    }
}
