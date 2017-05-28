<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Item;

class ItemCRUDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = Item::orderBy('id','desc')->paginate(10);

        return view('itemCRUD.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        return view('itemCRUD.create');

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

              'title'=>'required|unique:items|max:255',
              'description'=>'required|max:255'
              
             ]);
            Item::create($request->all());
            
           return redirect()->route('itemCRUD.index')->with('success','Item created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $items = Item::find($id);
        return view('itemCRUD.show',compact('items'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $items = Item::find($id);
        return view('itemCRUD.edit',compact('items'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $this->validate($request,[

               'title'=>'required|unique:items|max:255',
               'description'=>'required|max:255'
              
             ]);
            Item::find($id)->update($request->all());
            return redirect()->route('itemCRUD.index')->with('success',"item updated successfully");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Item::find($id)->delete();
        return redirect()->route('itemCRUD.index')->with('success',"item deleted successfully");
    }
}
