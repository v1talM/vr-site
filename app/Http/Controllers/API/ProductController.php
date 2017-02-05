<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\AddProRequest;
use App\Pano\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    protected $productRepository;

    /**
     * ProductController constructor.
     * @param $productRepository
     */
    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AddProRequest $request)
    {
        //作品缩略图base64格式编码
        $pro_thumb_base64 = $request->input('pro_thumb');
        //作品缩略图转换后路径
        $pro_thumb = $this->base64DecodeImage($pro_thumb_base64, 'thumb');
        //作品base64格式编码
        $pro_photo_base64 = $request->input('pro_photo');
        //作品转换后路径
        $pro_photo = $this->base64DecodeImage($pro_photo_base64, 'photo');
        $attributes = [
            'pro_title' => $request->input('pro_title'),
            'pro_thumb' => $pro_thumb,
            'pro_photo' => $pro_photo,
            'user_id' => $request->input('user_id')
        ];
        $this->productRepository->create($attributes);
        return response()->json([
            'info' => '作品上传成功!'
        ]);
    }

    /**
     * @param $base64_img
     * @param $name
     * @return \Illuminate\Http\JsonResponse|string
     */
    private function base64DecodeImage($base64_img, $name)
    {
        if( preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_img, $img) ){
            $type = $img[2];
            $upload_directory = 'uploads/'. date('Ymd',time()) . "/";
            if(!file_exists($upload_directory))
            {
                mkdir($upload_directory, 0700);
            }
            $new_file = $upload_directory . "{$name}_" . time() . ".{$type}";

            if(file_put_contents($new_file, base64_decode(str_replace($img[1], '', $base64_img)))){
                return $new_file;
            }else{
                return response()->json([
                    'info' => '图片保存失败'
                ], 422);
            }
        }
         return response()->json([ 'info' => '图片格式不正确' ], 422);
    }

    public function getAllProducts()
    {
        $products = $this->productRepository->getAllProducts();
        return response()->json([
            'info' => '获取数据成功!',
            'data' => $products
        ]);
    }

    public function getProductsWithLimit(Request $request)
    {
        $page = $request->input('page') ?: 1;
        $limit = env('PRODUCT_LIMIT');
        $products = $this->productRepository->getProductsWithLimit($page, $limit);
        return response()->json([
            'info' => '获取数据成功!',
            'data' => $products
        ]);
    }

    public function getProductsTotal()
    {
        $total = $this->productRepository->getProductsTotal();
        return response()->json([
            'info' => '获取数据成功!',
            'data' => $total
        ]);
    }
}
