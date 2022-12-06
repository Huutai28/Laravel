<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Products;
use App\Models\Category;
use App\Models\Comment;

class FrontendController extends Controller
{
    //
    public function home()
    {
        $data['featured'] = Products::where('prod_featured',1)->orderBy('prod_id','desc')->take(8)->get();
        $data['news'] = Products::orderBy('prod_id','desc')->take(8)->get();
        return view('frontend.home',$data);
    }

    public function detail($id)
    {
        $data['item'] = Products::find($id);
        $data['comments'] = Comment::where('com_product',$id)->get();
        return view('frontend.details',$data);
    }

    public function category($id)
    {
        $data['cateName'] = Category::find($id);
        $data['items'] = Products::where('prod_cate',$id)->orderBy('prod_id','desc')->paginate(5);
        return view('frontend.category',$data);
    }

    public function postComment(Request $request, $id)
    {
        $comment = new Comment;
        $comment->com_name = $request->name;
        $comment->com_email = $request->email;
        $comment->com_content = $request->content;
        $comment->com_product = $id;
        $comment->save();
        return back();
    }

    public function search(Request $request)
    {
        $result = $request->result;
        $data['keyword'] = $result;
        $result = str_replace(' ', '%', $result);
        $data['items'] = Products::where('prod_name','like','%'.$result.'%')->get();
        return view('frontend.search',$data);
    }
}
