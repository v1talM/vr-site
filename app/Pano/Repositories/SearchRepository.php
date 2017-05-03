<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/2 0002
 * Time: 下午 2:52
 */

namespace App\Pano\Repositories;

use App\Pano\Contracts\SearchRepositoryInterface;
use App\Product;

/**
 * Class SearchRepository
 * @package App\Pano\Repositories
 */
class SearchRepository implements SearchRepositoryInterface
{
    /**
     * @var Product
     */
    protected $product;
    /**
     * SearchRepository constructor.
     * @param $factory
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * @param string $query
     * @return array
     */
    public function getProfilesByQuery(string $query)
    {
        $search = $this->product->search($query)->with('user')->get()->toArray();
        return $search;
    }
}