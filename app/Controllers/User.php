<?php

namespace App\Controllers;

class User extends BaseController
{
	public function index()
	{
		$data = [
			'title' => 'Home | Yandri Site'
		];

		return view('user/index', $data);
	}

	public function about()
	{
		$data = [
			'title' => 'About Me'
		];
		return view('user/about', $data);
	}

	public function contact()
	{
		$data = [
			'title' => 'Contact Me',
			'alamat' => [
				[
					'tipe' => 'Rumah',
					'alamat' => 'Jl. jdj No. 123',
					'kota' => 'Bangkinang'
				],
				[
					'tipe' => 'Kos',
					'alamat' => 'Jl. jdj No. 123',
					'kota' => 'Panam'
				]
			]
		];
		return view('user/contact', $data);
	}
}
