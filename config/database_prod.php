<?php
date_default_timezone_set('Asia/Jakarta');
# 'database' => 'aplikasi','driver' => 'PDO_Mysql','hostname' => '127.0.0.1','username' => 'simrsgos','password' => 'S!MRSGos2',

// deklarasi parameter koneksi database
$host     = "192.168.100.120";              // server database, default “localhost” atau “127.0.0.1”
$username = "simrsgos";                   // username database, default “root”
$password = "S!MRSGos2";                       // password database, default kosong
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
