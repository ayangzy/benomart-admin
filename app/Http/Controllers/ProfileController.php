<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use Auth;
use Image;
use Session;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $profiles = Profile::where('user_id', Auth::user()->id)->get();
        return view('admins.profile.index', compact('profiles'));

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
        return view('admins.profile.create', compact('profile'));
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
            'phone' => 'required',
            'address' => 'required',
            'accountname' => 'required',
            'accountno' => 'required',
            'bankname' => 'required',
            'image' => 'required|mimes:jpeg,jpg,png|max:3000',
        ]);


            if(Profile::where('user_id', auth::user()->id)->exists()){
                Session::flash('info', 'Your profile is already completed');
                return redirect()->back();
            }

        if($request->hasfile('image')){
            $image = $request->file('image');
            $image_new_name = time().$image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());


            // resize the image to a width of 500 and constraint aspect ratio (auto height)
             $image_resize->resize(140, null, function ($constraint) {
            $constraint->aspectRatio();
             });

        // resize the image to a height of 100 and constraint aspect ratio (auto width)
             $image_resize->resize(null, 140, function ($constraint) {
             $constraint->aspectRatio();
             });

            $image_resize->save('uploads/profiles/' .$image_new_name);
        }

        $profile = Profile::create([
            'name'=> $request->name,
            'phone'=> $request->phone,
            'address'=> $request->address,
            'accountname'=> $request->accountname,
            'accountno'=> $request->accountno,
            'bankname'=> $request->bankname,
            'user_id' => Auth::user()->id,
            'slug' => str_slug($request->name),
            'image' => 'uploads/profiles/' .$image_new_name,
        ]);


        if(Auth::user()->isAdmin()){
            Session::flash('success', 'Thank you for completing your profile');
            return redirect()->route('dashboard');

        }

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

        $profile = Profile::where('user_id', Auth::user()->id)->first();
        return view('admins.profile.show', compact('profile'));

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
            'name' ,
            'phone' ,
            'address' ,
            'accountname' ,
            'accountno' ,
            'bankname' ,
            'image' => 'mimes:jpeg,jpg,png|max:3000',
        ]);

        $profile = Profile::where('user_id', Auth::user()->id)->first();


        if($request->hasfile('image')){
            $image = $request->file('image');
            $image_new_name = time().$image->getClientOriginalName();
            $image_resize = Image::make($image->getRealPath());


            // resize the image to a width of 500 and constraint aspect ratio (auto height)
             $image_resize->resize(140, null, function ($constraint) {
            $constraint->aspectRatio();
             });

        // resize the image to a height of 100 and constraint aspect ratio (auto width)
             $image_resize->resize(null, 140, function ($constraint) {
             $constraint->aspectRatio();
             });

            $image_resize->save('uploads/profiles/' .$image_new_name);
            $profile->image = 'uploads/profiles/' .$image_new_name;
        }

        $profile->name = $request->name;
        $profile->phone = $request->phone;
        $profile->address = $request->address;
        $profile->accountname = $request->accountname;
        $profile->accountno = $request->accountno;
        $profile->bankname = $request->bankname;

        $profile->save();
        Session::flash('success', 'Profile details successfully updated.');
        return redirect()->back();
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
    }
}