<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use App\models\Subcategory;
use Illuminate\Support\Facades\Redis;

class SubCategoryController extends Controller
{
    protected $userData;

    public function __construct()
    {
        $this->middleware('addUserData');
    }

    public function sub_category()
    {
        $subcategories = Subcategory::all();
        $subcategories = Subcategory::with('category')->get();

        return view('admin.subcategory', compact('subcategories'));
    }

    public function create_sub_category()
    {
        $categories = Category::all();

        return view('admin.create-subcategory', compact('categories'));
    }

    public function store(Request $request)
    {
        

        $subcategories = new Subcategory;
        $subcategories->category_id = $request['category_id'];
        $subcategories->name = $request['name'];
        $subcategories->slug = $request['slug'];
        $subcategories->save();
        return redirect()->route('admin.sub_category')
            ->with('success', 'Category created successfully');
    }

    public function edit_sub_category($id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $category = Category::findOrFail($id);
        return view('admin.edit-subcategory', compact('subcategory','category'));
    }

    public function update(Request $request, $id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $subcategory->name = $request->name;
        $subcategory->slug = $request->slug;
        $subcategory->category_id = $request->category_id;
        $subcategory->save();
        return redirect()->route('admin.sub_category');
    }


    public function delete($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        return redirect()->route('admin.sub_category')->with('success', 'Danh mục con đã được xóa thành công');
    }
}