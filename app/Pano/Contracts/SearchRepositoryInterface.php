<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2017/5/3 0003
 * Time: 上午 9:18
 */

namespace App\Pano\Contracts;


/**
 * Interface SearchRepositoryInterface
 * @package App\Pano\Contracts
 */
interface SearchRepositoryInterface
{
    /**
     * @param string $query
     * @return mixed
     */
    public function getProfilesByQuery(string $query);
}