<?php

namespace App\Models;

use CodeIgniter\Model;

class KomikModel extends Model
{
  protected $table = 'komik';
  protected $setTimestamps = true;
  protected $allowedFields = ['judul', 'slug', 'penulis', 'penerbit', 'sampul'];

  public function getKomik($slug = false)
  {
    // jika slug kosong
    if ($slug == false) {
      return $this->findAll();
    }

    // jika slug tidak kosong
    return $this->where(['slug' => $slug])->first();
  }
}
