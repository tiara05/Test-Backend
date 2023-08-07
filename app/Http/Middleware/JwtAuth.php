<?php

namespace App\Http\Middleware;

use Closure;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class JwtAuth
{
  /**
   * Handle an incoming request.
   *
   * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
   */
  public function handle(Request $request, Closure $next): Response
  {
    $headers = $request->headers;

    $flag_jwt = $headers->get('authorization');

    $flag_jwt = explode(' ', $flag_jwt);

    $jwt = $flag_jwt[1];

    $decode = JWT::decode($jwt, new Key('key_jwt', 'HS256'));

    $credentials = [
      'email' => $decode->email,
      'password' => $decode->password,
    ];

    return Auth::attempt($credentials) ? $next($request) : abort(404);
  }
}
