<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Profile;
use Auth;
use Session;

class SubcategoriesController extends Controller
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
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        $categories = Category::all();
        $subcategories = Subcategory::latest()->paginate(20);
        return view('admins.subcategories.create', compact('categories', 'subcategories', 'profile'));
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
            'category' => 'required',
            'name' => 'required',
        ]);

        if(Subcategory::where('name', $request->subcategory)->exists()){
            Session::flash('warning', 'This subcategory is already added');
            return redirect()->back();
        }


        $subcategory = Subcategory::create([
            'category_id' => $request->category,
            'name' => $request->name,
            'slug' => str_slug($request->name)
        ]);



        Session::flash('success', 'Subcategory is successfully created');
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
        $categories = Category::all();
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        $subcategory = Subcategory::where('slug', $slug)->first();
        return view('admins.subcategories.edit', compact('subcategory', 'categories', 'profile'));
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
            'category_id' => 'required',
            'name' => 'required',
        ]);

        if(Subcategory::where('name', $request->subcategory)->where('category_id', $request->category_id)->exists()){
            Session::flash('warning', 'This subcategory is already added');
            return redirect()->back();
        }

        $subcategory = Subcategory::findOrFail($id);
        $subcategory->category_id = $request->category_id;
        $subcategory->name = $request->name;

        $subcategory->save();
        Session::flash('success', 'Successfully Updated');
        return redirect()->route('subcategories.create');
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
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->delete();
        Session::flash('success', 'Removed successfully');
        return redirect()->back();
    }
}