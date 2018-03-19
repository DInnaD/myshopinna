<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Tag extends Model
{
    use Sluggable;

    protected $fillable = ['id', 'title', 'slug'];

    public function products()
    {
        return $this->belongsToMany(
            Product::class,
            'product_tags',
            'tag_id',
            'product_id'
        );
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
