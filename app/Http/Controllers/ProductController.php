<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Subcategory;
use App\Product;
use App\Profile;
use Auth;
use Session;
use Image;
use Storage;
use File;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $products = Product::latest()->orderBy('created_at', 'desc')->paginate(20);
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        return view('admins.products.index', compact('products', 'profile'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        $categories = Category::with('subcategories')->get();
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        return view('admins/products.create', compact('categories', 'profile'));
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
            'category' => 'required',
            'subcategory' => 'required',
            'productName' => 'required',
            'productPrice' => 'required',
            'productDescription' => 'required',
            'productImage1' => 'required|mimes:jpeg,jpg,png|max:30000',
            'productImage2' => 'required|mimes:jpeg,jpg,png|max:30000',
            'productImage3' => 'required|mimes:jpeg,jpg,png|max:30000'

        ]);

        if(Product::where('productName', $request->productName)->exists()){
            Session::flash('warning', 'Product name already exists for this particular category');
            return redirect()->back();
        }

        $files = [];
        if($request->file('productImage1')) $files[] = $request->file('productImage1');
        if($request->file('productImage2')) $files[] = $request->file('productImage2');
        if($request->file('productImage3')) $files[] = $request->file('productImage3');

        foreach($files as $image){
            $image_new_name[] = time().$image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
                // resize the image to a width of 500 and constraint aspect ratio (auto height)
            $image_resize->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            // resize the image to a height of 100 and constraint aspect ratio (auto width)
            $image_resize->resize(null, 100, function ($constraint) {
                $constraint->aspectRatio();
            });

            $image_resize->save('uploads/products/' .end($image_new_name));
        }

        $products = Product::create([
            'category_id'=>$request->category,
            'subcategory_id'=>$request->subcategory,
            'productName' => $request->productName,
            'slug' => str_slug($request->productName),
            'productPrice' => $request->productPrice,
            'productColor' => $request->productColor,
            'productSize' => $request->productSize,
            'productDescription' => $request->productDescription,
            'productImage1' => 'uploads/products/' .$image_new_name[0],
            'productImage2' => 'uploads/products/' .$image_new_name[1],
            'productImage3' => 'uploads/products/' .$image_new_name[2],
            'user_id' => Auth::user()->id
        ]);

        Session::flash('success', 'Product successfully added');
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        //
        $product = Product::where('slug', $slug)->first();
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        return view('admins.products.show', compact('product', 'profile'));
    }

    public function firstImage($slug){
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        $product = Product::where('slug', $slug)->first();
        return view('admins.products.firstImage', compact('product', 'profile'));
    }

    public function secondImage($slug){
        $product = Product::where('slug', $slug)->first();
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        return view('admins.products.secondImage', compact('product', 'profile'));
    }

    public function thirdImage($slug){
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        $product = Product::where('slug', $slug)->first();
        return view('admins.products.thirdImage', compact('product', 'profile'));
    }

    public function updateFirstImage(Request $request, $id){
        $this->validate($request, [
            'productImage1',
        ]);

        $product = Product::findOrFail($id);

        if($request->hasfile('productImage1')){
            $image = $request->file('productImage1');
            $image_new_name = time().$image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(200,200);
            $image_resize->save('uploads/products/' .$image_new_name);

            $product->productImage1 = 'uploads/products/' .$image_new_name;
        }

        $product->save();
        Session::flash('success', 'Product Image 1 successfully updated');
        return redirect()->back();

    }


    public function updateSecondImage(Request $request, $id){
        $this->validate($request, [
            'productImage2',
        ]);

        $product = Product::findOrFail($id);

        if($request->hasfile('productImage2')){
            $image = $request->file('productImage2');
            $image_new_name = time().$image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(200,200);
            $image_resize->save('uploads/products/' .$image_new_name);

            $product->productImage2 = 'uploads/products/' .$image_new_name;
        }

        $product->save();
        Session::flash('success', 'Product Image 2 successfully updated');
        return redirect()->back();

    }

    public function updateThirdImage(Request $request, $id){
        $this->validate($request, [
            'productImage3',
        ]);

        $product = Product::findOrFail($id);

        if($request->hasfile('productImage3')){
            $image = $request->file('productImage3');
            $image_new_name = time().$image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());
            $image_resize->resize(200,200);
            $image_resize->save('uploads/products/' .$image_new_name);

            $product->productImage3 = 'uploads/products/' .$image_new_name;
        }

        $product->save();
        Session::flash('success', 'Product Image 1 successfully updated');
        return redirect()->back();

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
        $product = Product::where('slug', $slug)->first();
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        return view('admins.products.edit', compact('product', 'profile'));
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
            'category',
            'subcategory',
            'productName',
            'productPrice',
            'productDescription',
        ]);


        $product = Product::find($id);

        $product->category_id = $request->category;
        $product->subcategory_id = $request->subcategory;
        $product->productName = $request->productName;
        $product->productPrice = $request->productPrice;
        $product->productColor = $request->productColor;
        $product->productSize = $request->productSize;
        $product->productDescription = $request->productDescription;


        $product->save();
        Session::flash('success', 'Product successfully updated');
        return redirect()->route('products.index');



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
        $product = Product::findOrFail($id);
        $image_path[] = public_path().'/'.$product->productImage1;
        $image_path[] = public_path().'/'.$product->productImage2;
        $image_path[] = public_path().'/'.$product->productImage3;

        foreach($image_path as $image){
            unlink($image);
        }

        $product->delete();
        Session::flash('success', 'Product Successfully Deleted');
        return redirect()->back();
    }
}
