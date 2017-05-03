<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/2 0002
 * Time: 下午 2:52
 */

namespace App\Pano\Repositories;

use App\Pano\Contracts\SearchRepositoryInterface;
use App\Pano\Factories\PanoModelFactory;
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

    protected $user;
    /**
     * SearchRepository constructor.
     * @param $factory
     */
    public function __construct(PanoModelFactory $modelFactory)
    {
        $this->product = $modelFactory->getProduct();
        $this->user = $modelFactory->getUser();
    }

    /**
     * @param string $query
     * @return array
     */
    public function getProfilesByQuery(string $query)
    {
        $search = $this->product->search($query)->get()->toArray();
        $array = $this->setAttributes($search);
        dd($array);
        return $search;
    }

    private function setAttributes(array $data)
    {
        $array = [];
        foreach ($data as $key => $item){
            $item['user'] = $this->user->whereId($item['user_id'])->get();
            $array[$key] = $item;
        }
        return $array;
    }
}