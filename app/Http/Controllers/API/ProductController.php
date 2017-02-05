<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\AddProRequest;
use App\Pano\Repositories\ProductRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
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
     * 将用户上传的作品保存到数据库
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
        //背景音乐base64格式编码
        $pro_bgm_base64 = $request->input('pro_bgm');
        //背景音乐转换后路径
        $pro_bgm = $this->base64DecodeAudio($pro_bgm_base64, 'bgm');
        $attributes = [
            'pro_title' => $request->input('pro_title'),
            'pro_bgm' => $pro_bgm,
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
     * 将base64格式的图片内容解码并保存
     * @param $base64_img
     * @param $name
     * @return \Illuminate\Http\JsonResponse|string
     */
    private function base64DecodeImage($base64_img, $name)
    {
        if( preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_img, $img) ){
            $type = $img[2];
            $upload_directory = 'uploads/img/'. date('Ymd',time()) . "/";
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

    /**
     * 将Base64格式的音频文件解码并保存
     * @param $base64_audio
     * @param $name
     * @return \Illuminate\Http\JsonResponse|string
     */
    private function base64DecodeAudio($base64_audio, $name)
    {
        if( preg_match('/^(data:\s*audio\/(\w+);base64,)/', $base64_audio, $audio) ){
            $type = $audio[2];
            $upload_directory = 'uploads/audio/' . date('Ymd',time()) . "/";
            if(!file_exists($upload_directory))
            {
                mkdir($upload_directory, 0700);
            }
            $new_file = $upload_directory . "{$name}_" . time() . ".{$type}";
            if(file_put_contents($new_file, base64_decode(str_replace($audio[1], '', $base64_audio)))){
                return $new_file;
            }else{
                return response()->json([
                    'info' => '背景音乐保存失败'
                ], 422);
            }
        }
    }

    /**
     * 获取所有的vr作品
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllProducts()
    {
        $products = $this->productRepository->getAllProducts();
        return response()->json([
            'info' => '获取数据成功!',
            'data' => $products
        ]);
    }

    /**
     * 根据数量限制获取vr作品
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductsWithLimit(Request $request)
    {
        $page = $request->input('page') ?: 1;
        $limit = env('product_limit');
        $products = $this->productRepository->getProductsWithLimit($page, $limit);
        return response()->json([
            'info' => '获取数据成功!',
            'data' => $products
        ]);
    }

    /**
     * 获取vr作品总计数量
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductsTotal()
    {
        $total = $this->productRepository->getProductsTotal();
        return response()->json([
            'info' => '获取数据成功!',
            'data' => $total
        ]);
    }

    /**
     * 根据id获取vr作品
     * @param $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function getProductById($id)
    {
        $product = $this->productRepository->getProductById($id);
        return response()->json([
            'info' => '获取数据成功!',
            'data' => $product
        ]);
    }
}
