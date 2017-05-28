<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\User;
use App\Post;
use Auth;

class ProfileController extends Controller
{
    //
    public function profile($id)
    {
    	$fav = DB::table('post_user')->whereUserId(Auth::user()->id)->pluck('post_id')->all();
    	$user = User::find($id);
    	if($user->id != Auth::user()->id)
    	{
    		return redirect('/');
    	}
    	else
    	{
    		return view('profile',compact('user','fav'));
    	}
    }

    public function favorite($id)
    {

    	$fav = DB::table('post_user')->whereUserId(Auth::user()->id)->pluck('post_id')->all();
    	$id = Auth::user()->id;
    	$user = User::find($id);
    	if($user->id != Auth::user()->id)
    	{
    		return redirect('/');
    	}
    	else
    	{
    		return view('favorites',compact('user','fav'));
    	}
    	
    }

    public function store($id)
    {
        	$posts = Post::find($id);
        	$posts->users()->sync([Auth::user()->id],false);
        	return redirect('/');
    }

    public function destroy($uid, $pid)
    {
        	$posts = Post::find($pid);
        	$posts->users()->detach();
        	$posts->save();
        	return redirect()->route('favorites',$uid);
        	// return back();
    }

    

    
}
