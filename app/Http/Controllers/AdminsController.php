<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Profile;
use App\User;
use Auth;
use Hash;
use Session;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        return view('admins.dashboard', compact('profile'));
    }

    public function password(){
        $profile = Profile::where('user_id', Auth::user()->id)->first();
        return view('admins.change-password', compact('profile'));
    }

    public function newPassword(Request $request){
        $request->validate([
            'old_password' => ['required'],
            'new_password' => ['required'],
            'new_confirm_password' => ['same:new_password', 'required'],
        ]);

        if (!(Hash::check($request->get('old_password'), Auth::user()->password))) {
            // The passwords not matches
            Session::flash('info', 'Your Old password does not match with the password provided. Please check again');
            return redirect()->back();
        } elseif (strcmp($request->get('old_password'), $request->get('new_password')) == 0) {
            //Check if Current password and new password are same
            Session::flash('info', 'Your new password cannot be the same as your old password. Please choose a different password instead');
            return redirect()->back();
        } else {
            //update and save new password
            User::find(auth()->user()->id)->update(['password' => Hash::make($request->new_password)]);
            Session::flash('success', 'Password changed successfully');
            return redirect('/dashboard');
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