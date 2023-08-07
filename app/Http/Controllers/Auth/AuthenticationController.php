<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\LoginResource;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
  public function login(Request $request)
  {
    $credentials = $request->validate([
      'email' => ['required', 'email'],
      'password' => ['required'],
    ]);

    if (Auth::attempt($credentials)) {

      $payload = [
        'email' => $request->email,
        'password' => $request->password,
        mt_rand(999, 999999)
      ];

      $jwt = JWT::encode($payload, 'key_jwt', 'HS256');

      return response()->json([
        'access_token' => $jwt,
      ]);
    }

    return response()->json(
      [
        'success' => false,
        'message' => 'The provided credentials do not match our records.',
        'errors' => [
          'email' => 'The provided credentials do not match our records.',
        ]
      ],
      Response::HTTP_UNAUTHORIZED
    );
  }
}
