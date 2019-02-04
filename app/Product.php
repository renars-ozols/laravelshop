<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;


class Product extends Model
{
    use Sluggable;

    protected $fillable = [
        'name', 'category_id', 'image', 'price', 'description'
    ];

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
