<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Hash;

class LockScreen extends Controller
{    
    /** lock Screen */
    public function lockScreen()
    {
        if (!session('lock-expires-at')) {
            return redirect('dashboard.main_dashboard');
        }

        if (session('lock-expires-at') > now()) {
            return redirect('dashboard.main_dashboard');
        }
        return view('lockscreen.lockscreen');
    }
    
    /** Unlock Screen */
    public function unlock(Request $request)
    {
        $request->validate([
            'password' => 'required|string',
        ]);
        $check = Hash::check($request->input('password'), $request->user()->password);
        if (!$check) {
            flash()->error('Fail, Your password does not match :)');
            return redirect()->route('lock_screen');
        }
        session(['lock-expires-at' => now()->addMinutes($request->user()->getLockoutTime())]);
        return redirect('dashboard.main_dashboard');
    }
}
