<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('jwt-auth:' . $this->getGuardId())->except(['login', 'register']);
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->role = $request->role;
        $user->password = bcrypt($request->password);

        if ($request->parent_id) {
            $user->parent_id = $request->parent_id;
        }

        $user->save();

        $user = User::where('email', $request->email)->first();

        $jwt_token = $this->attemptLogin($request);

        return $this->responseWithToken($jwt_token, ['data' => $user]);
    }


    public function login(LoginRequest $request): JsonResponse
    {
        $jwt_token = $this->attemptLogin($request);

        if (!$jwt_token) {
            return $this->responseError('auth_fail', 401);
        }

        $user = User::where('email', $request->email)->first();

        return $this->responseWithToken($jwt_token, ['data' => $user]);
    }

    /**
     * @return JsonResponse
     */
    public function getMe(): JsonResponse
    {
        return $this->responseSuccess(User::where(['id' => $this->getGuard()->id()])->first(), 200);
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\Routing\ResponseFactory|Response
     */
    public function logout()
    {
        $this->getGuard()->logout();
        return response('', 204);
    }

    protected function attemptLogin(Request $request)
    {
        $input = $request->only('email', 'password');
        $jwt_token = JWTAuth::attempt($input);

        return !$jwt_token ? false : $jwt_token;
    }

    protected function responseWithToken($token, $data = []): JsonResponse
    {
        return response()->json([
                'access_token' => $token,
                'token_type' => 'bearer'
            ] + $data);
    }
}
