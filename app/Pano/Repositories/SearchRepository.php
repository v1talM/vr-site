<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/2 0002
 * Time: 下午 2:52
 */

namespace App\Pano\Repositories;


use App\Pano\Contracts\ModelFactoryContract;

class SearchRepository
{
    protected $product;
    /**
     * SearchRepository constructor.
     * @param $factory
     */
    public function __construct(ModelFactoryContract $factory)
    {
        $this->product = $factory->getProduct();
    }

    public function getProfilesByQuery(string $query)
    {
        $search = $this->product->search($query)->get();
        return $search;
    }
}