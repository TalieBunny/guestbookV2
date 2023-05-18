<?php

namespace App\Repository;

use App\Models\Message;

class AdminRepository implements IAdminRepository {

    public function adminGetAllMessages()
    {
        return Message::query()->where('deleted_at', null);
    }


    public function adminDeleteMessage($id)
    {
        return Message::find($id)->delete();
    }
    

}


?>