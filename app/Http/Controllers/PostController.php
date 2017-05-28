<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Post;
use App\Tag;
use App\Category;
use Illuminate\Http\Request;
use Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
         if(Auth::check())
         {

           $fav = DB::table('post_user')->whereUserId(Auth::user()->id)->pluck('post_id')->all();
         }
        $query=$request->get('q');
        if($query)
        {
            $posts=$query?Post::search($query)->orderBy('id','desc')->paginate(5):Post::all();
            return view('home',compact('posts','fav'));
        }
        else
        {
            $posts = Post::orderBy("id","desc")->paginate(5);
            return view('home',compact("posts",'fav'));
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
        $tags = Tag::all();
        $categories = Category::all();
        return view('posts.create',compact('tags','categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         // $title = $request->title;
        // $slug = $request->slug;
         // $body = $request->body;

        // DB::table("posts")->insert(array('title' =>$title,"slug"=>$slug,"body"=>$body));
        // echo $body;
        //
         $this->validate($request,array(

                  "title"=>"required|max:255",
                  "slug"=>"required|min:3|max:255|unique:posts",
                  "body"=>"required"
            ));
        
             $posts = Post::create($request->all());
            $posts->tags()->sync($request->tags, false);
            $posts->categories()->sync($request->categories, false);
            return redirect()->route('posts.show',compact('posts'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
            // $tags = Tag::all();
            $posts =  Post::find($post);
            return view('posts.show',compact('posts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        //
          $tags = Tag::all();
          $categories = Category::all();
          $posts = Post::find($post);
         return view("posts.update",compact("posts",'tags','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, Post $post)
    {
        //
    
            $this->validate($request, array(

                'title' =>"required|max:255",
                "slug" =>"required|min:3|max:255|unique:posts",
                "body" =>"required"


          ));

            $posts = Post::find($post)->update($request->all());

            if(isset($request->tags) || isset($request->categories)){

                $posts->tags()->sync($request->tags);
                $posts->categories()->sync($request->categories);
            }else{

                $posts->tags()->sync(array());
                $posts->categories()->sync(array());
            }

             return redirect()->route("posts.show",compact('posts'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        //

        $posts = Post::find($post);
        $posts->tags()->detach();
        $posts->categories()->detach();
        $posts = Post::delete($post);
        return redirect('/');
    }

    
}
