<?php
date_default_timezone_set('Asia/Jakarta');

$host     = "192.168.100.120";              // server database, default “localhost” atau “127.0.0.1”
$username = "admin";                   // username database, default “root”
$password = "S!MRSGos2";                       // password database, default kosong       
$database = "regonline";    // memilih database yang akan digunakan

// buat koneksi database
$mysqli = mysqli_connect($host, $username, $password, $database);

// cek koneksi
// jika koneksi gagal 
if (!$mysqli) {
  // tampilkan pesan gagal koneksi
  die('Koneksi Database Gagal : ' . mysqli_connect_error());
}
