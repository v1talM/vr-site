<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

/**
 * Class Product
 * @package App
 */
class Product extends Model
{
    use Searchable;
    /**
     * @var string
     */
    protected $table ='profiles';
    /**
     * @var array
     */
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

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * @return string
     */
    public function searchableAs()
    {
        return 'profiles_index';
    }

    /**
     * @return array
     */
    public function toSearchableArray()
    {
        $array = $this->toArray();
        return $array;
    }
}
