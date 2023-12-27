<?php

namespace App\Http\Controllers\Auth;


use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use App\Services\HttpResponse\Facades\HttpResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware(["auth:sanctum"])->except(['login','register']);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        if (Auth::attempt($request->validated())) {
            return HttpResponse::success([
                'api_token' => auth()->user()->createToken($request->header('User-Agent', 'Other'))->plainTextToken,
                'user' => auth()->user(),
            ]);
        }
        return HttpResponse::unAuthorized();
    }

    public function register(RegisterRequest $request): JsonResponse
    {
        User::query()->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);
        return HttpResponse::success([],__("Register success"));
    }

    public function getInfoUser(): JsonResponse
    {
        return HttpResponse::success([
            'user' => auth()->user(),
        ]);
    }
}
