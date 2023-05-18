<?php

namespace App\Repository;

interface IAdminRepository {

    public function adminGetAllMessages(); 

    public function adminDeleteMessage($id);

}


?>