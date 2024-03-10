<?php

namespace App\Controllers;

use App\Models\KomikModel;
use \Config\Services;

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

    return view('/komik/index', $data);
  }

  public function create()
  {
    $title = 'Form tambah data komik';
    if (session()->has('validation')) {
      $data = [
        'title' => $title,
        'validation' => session('validation')
      ];
    } else {
      $data = [
        'title' => $title,
        'validation' => Services::validation()
      ];
    }
    return view('komik/create', $data);
  }

  public function save()
  {
    // dd($this->request->getVar());

    // validasi input
    if (!$this->validate([
      'judul' => [
        'rules' => 'required|is_unique[komik.judul]',
        'errors' => [
          'required' => '{field} komik harus diisi',
          'is_unique' => '{field} komik sudah terdaftar'
        ],
      ],
      'sampul' => 'uploaded[sampul]'
    ])) {
      $validation = Services::validation();

      /** 
       * pada bagian atas, saat validasi 'sampul' itu berhasil
       * tetapi saat redirect langsung error, dilihat 
       * apa masalahnya lagian beda versi 
       * mau bgmn,,,
       */
      return redirect()->to('/komik/create')->withInput()->with('validation', $validation);
    }

    $slug = url_title($this->request->getVar('judul'), '-', true);
    $this->komikModel->save([
      'judul' => $this->request->getVar('judul'),
      'slug' => $slug,
      'penulis' => $this->request->getVar('penulis'),
      'penerbit' => $this->request->getVar('penerbit'),
      'sampul' => $this->request->getVar('sampul')
    ]);

    session()->setFlashdata('pesan', 'Data berhasil ditambahkan');

    return redirect()->to('/komik');
  }

  public function delete($id)
  {
    $this->komikModel->delete($id);
    session()->setFlashdata('pesan', 'Data berhasil dihapuskan');
    return redirect()->to('/komik');
  }

  public function edit($slug)
  {
    $title = 'Form ubah data Komik';
    if (session()->has('validation')) {
      $validation = session('validation');
    } else {
      $validation = Services::validation();
    }
    $data = [
      'title' => $title,
      'validation' => $validation,
      'komik' => $this->komikModel->getKomik($slug)
    ];
    return view('komik/edit', $data);
  }

  public function detail($slug)
  {
    $data = [
      'title' => 'Detail Komik',
      'komik' => $this->komikModel->getKomik($slug)
    ];
    // jika komik tidak ada di table
    if (empty($data['komik'])) {
      throw new \CodeIgniter\Exceptions\PageNotFoundException('Judul komik ' . $slug . ' tidak ditemukan');
    }
    return view('komik/detail', $data);
  }

  public function update($id)
  {
    // cek judul
    $komikLama = $this->komikModel->getKomik($this->request->getVar('slug'));
    if ($komikLama['judul'] == $this->request->getVar('judul')) {
      $rule_judul = 'required';
    } else {
      $rule_judul = 'required|is_unique[komik.judul]';
    }

    if (!$this->validate([
      'judul' => [
        'rules' => $rule_judul,
        'errors' => [
          'required' => '{field} komik harus diisi',
          'is_unique' => '{field} komik sudah terdaftar'
        ]
      ]
    ])) {
      $validation = Services::validation();
      return redirect()->to('/komik/edit/' . $this->request->getVar('slug'))->withInput()->with('validation', $validation);
    }

    $slug = url_title($this->request->getVar('judul'), '-', true);
    $this->komikModel->save([
      'id' => $id,
      'judul' => $this->request->getVar('judul'),
      'slug' => $slug,
      'penulis' => $this->request->getVar('penulis'),
      'penerbit' => $this->request->getVar('penerbit'),
      'sampul' => $this->request->getVar('sampul')
    ]);

    session()->setFlashdata('pesan', 'Data berhasil diubah');

    return redirect()->to('/komik');
  }
}
