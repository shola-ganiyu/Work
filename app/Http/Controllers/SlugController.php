<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class SlugController extends Controller
{
    //

    public function slug(Request $request, $slug)
    {
    	$query=$request->get('q');
    	if($query)
    	{
    		$posts = $query?Post::search($query)->orderBy('id','desc')->paginate(5):Post::all();
    		return view('home',compact('posts'));
    	}
    	else
    	{
    		$posts = Post::where("slug",'=',$slug)->first();
    	   return view("b.slug",compact("posts"));
    	}
    }
}
