<?php

/**
 * Created by PhpStorm.
 * User: Ian Vital
 * Date: 2017/2/2 0002
 * Time: 下午 12:04
 */
namespace App\Pano\Repositories;
use App\Product;

class ProductRepository
{
    public function create(array $attribute)
    {
        return Product::create($attribute);
    }

}