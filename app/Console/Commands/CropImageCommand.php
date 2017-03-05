<?php

namespace App\Console\Commands;

use App\Product;
use App\University;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Intervention\Image\Exception\ImageException;
use Intervention\Image\Facades\Image;

class CropImageCommand extends Command
{
    private $university;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'image:crop';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'crop image which is downloaded';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct(University $university)
    {
        parent::__construct();
        $this->university = $university;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Log::info('1');
//        $university = $this->university->where('is_craw', '=', 1)->where('is_crop', '=', 0)->first();
//        $thumb = $university->thumburl;
//        $img = Image::make($thumb);
//        $directory = 'uploads/img/'. $university->pano_id;
//        $public_path = public_path($directory);
//        $file_name = "/thumb_" . $university->pano_id . '.jpg';
//        $file = $public_path.$file_name;
//        try{
//            $img->save($file, 90);
//        }catch (ImageException $e){
//            $this->info($e->getMessage());
//            return ;
//        }
//        $university->is_crop = true;
//        $university->save();
//        $product = Product::create([
//            'pro_title' => $university->name,
//            'pro_thumb' => $directory.$file_name,
//            'pro_photo' => $university->original,
//            'user_id' => 1
//        ]);
    }
}
