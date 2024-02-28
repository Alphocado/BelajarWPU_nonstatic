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
    echo view('layout/header', $data);
    echo view('pages/home');
    echo view('layout/footer');
  }

  public function about()
  {
    $data = [
      'title' => 'About Me'
    ];
    echo view('layout/header', $data);
    echo view('pages/about');
    echo view('layout/footer');
  }
}
