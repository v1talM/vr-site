<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'pro_title', 'pro_thumb',  'pro_photo', 'pro_bgm', 'user_id'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
