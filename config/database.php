<?php
date_default_timezone_set('Asia/Jakarta');
// deklarasi parameter koneksi database
$host     = "localhost";              // server database, default “localhost” atau “127.0.0.1”
$username = "root";                   // username database, default “root”
$password = "";                       // password database, default kosong
#$database = "aplikasi";             // memilih database yang akan digunakan
$database = "regonline";   

// buat koneksi database
$mysqli = mysqli_connect($host, $username, $password, $database);

// cek koneksi
// jika koneksi gagal 
if (!$mysqli) {
  // tampilkan pesan gagal koneksi
  die('Koneksi Database Gagal : ' . mysqli_connect_error());
}
