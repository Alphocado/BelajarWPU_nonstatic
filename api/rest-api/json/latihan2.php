<?php 

// nangkap file jsonnya
$data = file_get_contents('coba.json');

// kalau tanpa true menjadi object
// $mahasiswa = json_decode($data);
// kalau dengan true jadi array
$mahasiswa = json_decode($data, true);

var_dump($mahasiswa);
var_dump($mahasiswa[0]["pembimbing"][1]);

?>