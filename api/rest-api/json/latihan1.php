<?php 

// $mahasiswa = [
//   [
//     "nama" => "Udin",
//     "nrp" => "8247324",
//     "email" => "udin@gmail.com" 
//   ],
//   [
//     "nama" => "Udin",
//     "nrp" => "8247324",
//     "email" => "udin@gmail.com" 
//   ],
// ];

// var_dump($mahasiswa);

// ubah menjadi json
// $data = json_encode($mahasiswa);
// echo $data;


$dbh = new PDO('mysql:host=localhost;dbname=phpmvc', 'root', '');
$db = $dbh->prepare("SELECT * FROM mahasiswa");
$db->execute();
$mahasiswa = $db->fetchAll(PDO::FETCH_ASSOC);

$data = json_encode($mahasiswa);
echo $data;

?>
