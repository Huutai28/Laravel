<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddCateRequest;
use App\Http\Requests\EditCateRequest;
use App\Models\Category;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $data['catelist'] = Category::all();
        return view('backend.category', $data);
    }
    
    public function create(AddCateRequest $request)
    {
        $category = new Category;
        $category->cate_name = $request->name;
        $category->cate_slug = Str::slug($request->name, '-');
        $category->save();
        return back();
    }

    public function edit($id)
    {
        $data['cate'] = Category::find($id);
        return view('backend.editcategory', $data);
    }

    public function update(EditCateRequest $request, $id)
    {
        $category = Category::find($id);
        $category->cate_name = $request->name;
        $category->cate_slug = Str::slug($request->name, '-');
        $category->save();
        return redirect()->intended('admin/category');
    }


    public function destroy($id)
    {
        Category::destroy($id);
        return back();
    }

}
