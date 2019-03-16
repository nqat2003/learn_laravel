<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function list_product(){
    	$products = DB::table('products')->get();
    	return view('admin.products.list_product',['products'=>$products]);
    }
    public function get_add_product(){
    	return view('admin.products.add_product');
    }
    public function do_add_product(Request $re){
    	$re->validate([
    		'name' => 'required',
    		'price' => 'required|numeric',
    		'file' => 'required|image|max:5000'
    	]);
    	$img = $re->file('file')->getClientOriginalName();
    	if (DB::table('products')->insert(['name'=>$re->name,'price'=>$re->price,'image'=>$img,'description'=>$re->des])) {
    		$re->file('file')->move(public_path('/backend/img'),$img);
    		return redirect('list_product')->with('status','Add Product Success');
    	}
   		return redirect('list_product')->with('status','Add Product Failed');
    }
    public function delete_product($id){
    	DB::table('products')->where('id', '=', $id)->delete();
    	return redirect('list_product')->with('status','Deleted!');
    }
    public function modify_product($id){
    	$product = DB::table('products')->where('id',$id)->first();
    	return view('admin.products.modify_product',['product'=>$product]);
    }
    public function do_modify_product(Request $re){
    	$re->validate([
    		'name' => 'required',
    		'price' => 'required|numeric',
    		'file' => 'image|max:5000'
    	]);
    	if ($re->hasFile('file')) {
    		$img = $re->file('file')->getClientOriginalName();
    		$re->file('file')->move(public_path('/backend/img'),$img);
    		DB::table('products')->where('id',$re->id)->update(['name' => $re->name, 'price' => $re->price, 'image' => $img, 'description' => $re->des ]);
    	}else{
    		DB::table('products')->where('id',$re->id)->update(['name' => $re->name, 'price' => $re->price, 'description' => $re->des ]);
    	}
    	return redirect('list_product')->with('status','Updated!');
    }
    public function search_product(Request $re){
        $key = $re->search_key;
        $result = DB::table('products')->where('name','like','%'.$key.'%')->orWhere('price','like','%'.$key.'%')->get();
        return view('admin.products.list_product',['products'=>$result]);
    }

}
