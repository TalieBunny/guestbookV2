<?php

namespace App\Http\Controllers;

use App\Repository\IMessageRepository;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public $message;

    public function __construct(IMessageRepository $message)
    {
        $this->message = $message;
    }
    
    public function index() {

        $messages = $this->message->getAllMessages();

        return view('message.index')->with('messages', $messages);

    }

    public function create() {

        return view('message.create');

    }

    public function store(Request $request) {

        $request->validate([
            'user_id' =>'required',
            'message' => 'required'
        ]);

        $data = $request->all();

        $this->message->createMessage($data);

        return redirect('/messages')->withMessage('Message created successfully!');

    }

    public function show($id) {

        $message = $this->message->getSingleMessage($id);

        return view('message.show')->with('message', $message);

    }

    public function edit($id) {

        $message = $this->message->editMessage($id);

        return view('message.edit')->with('message', $message);

    }

    public function update($id, Request $request) {

        $data = $request->all();

        $request->validate([
            'message' => 'required'
        ]);

        $this->message->updateMessage($id, $data);

        return redirect('/messages')->withMessage('Message updated successfully!');

    }

    public function replyToMessage($id, Request $request) {

        $data = $request->all();

        $request->validate([
            'reply' => 'required'
        ]);

        $this->message->replyToMessage($id, $data);

        return redirect('/admin/messages')->withMessage('Reply sent successfully!');
    
        
    

    }

}
