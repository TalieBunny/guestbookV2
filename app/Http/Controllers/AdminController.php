<?php

namespace App\Http\Controllers;

use App\Repository\IAdminRepository;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public $admin;

    public function __construct(IAdminRepository $admin)
    {
        $this->admin = $admin;
    }

    // Get all messages on admin page
    public function adminGetAllMessages() {

        $messages = $this->admin->adminGetAllMessages();
        return view('admin.index')->with('messages', $messages);

    }

    // Delete a single message
    public function adminDeleteMessage($id) {

        $this->admin->adminDeleteMessage($id);
        return redirect('/admin/messages')->withMessage('Message deleted successfully!');

    }

}
