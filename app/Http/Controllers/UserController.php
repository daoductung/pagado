<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Session;


class UserController extends Controller
{
	
	public function getLogin() {
		return view('login');
	}

	public function postLogin(Request $req) {
		$user_name = $req->user_name;
		$password = $req->password;

		$user_check = User::where([
			['username', $user_name],
			['password', $password]
		])->get();

		if(count($user_check) > 0) {
			$req->session()->put('username', $user_name);
			
			return redirect()->action('CategoryController@adminIndex');
		}

		return view('login');
	}
}