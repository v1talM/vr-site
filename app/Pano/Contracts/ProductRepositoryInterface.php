<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/3 0003
 * Time: 上午 10:07
 */

namespace App\Pano\Contracts;


/**
 * Interface ProductRepositoryInterface
 * @package App\Pano\Contracts
 */
interface ProductRepositoryInterface
{
    /**
     * @param array $attribute
     * @return mixed
     */
    public function create(array $attribute);

    /**
     * @return mixed
     */
    public function getAllProducts();

    /**
     * @param $page
     * @param $limit
     * @param $type
     * @return mixed
     */
    public function getProductsWithLimit($page, $limit, $type);

    /**
     * @return mixed
     */
    public function getProductsTotal();

    /**
     * @param int $id
     * @return mixed
     */
    public function getProductById(int $id);

    /**
     * @param int $limit
     * @return mixed
     */
    public function getFeaturedWithLimit(int $limit);
}