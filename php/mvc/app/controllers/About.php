<?php 

class About extends Controller {
  // method default wajib agar menghindari error
  // cara implementasi parameter? cukup kek begini saja
  public function index($nama = "John Doe", $pekerjaan = "Mahasiswa", $umur = 22)
  {
    // echo "Halo nama saya $nama, saya $pekerjaan, berumur $umur tahun";
    $data['nama'] = $nama;
    $data['pekerjaan'] = $pekerjaan;
    $data['umur'] = $umur;

    $data['judul'] = "halaman about";
    $this->view('templates/header', $data);
    $this->view('about/index', $data);
    $this->view('templates/footer');
  }
  public function page()
  {
    // echo 'About/page';
    $data['judul'] = "halaman list";
    $this->view('templates/header', $data);
    $this->view('about/page');
    $this->view('templates/footer');
  }
}

?>