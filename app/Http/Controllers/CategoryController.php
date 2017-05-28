<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Auth;

class CategoryController extends Controller
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
           $categories = Category::orderBy('name')->paginate(5);
           return view('categories.index',compact('categories'));
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
        $categories = Category::create($request->all());
        return redirect()->route('categories.index');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //

        $categories = Category::find($category);
        return view('categories.show',compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //

        $categories = Category::find($category);
        return view('categories.edit',compact('categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //

        $this->validate($request,[

            'name'=>'required|max:255'
            ]);

            $categories = Category::find($category)->update($request->all());
            return redirect()->route('categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
        $categories = Category::find($category);
        $categories->postsCat()->detach()->delete($category);
        return redirect()->route('categories.index');
    }
}
