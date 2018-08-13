<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Contracts\Auth\Factory as Auth;
use App\User;


class Authenticate
{
    /**
     * The authentication guard factory instance.
     *
     * @var \Illuminate\Contracts\Auth\Factory
     */
    protected $auth;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Auth\Factory  $auth
     * @return void
     */
    public function __construct(Auth $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        $headers = [
            'Access-Control-Allow-Origin'      => '*',
            'Access-Control-Allow-Methods'     => 'POST, GET',
            'Access-Control-Allow-Credentials' => 'true',
            'Access-Control-Max-Age'           => '86400',
            'Access-Control-Allow-Headers'     => 'Content-Type, Authorization, X-Requested-With'
        ];

        if ($this->auth->guard($guard)->guest()) {
            if ($request->has('api_token')) {
              $token = $request->input('api_token');
              $check_token = User::where('api_token', $token)->first();
              if ($check_token == null) {
                  $res['success'] = false;
                  $res['message'] = 'Error Token. Permission not allowed!';
                  return response($res);
              }
            }else{
              $res['success'] = false;
              $res['message'] = 'Please Login!';
              return response($res);
            }
        }

        $response = $next($request);
        foreach($headers as $key => $value)
        {
            $response->header($key, $value);
        }

        return $response;
        // if ($this->auth->guard($guard)->guest()) {
        //     return response('Unauthorized.', 401);
        // }

        // return $next($request);
    }
}
