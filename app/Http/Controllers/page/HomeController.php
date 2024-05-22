<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use App\Models\Subcategory;
use App\Models\Orders;
use App\Models\Order_detail;
use Illuminate\Http\Request;
use App\models\User;
use App\models\shipping_address;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;


use App\Mail\OrderPlaced;
use Illuminate\Support\Facades\Mail;;

class HomeController extends Controller
{
    protected $categories;
    protected $products;
    protected $subcategories;

    public function __construct()
    {
        $this->categories = Category::all();
        $this->products = Products::all();
        $this->subcategories = Subcategory::all();
    }

    public function index()
    {
        return view('pages.index',  [
            'categories' => $this->categories,
            'products' => $this->products,
            'subcategories' => $this->subcategories,
        ]);
    }

    public function register()
    {
        return view('pages.register', [
            'categories' => $this->categories, 'products' => $this->products,
            'subcategories' => $this->subcategories,
        ]);
    }

    public function register_store(Request $request)
    {

        $messages = [
            'cpassword.same' => 'The Confirm Password and Password must match.',
        ];
        $validatedData = $request->validate([
            'name' => 'required|unique:users|max:255',
            'email' => 'required|unique:users|max:255',
            'password' => 'required',
            'cpassword' => 'required|same:password',
        ], $messages);

        $user = new User;
        $user->name = $validatedData['name'];
        $user->email = $validatedData['email'];
        $user->password = bcrypt($validatedData['cpassword']);
        $user->save();

        return redirect()->route('login')->with('success', 'User created successfully');
    }


    public function login()
    {
        return view('pages.login', [
            'categories' => $this->categories,
            'products' => $this->products,
            'subcategories' => $this->subcategories,
        ]);
    }

    public function login_store(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->route('home');
        } else {

            return back()->withInput()->withErrors(['email' => 'Invalid email or password']);
        }
    }


    public function checkout(Request $request)
    {
        if (!Auth::check()) {
            // Người dùng chưa đăng nhập, chuyển hướng tới trang đăng nhập
            return redirect()->route('login');
        }

        $cartItems = $request->session()->get('cart', []);
        $subtotal = array_reduce($cartItems, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        $total = array_reduce($cartItems, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0) + 20;


        return view('pages.checkout', [
            'categories' => $this->categories,
            'products' => $this->products,
            'subcategories' => $this->subcategories,
            'cartItems' => $cartItems,
            'total' => $total,
            'subtotal' => $subtotal,
        ]);
    }

    public function form_checkout(Request $request)
    {
        $user_id = auth()->id();
        $shipping_address = new shipping_address();
        $shipping_address->user_id = $user_id;
        $shipping_address->first_name = $request->input('first_name');
        $shipping_address->last_name = $request->input('last_name');
        $shipping_address->email = $request->input('email');
        $shipping_address->country = $request->input('country');
        $shipping_address->address = $request->input('address');
        $shipping_address->order_notes = $request->input('order_notes');
        $shipping_address->mobile = $request->input('mobile');
        $shipping_address->save();

        // $cartItems = session()->get('cartItems');
        $cart = Session::get('cart', []);

        $total = 0;

        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        $order = Orders::create([
            'user_id' => $user_id,
            'total' => $total,
        ]);
        // dd($order->orde);

        foreach ($cart as $item) {
            Order_detail::create([
                'order_id' => $order->id,
                'product_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }

        Mail::to($shipping_address->email)->send(new OrderPlaced($order));

        session()->forget('cart');
        return redirect()->route('checkout')->with('success', 'đặt hàng thành công');
    }






    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('home');
    }
}