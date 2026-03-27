<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //

    public function categories()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.categories', compact('categories'));
    }

    public function addCategory()
    {
        return view('admin.categories.add');
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|string',
        ]);

        $category = Category::create($validate);
        return redirect()->route('admin.categories');
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        Category::findOrFail($id)->update($request->all());
        return redirect()->route('admin.categories');
    }

    public function delete($id)
    {
        Category::destroy($id);
        return redirect()->route('admin.categories');
    }
}
