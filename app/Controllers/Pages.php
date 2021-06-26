<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function about()
    {
        $data = [
            'title' => 'About Us',
            'cart' => \Config\Services::cart()
        ];
        return view('pages/about', $data);
    }

    public function contact()
    {
        $data = [
            'title' => 'Contact Us',
            'cart' => \Config\Services::cart()
        ];
        return view('pages/contact', $data);
    }
}
