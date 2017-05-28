<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;
use Session;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

         $todos = Todo::orderBy('id','asc')->paginate(10);
        
         return view("todo.index",compact("todos"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('todo.create');
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

                "name"=>"required|min:6|max:32",
                "email"=>"required|min:6|max:32|email",
                "age"=>"required|numeric",
                "sex"=>"required"
            ],
            [

                "name.required"=>"Name field is required",
                "name.min"=>"name must be 6 characters in length",
                "name.max"=>"Name cannot be more than 32 characters.",
                "email.required"=>"Email field is required",
                "email.min"=>"email must be minimum of 6 characters",
                "email.max"=>"Email cannot be more than 32 characters.",
                "age.required"=>"Age field is required",
                "age.numeric"=>"Age must be a number",
                "sex.required"=>"The sex field must be checked"
            ]);
            
            $todos = Todo::create($request->all());
           Session::flash('success','you have succesfully created a todo');
            return redirect()->route("todo.index",compact('todos'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function show(Todo $todo)
    {
        //
        $todos = Todo::find($todo);
        return view("todo.show",compact("todos"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        //

        $todos = Todo::find($todo);
        return view('todo.edit',compact("todos"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        //
        $this->validate($request,[

                "name"=>"required|min:6|max:32",
                "email"=>"required|min:6|max:32|email",
                "age"=>"required|numeric",
                "sex"=>"required"

            ],
            [

                "name.required"=>"name field is required",
                "name.min"=>"name must be 6 characters in length",
                "name.max"=>"name cannot be more than 32 characters",
                "email.required"=>"email cannot be empty",
                "email.min"=>"email must be minimum of 6 characters",
                "email.max"=>"email cannot exceed 32 characters",
                "email.email"=>"email must be a valid email",
                "age.required"=>"age is required",
                "age.numeric"=>"age must be a number",
                "sex.required"=>"sex field must be checked"
            ]);

              Todo::find($todo)->update($request->all());
              Session::flash('success','you have successfully updated your todo');
              return redirect()->route('todo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        //
             $todos = Todo::find($todo);
             $todos->delete();
             Session::flash('success','you have successfully deleted your todo');
             return redirect()->route('todo.index');

    }
}
