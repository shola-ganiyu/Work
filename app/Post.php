<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function tags(){

    	return $this->belongsToMany('App\Tag');
    }

    public function categories()
    {

    	return $this->belongsToMany('App\Category');
    }
    public function users()
    {
        return $this->belongsToMany('App\User');
    }
    // public function comments()
    // {
        // return $this->hasMany('App\Comment');
    // }

    public function scopeSearch($query,$search) 
    {
        return $query->where('title','LIKE',"%$search%");
    }
    
    public $fillable = [
        'title', 'body', 'slug','name',
    ];
}
