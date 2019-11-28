<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Food extends Model
{
    //
    use SoftDeletes;

    protected $guarded = array('id');
    protected $dates = ['deleted_at'];
}
