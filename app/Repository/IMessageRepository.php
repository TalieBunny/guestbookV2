<?php

namespace App\Repository;

interface IMessageRepository {

    public function getAllMessages();

    public function createMessage(array $data);

    public function getSingleMessage($id);

    public function editMessage($id);

    public function updateMessage($id, array $data);

    public function replyToMessage($id, array $data);

}


?>