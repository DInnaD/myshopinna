<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelatedProduct extends Model
{
    protected $fillable = ['id', 'product_id', 'related_id'];

}
