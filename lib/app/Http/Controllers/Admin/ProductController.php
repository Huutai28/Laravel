<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Products;
use DB;


class ProductController extends Controller
{
    //
    public function index()
    {
        $data['catelist'] = Category::all();
        return view('backend.addproduct', $data);
    }

    public function create(AddProductRequest $request)
    {
        $filename = $request->img->getClientOriginalName();
        $product = new Products;
        $product->prod_name = $request->name;
        $product->prod_slug = Str::slug($request->name, '-');
        $product->prod_price = $request->price;
        $product->prod_img = $filename;
        $product->prod_warranty = $request->warranty;
        $product->prod_accessories = $request->accessories;
        $product->prod_condition = $request->condition;
        $product->prod_promotion = $request->promotion;
        $product->prod_status = $request->status;
        $product->prod_description = $request->description;
        $product->prod_featured = $request->featured;
        $product->prod_cate = $request->cate;
        $product->save();
        $request->img->storeAs('avatar',$filename);

        return back();


    }

    public function store()
    {
        $data['prodlist'] = DB::table('products')->join('categories','products.prod_cate','=','categories.cate_id')->orderBy('prod_id','desc')->get();
        return view('backend.product',$data);
    }

    public function edit($id)
    {
        $data['prod'] = Products::find($id);
        $data['catelist'] = Category::all();
        return view('backend.editproduct', $data);
    }

    public function update(AddProductRequest $request, $id)
    {
        $product = Products::find($id);
        $product->prod_name = $request->name;
        $product->prod_slug = Str::slug($request->name, '-');
        $product->prod_price = $request->price;
        $product->prod_warranty = $request->warranty;
        $product->prod_accessories = $request->accessories;
        $product->prod_condition = $request->condition;
        $product->prod_promotion = $request->promotion;
        $product->prod_status = $request->status;
        $product->prod_description = $request->description;
        $product->prod_featured = $request->featured;
        $product->prod_cate = $request->cate;
        if ($request->hasFile('img')) {
            $filename = $request->img->getClientOriginalName();
            $product->prod_img = $filename;
            $request->img->storeAs('avatar',$filename);
        }
        $product->save();
        return redirect()->intended('admin/product');
    }

    public function destroy($id)
    {
        Products::destroy($id);
        return back();
    }
}
