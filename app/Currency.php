<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $fillable = ['id', 'title', 'code', 'symbol_left', 'symbol_right', 'value'];
}
