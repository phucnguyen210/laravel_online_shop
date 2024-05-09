<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Logout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class AdminLoginController extends Controller
{
    protected $userData;

    public function __construct()
    {
        $this->middleware('addUserData');
    }

    public function index()
    {
        return view('admin.login');
    }



    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('admin');
        } else {

            return back()->withInput()->withErrors(['email' => 'Invalid email or password']);
        }
    }



    public function logout()
    {

        Auth::logout();
        return redirect()->route('admin');
    }






    public function discount()
    {

        return view('admin.discount');
    }





    public function dashboard()
    {


        return view('admin.dashboard');
    }


    // public function logout()
    // {
    //     $user = Auth::user();

    //     $data = [
    //         'email' => $user->email,
    //         'name' => $user->name
    //     ];
    //     Auth::logout();
    //     return redirect()->route('admin')->with('data', $data);
    // }

    // public function category()
    // {
    //     $user = Auth::user();

    //     $data = [
    //         'email' => $user->email,
    //         'name' => $user->name
    //     ];
    //     return view('admin.categories')->with('data', $data);
    // }

    // public function create_category()
    // {
    //     $user = Auth::user();

    //     $data = [
    //         'email' => $user->email,
    //         'name' => $user->name
    //     ];
    //     return view('admin.create-category')->with('data', $data);
    // }

    // public function sub_category()
    // {
    //     $user = Auth::user();

    //     $data = [
    //         'email' => $user->email,
    //         'name' => $user->name
    //     ];
    //     return view('admin.subcategory')->with('data', $data);
    // }

    // public function create_subcategory()
    // {
    //     $user = Auth::user();

    //     $data = [
    //         'email' => $user->email,
    //         'name' => $user->name
    //     ];
    //     return view('admin.create-subcategory')->with('data', $data);
    // }

    // public function brands()
    // {
    //     $user = Auth::user();

    //     $data = [
    //         'email' => $user->email,
    //         'name' => $user->name
    //     ];
    //     return view('admin.brands')->with('data', $data);
    // }

    // public function create_brand()
    // {
    //     $user = Auth::user();

    //     $data = [
    //         'email' => $user->email,
    //         'name' => $user->name
    //     ];
    //     return view('admin.create-brand')->with('data', $data);
    // }

    // public function products()
    // {
    //     $user = Auth::user();

    //     $data = [
    //         'email' => $user->email,
    //         'name' => $user->name
    //     ];
    //     return view('admin.products')->with('data', $data);
    // }

    // public function create_product()
    // {
    //     $user = Auth::user();

    //     $data = [
    //         'email' => $user->email,
    //         'name' => $user->name
    //     ];
    //     return view('admin.create-product')->with('data', $data);
    // }

    // public function orders()
    // {
    //     $user = Auth::user();

    //     $data = [
    //         'email' => $user->email,
    //         'name' => $user->name
    //     ];
    //     return view('admin.orders')->with('data', $data);
    // }

    // public function order_detail()
    // {
    //     $user = Auth::user();

    //     $data = [
    //         'email' => $user->email,
    //         'name' => $user->name
    //     ];
    //     return view('admin.order-detail')->with('data', $data);
    // }

    // public function discount()
    // {
    //     $user = Auth::user();

    //     $data = [
    //         'email' => $user->email,
    //         'name' => $user->name
    //     ];
    //     return view('admin.discount')->with('data', $data);
    // }

    // public function users()
    // {
    //     $user = Auth::user();

    //     $data = [
    //         'email' => $user->email,
    //         'name' => $user->name
    //     ];
    //     return view('admin.users')->with('data', $data);
    // }

    // public function create_user()
    // {
    //     $user = Auth::user();

    //     $data = [
    //         'email' => $user->email,
    //         'name' => $user->name
    //     ];
    //     return view('admin.create-user')->with('data', $data);
    // }

    // public function pages()
    // {
    //     $user = Auth::user();

    //     $data = [
    //         'email' => $user->email,
    //         'name' => $user->name
    //     ];
    //     return view('admin.pages')->with('data', $data);
    // }

    // public function create_page()
    // {
    //     $user = Auth::user();

    //     $data = [
    //         'email' => $user->email,
    //         'name' => $user->name
    //     ];
    //     return view('admin.create-page')->with('data', $data);
    // }

    // public function dashboard()
    // {

    //     $user = Auth::user();

    //     $data = [
    //         'email' => $user->email,
    //         'name' => $user->name
    //     ];
    //     return view('admin.dashboard')->with('data', $data);
    // }
}
