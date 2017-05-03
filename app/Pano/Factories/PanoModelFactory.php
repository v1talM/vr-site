<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/3 0003
 * Time: 下午 5:55
 */

namespace App\Pano\Factories;


use App\Product;
use App\User;

class PanoModelFactory
{
    protected $product;
    protected $user;

    /**
     * PanoModelFactory constructor.
     * @param $product
     * @param $user
     */
    public function __construct(Product $product, User $user)
    {
        $this->product = $product;
        $this->user = $user;
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function getUser()
    {
        return $this->user;
    }
}