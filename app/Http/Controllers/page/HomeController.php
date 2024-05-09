<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\models\User;
use App\models\CartItem;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;

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

    public function addToCart(Request $request, Products $product)
    {
        $productId = $product->id;
        $productName = $product->name;
        $productPrice = $product->price;
        $productImage = $product->img;
        $cartItems = $request->session()->get('cart', []);

        foreach ($cartItems as &$cartItem) {
            if ($cartItem['id'] === $productId) {
                $cartItem['quantity']++;
                $request->session()->put('cart', $cartItems);
                return redirect()->back()->with('success', 'Số lượng sản phẩm trong giỏ hàng đã được cập nhật.');
            }
        }

        $cartItems[] = [
            'id' => $productId,
            'name' => $productName,
            'price' => $productPrice,
            'img' => $productImage,
            'quantity' => 1,
        ];
        $request->session()->put('cart', $cartItems);


        return redirect()->back()->with('success', 'Sản phẩm đã được thêm vào giỏ hàng.');
    }



    public function cart(Request $request)
    {

        $cartItems = $request->session()->get('cart', []);

        return view('pages.cart', [
            'categories' => $this->categories,
            'products' => $this->products,
            'subcategories' => $this->subcategories,
            'cartItems' => $cartItems
        ]);
    }

    public function removeFromCart(Request $request, $productId)
    {
        $cart = $request->session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Giỏ hàng của bạn đang trống');
        }

        foreach ($cart as $key => $item) {
            if ($item['id'] === $productId) {
                unset($cart[$key]);
                $request->session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng');
            }
        }

        return redirect()->back()->with('error', 'Không tìm thấy sản phẩm trong giỏ hàng');
    }




    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->flush();
        return redirect()->route('home');
    }
}
