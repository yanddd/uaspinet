<?php

namespace App\Controllers;

class Pages extends BaseController
{
    public function about()
    {
        $data = [
            'title' => 'About Me'
        ];
        return view('pages/about', $data);
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
        return view('pages/contact', $data);
    }
}
