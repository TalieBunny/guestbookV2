<?php

namespace App\Repository;

use App\Models\Message;
use Illuminate\Support\Facades\Auth;

class MessageRepository implements IMessageRepository {

    public function getAllMessages()
    {
        return Message::query()->where('user_id', Auth::id())->where('deleted_at', null);
    }

    public function createMessage(array $data)
    {
         $message = new Message();

         $message->user_id = $data['user_id'];
         $message->message = $data['message'];

         $message->save();

    }


    public function getSingleMessage($id)
    {
        return Message::find($id);
    }

    public function editMessage($id) 
    {
        return Message::find($id);
    }

    public function updateMessage($id, array $data)
    {
        Message::find($id)->update([
            'message' => $data['message']
         ]);
    }

    public function replyToMessage($id, array $data)
    {
        Message::find($id)->update([
            'reply' => $data['reply']
        ]);
    }

}


?>