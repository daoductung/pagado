<?php
namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Product;

class HomeController extends Controller
{
		function index(Request $request) {
		$lst_product = Product::all();

		$data = [
			'ds_product'=> $lst_product
		];

		return view('home', $data);
	}
}

?>