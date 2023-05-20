<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // Redirect to page with admin dashboard

    public function index() {

        $messages = Message::query()->where('deleted_at', null)->get();

        return view('admin.dashboard')->with('messages', $messages);
    }

    // Deleting messages by admin

    public function adminDeleteMessage($id) {

        Message::where('id', $id)->delete();
        
        return redirect()->back();

    }

    // Show message before admin can send a reply

    public function showMessage($id)
    {
        $message = Message::find($id);

        return view('message.show')->with('message', $message);
    }

    // Send reply from admin

    public function adminReply(Request $request, $id) {

        Message::query()
            ->where('id', $id)
            ->update([
                'reply' => $request->reply,
            ]);

        return redirect()->back()->with('success', 'Reply sent successfully!');

    }
}
