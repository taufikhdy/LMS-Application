<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function store(Request $request)
    {
        Category::create($request->all());
        return redirect()->route('admin.categories.index');
    }

    public function update(Request $request, $id)
    {
        Category::findOrFail($id)->update($request->all());
        return redirect()->route('admin.categories.index');
    }

    public function delete($id)
    {
        Category::destroy($id);
        return redirect()->route('admin.categories.index');
    }
}
