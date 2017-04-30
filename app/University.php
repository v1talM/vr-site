<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class University extends Model
{
    protected $table = 'repositories';
    protected $fillable = [
        'pano_id', 'name', 'thumburl', 'original', 'pro_type', 'description', 'is_craw', 'is_crop'
    ];
}
