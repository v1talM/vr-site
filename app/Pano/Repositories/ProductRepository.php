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

    public function getAllProducts()
    {
        return Product::with('user')->get();
    }

    public function getProductsWithLimit($page = 1, $limit = 15)
    {
        if ( $page == 1) {
            return Product::take($limit)->with('user')->get();
        }
        $end = $page * $limit;
        $start = $end - $limit;
        return Product::skip($start)->take($limit)->with('user')->get();
    }

    public function getProductsTotal(){
        return Product::count();
    }

    public function getProductById($id)
    {
        return Product::whereId($id)->with('user')->first();
    }
}