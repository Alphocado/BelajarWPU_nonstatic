<?php

namespace App\Models;

use CodeIgniter\Model;

class KomikModel extends Model
{
  protected $table = 'komik';
  protected $setTimestamps = true;

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
