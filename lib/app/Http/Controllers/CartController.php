<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use Cart;

class CartController extends Controller
{
    //
    public function save(Request $request)
    {
        $prod_id = $request->prod_id_hidden;
        $qty = $request->qty;

        $prod_info = Products::where('prod_id',$prod_id)->first();
        $data['id'] = $prod_info->prod_id;
        $data['qty'] = $qty;
        $data['name'] = $prod_info->prod_name;
        $data['price'] = $prod_info->prod_price;
        $data['weight'] = 0;
        $data['options']['image'] = $prod_info->prod_img;
        $data['options']['slug'] = $prod_info->prod_slug;

        Cart::add($data);
        
        return redirect()->intended('/cart');
    }

    public function store()
    {
        $data['total'] = Cart::total();
        $data['content'] = Cart::content();
        return view('frontend.cart',$data);
    }

    public function update(Request $request)
    {
        Cart::update($request->rowId, $request->qty);
    }

    public function delete($rowId)
    {
        Cart::update($rowId, 0);
        return redirect()->intended('/cart');
    }
}
