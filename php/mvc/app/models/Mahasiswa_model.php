<?php 

class Mahasiswa_model {
  // cara lama
  // private $mhs = [
  //   [
  //       "nama" => "John Doe",
  //       "nrp" =>  "9837492",
  //       "email" => "john@gmail.com",
  //       "jurusan" => "teknik mesin"
  //   ],
  //   [
  //       "nama" => "Jane Smith",
  //       "nrp" =>  "8745631",
  //       "email" => "jane@yahoo.com",
  //       "jurusan" => "teknik elektro"
  //   ],
  //   [
  //       "nama" => "Bob Johnson",
  //       "nrp" =>  "5629384",
  //       "email" => "bob@example.com",
  //       "jurusan" => "sistem informasi"
  //   ],
  //   [
  //       "nama" => "Alice Williams",
  //       "nrp" =>  "7451298",
  //       "email" => "alice@gmail.com",
  //       "jurusan" => "teknik mesin"
  //   ],
  //   [
  //       "nama" => "Charlie Brown",
  //       "nrp" =>  "3918745",
  //       "email" => "charlie@example.com",
  //       "jurusan" => "teknik elektro"
  //   ]
  // ];

  // cara baru
  // database handler
  // private $dbh;
  // private $stmt;

  // public function __construct()
  // {
  //   // data source name
  //   $dsn = 'mysql:host=localhost;dbname=phpmvc';
  //   try {
  //     $this->dbh = new PDO($dsn, 'root', '');
  //   } catch (PDOException $e){
  //     die($e->getMessage());
  //   }
  // }

  private $table = 'mahasiswa';
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  public function getAllMahasiswa()
  {
    // return $this->mhs;
    $this->db->query("SELECT * FROM $this->table");
    return $this->db->resultSet();
  }

  public function getMahasiswaByID($id)
  {
    $this->db->query('SELECT * FROM ' . $this->table . ' WHERE id =:id');
    $this->db->bind('id', $id);
    return $this->db->single();
  }

  public function tambahDataMahasiswa($data)
  {
    $query = "INSERT INTO mahasiswa VALUES 
    ('', :nama, :nrp, :email, :jurusan)";
    $this->db->query($query);
    $this->db->bind('nama', $data['nama']);
    $this->db->bind('nrp', $data['nrp']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('jurusan', $data['nama']);
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function ubahDataMahasiswa($data)
  {
    $query = "UPDATE mahasiswa SET nama = :nama, nrp = :nrp, email = :email, jurusan = :jurusan WHERE id = :id";
    $this->db->query($query);
    $this->db->bind('id', $data['id']);
    $this->db->bind('nama', $data['nama']);
    $this->db->bind('nrp', $data['nrp']);
    $this->db->bind('email', $data['email']);
    $this->db->bind('jurusan', $data['jurusan']);
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function hapusDataMahasiswa($id)
  {
    $query = "DELETE FROM mahasiswa WHERE id=:id";
    $this->db->query($query);
    $this->db->bind('id', $id);
    $this->db->execute();
    return $this->db->rowCount();
  }

  public function cariDataMahasiswa()
  {
    $keyword = $_POST['keyword'];
    $query = "SELECT * FROM mahasiswa WHERE nama LIKE :keyword";
    $this->db->query($query);
    $this->db->bind('keyword', "%$keyword%");
    return $this->db->resultSet();
  }
}

?>