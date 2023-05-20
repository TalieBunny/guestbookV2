<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{

    // Save message sent by user

    public function store(Request $request)
    {

        // validate and store data
        $request->validate([
            'message' => 'required',
        ]);


        Message::insert([
            'user_id' => Auth::id(),
            'message' => $request->message,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Message was created successfully!');

    }

    // Delete message that belongs to the logged in user

    public function deleteMessage($user_id, $id) {

        Message::where('user_id', $user_id)->where('id', $id)->delete();
        
        return redirect()->back();

    }

    // Show message for editing by the user

    public function edit($id)
    {
        $message = Message::find($id);

        return view('message.edit')->with('message', $message);
    }

    // Update message that belongs to the user 

    public function update(Request $request, $id)
    {
       Message::find($id)->update([
            'message' => $request->message,
            'updated_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'Message was updated successfully!');
    }
}
