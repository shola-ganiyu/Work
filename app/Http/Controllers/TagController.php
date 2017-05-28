<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Tag;
use App\Post;
use Session;
use Auth;


class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $fav = DB::table('post_user')->whereUserId(Auth::user()->id)->pluck('post_id')->all();
        $query=$request->get('q');
        if($query)
        {
            $posts=$query?Post::search($query)->orderBy('id','desc')->paginate(5):Post::all();
            return view('home',compact('posts'));
        }
        else
        {
           $tags = Tag::orderBy('name')->paginate(5);

           return view('tags.index',compact('tags'));
        }
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[

            'name'=>'required|max:255'

            ]);
        $tags = Tag::create($request->all());
        Session::flash('success','tag save successfully');
        return redirect()->route('tags.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
        $tags = Tag::find($tag);
        return view('tags.show',compact('tags'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
        $tags = Tag::find($tag);
        return view('tags.edit',compact('tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        //
        
        $this->validate($request,[

            'name'=>'required|max:255'
            ]);
        $tags = Tag::find($tag)->update($request->all());
        return redirect()->route('tags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        //
        $tags = Tag::find($tag);
        $tags->posts()->detach()->destroy($tag);
        Session::flash('success','tag deleted successfully');
        return redirect()->route('tags.index');
    }
}
