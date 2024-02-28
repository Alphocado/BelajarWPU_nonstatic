<?php

// kalau semisal taro controller file di folder
namespace App\Controllers\Admin;

// pakai use agar bisa connect BaseController kembali
use App\Controllers\BaseController;

class Users extends BaseController
{
  public function index()
  {
    echo "This is users/admin";
  }
}
