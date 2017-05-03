<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\AddProRequest;
use App\Pano\Contracts\ProductRepositoryInterface;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;

/**
 * Class ProductController
 * @package App\Http\Controllers\API
 */
class ProductController extends Controller
{

    /**
     * @var ProductRepositoryInterface
     */
    protected $productRepository;

    /**
     * ProductController constructor.
     * @param $productRepository
     */
    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * 根据base64格式创建缩略图
     * @param $base64_img
     * @return \Illuminate\Http\JsonResponse|string
     */
    private function createThumbImage($base64_img)
    {
        if( preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_img, $img) ) {
            //图片保存路径
            $type = $img[2];
            $upload_directory = 'uploads/img/'. date('Ymd',time()) . "/";
            if(!file_exists($upload_directory))
            {
                mkdir($upload_directory, 0700);
            }
            //获取图片信息
            $img = $this->getImageInfo(base64_decode(str_replace($img[1], '', $base64_img)));
            $img->resize(null, 400, function ($constraint) {
                $constraint->aspectRatio();
            });
            //生成图片名称及路径
            $new_file = $upload_directory . "thumb_" . time() . ".{$type}";
            if($img->save($new_file)){
                return $new_file;
            }
            return response()->json([ 'info' => '图片上传失败' ], 422);
        }
    }

    /**
     * 根据base64格式创建作品图
     * @param $base64_img
     * @return \Illuminate\Http\JsonResponse|string
     */
    private function createProductionImage($base64_img)
    {
        if( preg_match('/^(data:\s*image\/(\w+);base64,)/', $base64_img, $img) ) {
            //图片保存路径
            $type = $img[2];
            $upload_directory = 'uploads/img/'. date('Ymd',time()) . "/";
            if(!file_exists($upload_directory))
            {
                mkdir($upload_directory, 0700);
            }
            //获取图片信息
            $img = $this->getImageInfo(base64_decode(str_replace($img[1], '', $base64_img)));
            $img_width = intval( $img->getWidth() / 1000 );
            $img->resize($img_width * 1024, null, function ($constraint){
                $constraint->aspectRatio();
            });
            //生成图片名称及路径
            $new_file = $upload_directory . "photo_" . time();
//            取消切图
//            $cropImageURL = $this->cropImage($img, $new_file);
            $des_url = $new_file . "_original.{$type}";
            $originImageURL = $img->save($des_url);
            if($originImageURL){
                return $des_url;
            }
            return response()->json([ 'info' => '图片上传失败' ], 422);
        }
    }
    
    /**
     * 根据base64编码获取图片信息
     * @param $image
     * @return mixed
     */
    private function getImageInfo($image)
    {
        return Image::make($image);
    }

    /**
     * 将用户上传的作品切图并保存
     * @param \Intervention\Image\Image $image
     * @param $path
     * @return array
     */
    private function cropImage(\Intervention\Image\Image $image, $path)
    {
        $width = $image->width();
        $height = $image->height();
        $part = env('PHOTO_CROP_PART');
        $divide = env('PHOTO_CROP_UNIT');
        $crop_width = $width / $divide;
        $count = 0;
        $cropImageURL = [];
        for($i = 0; $i < $part; $i++){
            for($j = 0; $j < $divide; $j++){
                $image->backup();
                $crop_img = $image->crop($crop_width, $height / $part, $crop_width * $j, $i * ($height / $part));
                $url = $path . "_{$count}" . '.jpeg';
                $crop_img->save($url);
                $cropImageURL[] = $url;
                $image->reset();
                $count++;
            }
        }
        return $cropImageURL;
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
     * Store a newly created resource in storage.
     * 将用户上传的作品保存到数据库
     * @return \Illuminate\Http\Response
     */
    public function store(AddProRequest $request)
    {
        //作品缩略图base64格式编码
        $pro_thumb_base64 = $request->input('pro_thumb');
        //作品缩略图转换后路径
        $pro_thumb = $this->createThumbImage($pro_thumb_base64);
        //作品base64格式编码
        $pro_photo_base64 = $request->input('pro_photo');
        //作品转换后路径
        $pro_photo = $this->createProductionImage($pro_photo_base64);
        //背景音乐base64格式编码
        $pro_bgm_base64 = $request->input('pro_bgm');
        //背景音乐转换后路径
        if($pro_bgm_base64){
            $pro_bgm = $this->base64DecodeAudio($pro_bgm_base64, 'bgm');
        }else{
            $pro_bgm = '';
        }
        if((!$pro_thumb) || (!$pro_photo)){
            return response()->json([
                'info' => '图片上传失败，请检查图片格式是否正确'
            ], 422);
        }
        $attributes = [
            'pro_title' => $request->input('pro_title'),
            'pro_description' => $request->input('pro_description'),
            'pro_bgm' => $pro_bgm,
            'pro_type' => $request->input('pro_type'),
            'pro_thumb' => $pro_thumb,
            'pro_photo' => $pro_photo,
            'user_id' => $request->input('user_id'),
            'featured' => 0,
            'favorite' => 0,
            'deleted' => 0,
            'view' => 0
        ];
        $this->productRepository->create($attributes);
        return response()->json([
            'info' => '作品上传成功!'
        ]);
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
        $limit = $request->input('size') ?: env('PRODUCT_LIMIT');
        $type = $request->input('type') ?: 0;
        $products = $this->productRepository->getProductsWithLimit($page, $limit, $type);
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

    /**
     * 获取首页精品vr作品列表
     * @return mixed
     */
    public function getFeatured()
    {
        $feature_limit = config('production.featured.limit');
        return $this->productRepository->getFeaturedWithLimit($feature_limit);
    }

}
