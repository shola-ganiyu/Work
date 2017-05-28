<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //

    public function postsCat()
    {

      return  $this->belongsToMany('App\Post');

    }

    public $fillable = [

    	'name',
    ];
}
