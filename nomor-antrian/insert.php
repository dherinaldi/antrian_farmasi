<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    // panggil file "database.php" untuk koneksi ke database
    require_once "../config/database.php";

    // ambil tanggal sekarang
    $tanggal = gmdate("Y-m-d", time() + 60 * 60 * 7);

    $jenis = ($_POST['jenis']);
    $id = explode("|",$_POST['id']);
        
    //$data['NOMOR']."|".$data['NOPEN']."|".$data['RUANGAN']."|".$data["NORM"];

    $nomor = $id[0];
    $nopen =$id[1];
    $ruangan =$id[2];
    $norm =$id[3];
    

    // membuat "no_antrian"
    // sql statement untuk menampilkan data "no_antrian" terakhir pada tabel "tbl_antrian" berdasarkan "tanggal"
    $query = mysqli_query($mysqli, "SELECT max(no_antrian) as nomor FROM tbl_antrian WHERE tanggal='$tanggal'")
    or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
    // ambil jumlah baris data hasil query
    $rows = mysqli_num_rows($query);

    // cek hasil query
    // jika "no_antrian" sudah ada
    if ($rows != 0) {
        // ambil data hasil query
        $data = mysqli_fetch_assoc($query);
        // "no_antrian" = "no_antrian" yang terakhir + 1
        $no_antrian = $data['nomor'] + 1;
    }
    // jika "no_antrian" belum ada
    else {
        // "no_antrian" = 1
        $no_antrian = 1;
    }

    $now = date('Y-m-d h:i:s');
    // sql statement untuk insert data ke tabel "tbl_antrian"
     $insert = mysqli_query($mysqli, "INSERT INTO tbl_antrian(tanggal, no_antrian,jenis,nomor,nopen,ruangan,norm,updated_date)
                                   VALUES('$tanggal', '$no_antrian','$jenis','$nomor','$nopen','$ruangan','$norm','$now')")
    or die('Ada kesalahan pada query insert : ' . mysqli_error($mysqli)); 

    $cek_rm = mysqli_query($mysqli, "SELECT NORM FROM regonline.pasien WHERE NORM='$norm'")
    or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));

    $rows_rm = mysqli_num_rows($cek_rm);

    if($rows_rm!=0){
        $s_action = "UPDATE `regonline`.`pasien` SET `NAMA` = 'nama_updated' WHERE `NORM` = '$norm'";
    }else{
        $s_action = "INSERT INTO `regonline`.`pasien` (`NORM`, `NAMA`) VALUES ('$norm', '111')";

    }
    
    $ins_rm = mysqli_query($mysqli, $s_action)
    or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));

    // cek query
    // jika proses insert berhasil
    if ($insert) {
        // tampilkan pesan sukses insert data
       echo "Sukses";
    }
}
