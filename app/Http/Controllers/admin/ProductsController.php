<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Products;
use App\models\Category;
use App\models\Brands;
use App\Models\Subcategory;

class ProductsController extends Controller
{
    protected $userData;

    public function __construct()
    {
        $this->middleware('addUserData');
    }

    public function products()
    {
        $products = Products::all();

        return view('admin.products', compact('products'));
    }

    public function create_product()
    {

        $categories = Category::all();
        $brands = Category::all();
        $subcategories = Subcategory::all();
        return view('admin.create-product', compact('brands', 'categories', 'subcategories'));
    }

    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|max:255',
        ]);
        // $imageName = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/img', $imageName);
        }

        // Lưu đường dẫn của ảnh vào cơ sở dữ liệu
        $product = new Products;
        $product->name = $validatedData['name'];
        $product->description = $request['description'];
        $product->img = 'storage/img/' . $imageName; // Đường dẫn của ảnh trong thư mục storage/app/public/img
        $product->price = $request['price'];
        $product->quantity = $request['quantity'];
        $product->code = mt_rand(100000, 999999);
        $product->status = $request['status'];
        $product->brand_id = $request['brand_id'];
        $product->category_id = $request['category_id'];
        $product->subcategory_id = $request['sub_category_id'];
        $product->save();

        return redirect()->route('admin.products')
            ->with('success', 'Product created successfully');
    }

    public function edit_products($id)
    {
        $products = Products::findOrFail($id);
        $categories = Category::all();
        $brands = Brands::all();
        $subcategories = Subcategory::all();

        return view('admin.edit-product', compact('products', 'categories', 'brands', 'subcategories'));
    }

    public function update(Request $request, $id)
    {
        $product = Products::findOrFail($id);
        if ($request->hasFile('img')) {
            $image = $request->file('img');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/img', $imageName);
        }

        $product->name = $request['name'];
        $product->description = $request['description'];
        $product->img = 'storage/img/' . $imageName;
        $product->price = $request['price'];
        $product->code = mt_rand(100000, 999999);
        $product->status = $request['status'];
        $product->brand_id = $request['brand_id'];
        $product->category_id = $request['category_id'];
        $product->subcategory_id = $request['sub_category_id'];
        $product->save();
        return redirect()->route('admin.products');
    }


    public function delete($id)
    {
        $product = Products::find($id);
        $product->delete();
        return redirect()->route('admin.products')->with('success', 'sản phẩm đã được xóa thành công');
    }
}