<?php

namespace App\Controllers;

class Coba extends BaseController
{
  public function index()
  {
    echo "Page Coba";
  }
  public function about($nama = '', $umur = 0)
  {
    echo "My name is $nama, im $umur years old";
  }
}
