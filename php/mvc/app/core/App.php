<?php

class App
{
  // untuk sebagai page default jika tidak ada method masuk
  protected $controller = 'Home';
  protected $method = 'index';
  // method (url) tambahan selain home index
  protected $params = [];

  public function __construct()
  {
    // $url pasti akan berisi apapun yang di isi di url
    $url = $this->parseURL();

    // CONTROLLER 
    // mengecek apakah ada file sesuai dengan url yang dimasukkan
    if (isset($url[0])) {
      if (file_exists('../app/controllers/' . $url[0] . '.php')) {
        // bagian pertama url, akan dicarikan controllernya
        $this->controller = $url[0];
        // karena untuk mengakses file yang dicari, maka file pertama harus dihapus
        unset($url[0]);
        // var_dump($url);
      }
    }
    // karena sudah tau controller dari diatas, maka dipanggillah
    require_once '../app/controllers/' . $this->controller . '.php';
    // setelah itu instansiasi
    // untuk bisa memanggil method nya
    $this->controller = new $this->controller;

    // METHOD
    // mengecek, di url kedua (method) ada tidak
    if (isset($url[1])) {
      // mengecek apakah url ada methodnya atau tidak
      if (method_exists($this->controller, $url[1])) {
        // kalau ada method nya timpa
        $this->method = $url[1];
        // mengeluarkan method dari url
        unset($url[1]);
      }
    }

    // PARAMS
    // mengecek apakah setelah method url ada yang lain? untuk dijadikan parameter
    if (!empty($url)) {
      // disimpan dalam bentuk array baru
      $this->params = array_values($url);
      // var_dump($url);
    }

    // jalankan controller $ method, serta kirimkan params jika ada
    call_user_func_array([$this->controller, $this->method], $this->params);
  }

  // menangkap url dan jadikan array
  public function parseURL()
  {
    if (isset($_GET['url'])) {
      // menghapus slash di bagian akhir url
      $url = rtrim($_GET['url'], '/');
      // filter url agar tidak ada simbol ambigu
      $url = filter_var($url, FILTER_SANITIZE_URL);
      // pecah menjadi array
      $url = explode('/', $url);
      return $url;
    }
  }
}
