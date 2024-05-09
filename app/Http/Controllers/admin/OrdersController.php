<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrdersController extends Controller
{
    protected $userData;

    public function __construct()
    {
        $this->middleware('addUserData');
    }

    public function orders()
    {

        return view('admin.orders');
    }

    public function order_detail()
    {

        return view('admin.order-detail');
    }
}
