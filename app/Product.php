<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'pro_title', 'pro_thumb', 'pro_thumb_base64', 'pro_photo', 'pro_photo_base64', 'user_id'
    ];

}
