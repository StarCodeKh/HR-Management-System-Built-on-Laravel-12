<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChatController extends Controller
{
    /** chat */
    public function chat() 
    {
        return view('chat.chat');
    }
}
