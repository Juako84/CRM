<?php
namespace App\Http\Controllers\Auth;

use App\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UpdatePasswordController extends Controller
{
    /*
     * Ensure the user is signed in to access this page
     */
    public function __construct() {

        $this->middleware('auth');

    }

    /**
     * Update the password for the user.
     *
     * @param  Request  $request
     * @return Response
     */
    public function update(Request $request)
    {
Log::info('PASSWOR 1: ');        
        $this->validate($request, [
            'old' => 'required',
            'password' => 'required|min:6|confirmed',
        ]);

Log::info('PASSWOR 2: ');        
        $user = User::find(Auth::id());
        $hashedPassword = $user->password;

        if (Hash::check($request->old, $hashedPassword)) {
            Log::info('PASSWORD OK: ');
            //Change the password
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();

            $request->session()->flash('success', 'Your password has been changed.');

            return back();
        }

        $request->session()->flash('failure', 'Your password has not been changed.');

        return back();


    }
}