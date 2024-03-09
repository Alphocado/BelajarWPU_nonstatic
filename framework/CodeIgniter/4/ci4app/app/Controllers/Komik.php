<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
  protected $komikModel;
  public function __construct()
  {
    $this->komikModel = new KomikModel();
  }

  public function index()
  {
    // $komik = $this->komikModel->findAll();

    $data = [
      'title' => 'Daftar Komik',
      'komik' => $this->komikModel->getKomik()
    ];

    // cara konek db tanpa model
    // $db = \Config\Database::connect();
    // $komik = $db->query("SELECT * FROM komik");
    // foreach ($komik->getResultArray() as $row) {
    //   d($row);
    // }

    // pake model
    // $komikModel = new \App\Models\KomikModel();

    return view('komik/index', $data);
  }

  public function detail($slug)
  {
    $komik = $this->komikModel->getKomik($slug);
    $data = [
      'title' => 'Detail Komik',
      'komik' => $komik
    ];
    return view('komik/detail', $data);
  }
}
