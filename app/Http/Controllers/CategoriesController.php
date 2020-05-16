<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::orderBy('created_at', 'desc')->paginate(20);
        return view('admins.categories.create', compact('categories'));
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
        $this->validate($request, [
            'name' => 'required',
        ]);

        if(Category::where('name', $request->name)->exists()){
            Session::flash('warning', 'This category is already added');
            return redirect()->back();
        }
        $category = Category::create([
            'name'=> $request->name,
            'slug' => str_slug($request->name)
        ]);

        Session::flash('success', 'Category created successfully');
        return redirect()->back();
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


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        //
        $category = Category::where('slug', $slug)->first();
        return view('admins.categories.edit', compact('category'));
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
        $this->validate($request, [
            'name'=> 'required',
        ]);

        if(Category::where('name', $request->name)->exists()){
            Session::flash('warning', 'This category is already added');
            return redirect()->back();
        }

        $category = Category::find($id);
        $category->name = $request->name;

        $category->save();
        Session::flash('success', 'This category is successfully updated');

        return redirect()->route('categories.create');
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
        $category = Category::findOrFail($id);
        $category->delete();
        Session::flash('success', 'Category removed successfully');
        return redirect()->back();
    }
}