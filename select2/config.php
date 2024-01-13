<?php

$host     = "192.168.100.120";              // server database, default “localhost” atau “127.0.0.1”
$username = "simrsgos";                   // username database, default “root”
$password = "S!MRSGos2";                       // password database, default kosong
#$database = "aplikasi";             // memilih database yang akan digunakan
$database = "regonline";   

// buat koneksi database
$con = mysqli_connect($host, $username, $password, $database);

// cek koneksi
// jika koneksi gagal 
if (!$con) {
  // tampilkan pesan gagal koneksi
  die('Koneksi Database Gagal : ' . mysqli_connect_error());
}