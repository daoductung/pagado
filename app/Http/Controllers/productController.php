<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Product;


class ProductController extends Controller
{
	
	function detail(Request $request, $id) {

		$product = Product::find($id);
		$data = [
			'product'=>$product
		];
		
		return view('product-detail', $data);
	}

	function adminIndex() {
		$lst_product = Product::all();

		$data = [
			'lst_product'=> $lst_product
		];

		return view('product.index', $data);
	}

	function getAdd(){
		$lst_product = Product::all();

		$data = [
			'lst_product'=> $lst_product
		];

		return view('product.add', $data );
	}

	function postAdd(Request $req){
		$product = new Product();
		$product->name = $req->Name;


		$file = $req->file('Image');
		$file1 = $req->file('Image1');
		$file_name = $file->getClientOriginalName();
		$path = $file->move('uploads', $file_name);

		$product->image = $path;
		$product->image1 = $path;
		$product->save();

		return redirect()->action('ProductController@adminIndex');
	}

	function getEdit($id){
		$product = Product::find($id);

		$data = [
			'product' => $product
		];

		return view('product.edit', $data);
	}

	function postEdit(Request $req){
		$id = $req->Id;

		$product = Product::find($id);
		$product->name = $req->Name;

		$file = $req->file('Image');
		$file1 = $req->file('Image1');
		$path = "";
		if($file){
			$file_name = $file->getClientOriginalName();
			$path = $file->move('uploads', $file_name);
		}
		

		$product->image = $path;
		$product->image1 = $path;
		// $product->category_id = $req->CategoryId;
		$product->save();

		return redirect()->action('ProductController@adminIndex');
	}

	function delete($id){
		$product = Product::find($id);
		$product->delete();

		return redirect()->action('ProductController@adminIndex');
	}

}

?>