<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Order;


class OrderController extends Controller
{
	
	// function detail(Request $request, $id) {

	// 	$order = Order::find($id);
	// 	$data = [
	// 		'order'=>$order
	// 	];
		
	// 	return view('product-detail', $data);
	// }

	function index() {
		$lst_order = Order::all();

		$data = [
			'lst_order'=> $lst_order
		];

		return view('order.index', $data);
	}

	function getAdd(){
		$lst_order = Order::all();

		$data = [
			'lst_order'=> $lst_order
		];

		return view('order.add', $data );
	}

	function postAdd(Request $req){
		$order = new Order();
		$order->name = $req->Name;


		$file = $req->file('DiaChi');
		$file = $req->file('SDT');
		$file_name = $file->getClientOriginalName();
		$path = $file->move('uploads', $file_name);

		$order->DiaChi = $path;
		$order->SDT = $path;
		$order->save();

		return redirect()->action('OrderController@Order');
	}

	// function getEdit($id){
	// 	$product = Product::find($id);

	// 	$data = [
	// 		'product' => $product
	// 	];

	// 	return view('product.edit', $data);
	// }

	// function postEdit(Request $req){
	// 	$id = $req->Id;

	// 	$product = Product::find($id);
	// 	$product->name = $req->Name;

	// 	$file = $req->file('Image');
	// 	$file = $req->file('Image1');
	// 	$path = "";
	// 	if($file){
	// 		$file_name = $file->getClientOriginalName();
	// 		$path = $file->move('uploads', $file_name);
	// 	}

	// 	$product->image = $path;
	// 	$product->image1 = $path;
	// 	// $product->category_id = $req->CategoryId;
	// 	$product->save();

	// 	return redirect()->action('ProductController@adminIndex');
	// }

	// function delete($id){
	// 	$product = Product::find($id);
	// 	$product->delete();

	// 	return redirect()->action('ProductController@adminIndex');
	// }
	// function detail(Request $request, $id) {

	// 	$order = Order::find($id);
	// 	$data = [
	// 		'order'=>$order
	// 	];
		
	// 	return view('product-detail', $data);
	// }

	// function Order1() {
	// 	$lst_order1 = Order_Detail::all();

	// 	$data = [
	// 		'lst_order1'=> $lst_order1
	// 	];

	// 	return view('order.order_detail', $data);
	// }
	function index1() {
		$lst_order1 = Order::all();

		$data = [
			'lst_order1'=> $lst_order1
		];

		return view('order.index', $data);
	}

}

?>