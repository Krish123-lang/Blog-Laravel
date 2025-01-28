<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function user_list()
    {
        $data['getRecord'] = User::getRecordUser();
        return view('backend.user.list', $data);
    }
}
