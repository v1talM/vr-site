<?php

namespace App\Http\Controllers\API;

use App\Pano\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    protected $userRepository;

    /**
     * UserController constructor.
     * @param $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getUserInfoByToken(Request $request)
    {
        $user_id= $request->user();
        return $this->getUserInfoById($user_id);
    }

    public function getUserInfoById($id)
    {
        return $this->userRepository->getUserInfoById($id);
    }

    public function getUserProducts($user_id)
    {
        return $this->userRepository->getUserProducts($user_id);
    }
}
