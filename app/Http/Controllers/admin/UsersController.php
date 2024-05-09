<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UsersController extends Controller
{

    public function __construct()
    {
        $this->middleware('addUserData');
    }

    public function users()
    {

        return view('admin.users');
    }

    public function create_user()
    {

        return view('admin.create-user');
    }
}
