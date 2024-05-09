<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User_contacts;
use App\Models\User;
use App\Models\Products;
use App\Models\Subcategory;
// use Illuminate\Support\Facades\Auth\User;
use Illuminate\Support\Facades\Auth;


class UserController extends Controller
{
    protected $categories;
    protected $subcategories;

    public function __construct()
    {
        $this->categories = Category::all();
        $this->subcategories = Subcategory::all();
    }

    public function account()
    {
        $user = Auth::user();
        return view('pages.account', ['categories' => $this->categories, 'user' => $user,
        'subcategories' => $this->subcategories,]);
    }

    public function store(Request $request)
    {
        $user = User::find(auth()->user()->id);

        // Kiểm tra và validate dữ liệu đầu vào
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
        ]);
    
        // Cập nhật thông tin người dùng
        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->save();
    

        return redirect()->route('account')->with('success', 'Thông tin người dùng đã được cập nhật thành công');
    }





    public function my_profile()
    {
    }

    public function my_orders()
    {
        return view('pages.my-orders',  ['categories' => $this->categories,
        'subcategories' => $this->subcategories,]);
    }

    public function wishlist()
    {
        return view('pages.wishlist', ['categories' => $this->categories,
        'subcategories' => $this->subcategories,]);
    }
}