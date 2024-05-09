<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\models\Brands;


class BrandsController extends Controller
{
    //
    protected $userData;

    public function __construct()
    {
        $this->middleware('addUserData');
    }

    public function brands()
    {
        $brands = Brands::all();

        return view('admin.brands')->with('brands', $brands);
    }

    public function create_brand()
    {

        return view('admin.create-brand');
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|unique:brands|max:255',
            'slug' => 'required|unique:brands|max:255',
        ]);

        $brands = new Brands;
        $brands->name = $validatedData['name'];
        $brands->slug = $validatedData['slug'];
        $brands->save();
        return redirect()->route('admin.brands')
            ->with('success', 'brands created successfully');
    }

    public function edit_brands($id)
    {
        $brands = Brands::findOrFail($id);
        return view('admin.edit-brands', compact('brands'));
    }

    public function update(Request $request, $id)
    {
        $brands = Brands::findOrFail($id);
        $brands->name = $request->name;
        $brands->slug = $request->slug;
        $brands->save();
        return redirect()->route('admin.brands');
    }


    public function delete(Request $request, $id)
    {
        $brands = Brands::find($id);
        $brands->delete();
        return redirect()->route('admin.brands')->with('success', 'Thương hiệu đã được xóa thành công');
    }
}
