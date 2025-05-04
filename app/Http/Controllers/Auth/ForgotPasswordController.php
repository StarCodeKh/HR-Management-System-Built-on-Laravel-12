<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Mail;
use DB;

class ForgotPasswordController extends Controller
{
    /** Show the email request form */
    public function getEmail()
    {
        return view('auth.passwords.email');
    }

    /** Handle the email submission */
    public function postEmail(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $token = Str::random(60);

        // Store the reset token in the database
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now(),
        ]);

        // Send the reset email
        Mail::send('auth.verify', ['token' => $token], function($message) use ($request) {
            $message->from(config('mail.from.address'), config('mail.from.name'));
            $message->to($request->email)->subject('Reset Password Notification');
        });
        flash()->success('We have e-mailed your password reset link! :)');
        return redirect()->back();
    }
}