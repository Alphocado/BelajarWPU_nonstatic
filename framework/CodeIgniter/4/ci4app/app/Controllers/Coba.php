<?php

namespace App\Controllers;

class Coba extends BaseController
{
  public function index()
  {
    echo "Page Coba";
  }
  public function about($nama = '')
  {
    echo "My name is $nama";
  }
}
