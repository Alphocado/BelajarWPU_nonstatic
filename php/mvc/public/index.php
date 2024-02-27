<?php

if (!session_id()) session_start();

// ini yang akan menjadi halaman utama
require_once '../app/init.php';

$app = new App;
