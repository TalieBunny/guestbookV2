<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    // Redirect to user's home page
    
    public function index() {

        $messages = Message::query()->where('user_id', Auth::id())->where('deleted_at', null)->get();

        return view('home')->with('messages', $messages);
    }
}
