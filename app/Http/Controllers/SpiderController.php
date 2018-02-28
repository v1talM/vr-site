<?php

namespace App\Http\Controllers;

use App\University;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Intervention\Image\Exception\ImageException;
use Intervention\Image\Facades\Image;

class SpiderController extends Controller
{
    private $api_url = 'http://www.detu.com/cache/ajax/pano/data';
    private $client;
    private $image;

    /**
     * SpiderController constructor.
     * @param $client
     */
    public function __construct(Client $client, Image $image)
    {
        $this->client = $client;
        $this->image = $image;
    }

    public function getImage(Request $request)
    {
        $page = empty($request->input('page'))?1:$request->input('page');
        $size = empty($request->input('size'))?12:$request->input('size');
        $channelId = empty($request->input('channelId'))?24:$request->input('channelId');
        $res = $this->client->request('GET', 'http://www.detu.com/ajax/collection/getChannelList?page='.$page.'&pagesize='.$size.'&channelid='.$channelId.'&channelname=%E5%85%A8%E6%99%AF%E9%AB%98%E6%A0%A1', [
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36'
            ],
            'verify' => false
        ]);
        $channel = [
          24 => 3,
          16 => 2,
          17 => 2,
          15 => 1
        ];
        $origin_data =  $res->getBody()->getContents();
        $data = json_decode($origin_data);
        $pano = [];
        foreach ($data->data as $key => $item){
            $pano[$key]['pano_id'] = $item->pano->id;
            $pano[$key]['name'] = $item->name;
            $pano[$key]['thumburl'] = $item->pano->cover;
            $pano[$key]['pro_type'] =  isset($channel[$channelId])?$channel[$channelId]:1;
            University::firstOrCreate($pano[$key]);
        }
        return '数据爬取成功，已保存到数据表';
    }

    public function crawImage()
    {
        $uncroped = University::where('is_craw', '=', 0)->first();
        if($uncroped){
            $result = $this->getPagesfromURL($uncroped->pano_id);
            if(isset($result)){
                if($result == 'video'){
                    $uncroped->delete();
                }else{
                    $uncroped->is_craw = true;
                    $uncroped->original = $result['original'];
                    $uncroped->description = $result['description'];
                    $uncroped->save();
                }
            }else{
                $uncroped->is_craw = 2;
                $uncroped->save();
            }
            self::crawImage();
        }else{
            return '图片爬取完毕!';
        }
    }

    private function getPagesfromURL($id){
        //获取图片的url路径
        $url = $this->api_url . '?id=' . $id .'&type=json';
        //生成图片的路径及名称
        $upload_directory = 'uploads/img/'. $id . "/";
        $res = $this->client->request('GET', $url, [
            'headers' => [
                'User-Agent' => 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/47.0.2526.106 Safari/537.36'
            ],
            'verify' => false
        ]);
        $data = json_decode($res->getBody()->getContents());
        $scene = $data->scenes[0];
        $description = $data->imagedes;
        if($scene->width > 19000){
            return null;
        }
        if($scene->isvideo != 'true'){
            if(!file_exists($upload_directory))
            {
                mkdir($upload_directory, 0700);
            }
            //保存全景图
            $img = Image::make($scene->original);
            $img->resize(4096, 2048);
            //生成图片名称及路径
            $new_file = $upload_directory . "photo_" . $id . '.jpg';
            try{
                $img->save($new_file, 90);
                $img->destroy();
            }catch(ImageException $e){
		        return null;
            }
            $datas = [
                'original' => $new_file,
                'description' => $description
            ];
            return $datas;
        }
        return 'video';
    }

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
                $url = $path . "{$count}" . '.jpeg';
                $crop_img->save($url);
                $cropImageURL[] = $url;
                $image->reset();
                $count++;
            }
        }
        return $cropImageURL;
    }

}
