<?php

namespace App\Controllers;

class User extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Home | Adyawid Shop',
			'cart' => \Config\Services::cart()
		];

		return view('user/index', $data);
	}
}
