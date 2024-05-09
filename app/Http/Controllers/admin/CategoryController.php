<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Category;


class CategoryController extends Controller
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


    public function category()
    {
        $category = Category::all();
        return view('admin.categories')->with('category', $category);
    }

    public function create_category()
    {

        return view('admin.create-category');
    }




    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|unique:category|max:255',
            'slug' => 'required|unique:category|max:255',
        ]);

        $category = new Category;
        $category->name = $validatedData['name'];
        $category->slug = $validatedData['slug'];
        $category->save();
        return redirect()->route('admin.category')
            ->with('success', 'Category created successfully');
    }

    public function edit_category($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.edit-category', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->save();
        return redirect()->route('admin.category');
    }


    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('admin.category')->with('success', 'Danh mục đã được xóa thành công');
    }
}
