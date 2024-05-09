<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    protected $userData;

    public function __construct()
    {
        $this->middleware('addUserData');
    }

    public function pages()
    {

        return view('admin.pages');
    }

    public function create_page()
    {

        return view('admin.create-page');
    }
}
