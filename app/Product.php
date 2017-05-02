<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use Searchable;
    protected $table='profiles';
    protected $fillable = [
        'pro_title',
        'pro_thumb',
        'pro_description',
        'pro_photo',
        'pro_type',
        'pro_bgm',
        'user_id',
        'featured',
        'favorite',
        'deleted',
        'view'
    ];

    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function searchableAs()
    {
        return 'profiles_index';
    }

    public function toSearchableArray()
    {
        $array = $this->toArray();
        return $array;
    }
}
