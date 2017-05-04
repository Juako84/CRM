<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Auth;
use Image;
class UserController extends Controller
{
    //
     public function __construct()
    {
        $this->middleware('auth');
        
    }
    
    public function profile()
    {
        return view('profile', array('user'=> Auth::user()));
    }
    
    public function updateBasicInfo(Request $request)
    {
        
        $user = Auth::user();
        $user->name = $request->input('name');
        $user->lastname = $request->input('lastname');
        $user->phonenumber = $request->input('phonenumber');
        $user->address = $request->input('address');
        
        $user->save();
        return view('profile', array('user'=> Auth::user()));
    }
    public function updateAvatar(Request $request)
    {
        //change image profile
        if($request->hasfile('avatar')) 
        {
            
            $avatar = $request->file('avatar');
            $filename = time() .'.'. $avatar->getClientOriginalExtension();
            
            Image::make($avatar)->resize(300,300)->save(public_path('/upload/avatars/' . $filename));
            $user = Auth::user();
            $user->avatar = $filename;
            
            $user->save();
            
            
        }
        
        return view('profile', array('user'=> Auth::user()));
    }
    
}
