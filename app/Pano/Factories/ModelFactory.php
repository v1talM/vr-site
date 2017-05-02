<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/2 0002
 * Time: 下午 2:53
 */

namespace App\Pano\Factories;


use App\Pano\Contracts\ModelFactoryContract;
use App\Product;

class ModelFactory implements ModelFactoryContract
{
    static $profile;

    /**
     * ModelFactory constructor.
     * @param $profile
     */
    public function __construct()
    {
        self::$profile = new Product();
    }

    public function getProduct()
    {
        return self::$profile;
    }
}