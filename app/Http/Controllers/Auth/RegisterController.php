<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Hash;
use DB;

class RegisterController extends Controller
{
    /** Show the registration page */
    public function register()
    {
        $roles = DB::table('role_type_users')->get();
        return view('auth.register', compact('roles'));
    }

    /** Store New User */
    public function storeUser(Request $request)
    {
        try {
           // Create an instance of the User model
            $users = new User();
            // Call the saveNewuser method
            return $users->saveNewuser($request);
            flash()->success('Account created successfully :)');
            return redirect('login');
        } catch (\Exception $e) {
            \Log::error($e);
            flash()->error('Failed to Create Account. Please try again.');
            return redirect()->back();
        }
    }
}