<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\AuthUserRequest;
use App\Http\Requests\RegistUserRequest;
use App\User;
use App\Http\Controllers\Controller;
use GuzzleHttp\Client;

class AuthController extends Controller
{
    protected $user;
    protected $http;
    /**
     * AuthController constructor.
     * @param $http
     * @param $user
     */
    public function __construct(User $user, Client $http)
    {
        $this->user = $user;
        $this->http = $http;
    }

    public function login(AuthUserRequest $request)
    {
        $userObj = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];


        return response()->json($userObj);
    }

    public function regist(RegistUserRequest $request)
    {
        $userObj = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password'))
        ];
        $userObj = $this->user->create($userObj);
        return response()->json([
            'info' => '用户注册成功!',
            'data' => $userObj
        ]);
    }
}
