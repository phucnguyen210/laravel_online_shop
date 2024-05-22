<?php

namespace App\Http\Controllers\page;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Products;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
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
        // dd($cartItems);
        // foreach ($cartItems as $cartItem) {

        // }
        // if(Session::get('cart')==true){
        //     foreach(Session::get('cart') as $key => $cart){
        //         dd($cart['session_id']);
        //     }
        // }
        $subtotal = array_reduce($cartItems, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0);

        $total = array_reduce($cartItems, function ($carry, $item) {
            return $carry + ($item['price'] * $item['quantity']);
        }, 0) + 20;

        return view('pages.cart', [
            'categories' => $this->categories,
            'products' => $this->products,
            'subcategories' => $this->subcategories,
            'cartItems' => $cartItems,
            'total' => $total,
            'subtotal' => $subtotal,
        ]);
    }

    public function updateQuickCart(Request $request)
    {
        $cart = Session::get('cart', []);
        $id = $request->input('id');
        $quantity = $request->input('quantity');

        // Cập nhật số lượng trong giỏ hàng
        foreach ($cart as &$item) {
            if ($item['id'] == $id) {
                $item['quantity'] = $quantity;
                break;
            }
        }


        // Lưu lại giỏ hàng vào session
        Session::put('cart', $cart);

        return response()->json(['success' => true, 'cart' => $cart]);
    }

    public function removeFromCart(Request $request, $productId)
    {
        $cart = $request->session()->get('cart', []);

        if (empty($cart)) {
            return redirect()->back()->with('error', 'Giỏ hàng của bạn đang trống');
        }

        foreach ($cart as $key => $item) {
            if ($item['id'] == $productId) { // So sánh không nghiêm ngặt để tránh lỗi kiểu dữ liệu
                unset($cart[$key]);
                $cart = array_values($cart); // Sắp xếp lại chỉ số của mảng
                $request->session()->put('cart', $cart);
                return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng');
            }
        }

        return redirect()->back()->with('error', 'Không tìm thấy sản phẩm trong giỏ hàng');
    }

    public function increaseQuantity(Request $request, $productId)
    {
        $cart = $request->session()->get('cart', []);
        foreach ($cart as &$item) {
            if ($item['id'] == $productId) {
                $item['quantity']++;
                break;
            }
        }

        $request->session()->put('cart', $cart);

        return response()->json(['success' => true, 'cart' => $cart]);
    }

    public function decreaseQuantity(Request $request, $productId)
    {
        $cart = $request->session()->get('cart', []);
        dd(1);
        foreach ($cart as &$item) {
            if ($item['id'] == $productId) {
                if ($item['quantity'] > 1) {
                    $item['quantity']--;
                }
                break;
            }
        }

        $request->session()->put('cart', $cart);

        return response()->json(['success' => true, 'cart' => $cart]);
    }
}
