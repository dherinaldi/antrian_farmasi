<?php
date_default_timezone_set('Asia/Jakarta');

// deklarasi parameter koneksi database
$host     = "localhost";              // server database, default “localhost” atau “127.0.0.1”
$username = "root";                   // username database, default “root”
$password = "";                       // password database, default kosong
$database = "aplikasi";     

#$host     = "192.168.100.120";              // server database, default “localhost” atau “127.0.0.1”
#$username = "admin";                   // username database, default “root”
#$password = "S!MRSGos2";                       // password database, default kosong       
#$database = "regonline";    // memilih database yang akan digunakan

// buat koneksi database
$mysqli = mysqli_connect($host, $username, $password, $database);

// cek koneksi
// jika koneksi gagal 
if (!$mysqli) {
  // tampilkan pesan gagal koneksi
  die('Koneksi Database Gagal : ' . mysqli_connect_error());
}
