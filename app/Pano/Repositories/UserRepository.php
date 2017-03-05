<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/2/16 0016
 * Time: 下午 3:40
 */

namespace App\Pano\Repositories;
use App\User;

class UserRepository
{
    /**
     * @var User
     */
    protected $user;

    /**
     * UserRepository constructor.
     * @param $user
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getUserInfoById($id)
    {
        return $this->user->whereId($id)->with('products')->first();
    }

    public function getUserProducts($userID)
    {
        return $this->user->whereId($userID)->products()->get();
    }
}