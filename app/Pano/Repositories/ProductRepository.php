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
    protected $product;

    /**
     * ProductRepository constructor.
     * @param $product
     */
    public function __construct(Product $product)
    {
        $this->product = $product;
    }


    /**
     * 保存vr信息到数据库
     * @param array $attribute
     * @return object
     */
    public function create(array $attribute)
    {
        return $this->product->create($attribute);
    }

    /**
     * 获取数据库里面所有的vr信息
     * @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAllProducts()
    {
        return $this->product->with('user')->get();
    }

    /**
     * 根据页码获取数据库中指定数量的vr信息
     * @param int $page
     * @param int $limit
     * @return mixed
     */
    public function getProductsWithLimit($page = 1, $limit = 15, $type = 0)
    {
        $where = ($type == 0)?:['pro_type', '=', $type];
        if ( $page == 1 ) {
            return $this->product
                ->$where
                ->orderBy('id','desc')
                ->take($limit)
                ->with('user')
                ->get();
        }
        $end = $page * $limit;
        $start = $end - $limit;
        return $this->product
            ->$where
            ->orderBy('id','desc')
            ->skip($start)
            ->take($limit)
            ->with('user')
            ->get();
    }

    /**
     * 获取数据库中vr数量总计
     * @return mixed
     */
    public function getProductsTotal(){
        return $this->product->count();
    }

    /**
     * 根据id获取数据库中指定的Vr信息
     * @param $id
     * @return mixed
     */
    public function getProductById($id)
    {
        return $this->product->whereId($id)->with('user')->first();
    }

    /**
     * 根据限制获取精品vr作品
     * @param $limit
     * @return mixed
     */
    public function getFeaturedWithLimit($limit)
    {
        return $this->product->where('featured', '=', 1)
                ->orderBy('created_at','desc')
                ->with('user')
                ->take($limit)
                ->get();
    }
}
