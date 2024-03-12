<?php

namespace App\Controllers;

class Pages extends BaseController
{
  public function index()
  {
    $data = [
      'title' => 'Home | Alphocado Web',
      'tes' => ['satu', 'dua', 'tiga'],
    ];

    // bisa ganti return dengan echo
    return view('pages/home', $data);
  }

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
      'title' => 'Contact Us',
      'alamat' => [
        [
          'tipe' => 'rumah',
          'alamat' => 'Jln Sukarno',
          'kota' => 'makassar'
        ],
        [
          'tipe' => 'Kantor',
          'alamat' => 'Jln jalanan',
          'kota' => 'Bandung'
        ]
      ]
    ];
    return view('pages/contact', $data);
  }
}
