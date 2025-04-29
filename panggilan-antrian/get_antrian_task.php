<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    // panggil file "database.php" untuk koneksi ke database
    require_once "../config/database.php";
    require_once "../config/database_prod.php";

    // ambil tanggal sekarang
    $tanggal = gmdate("Y-m-d", time() + 60 * 60 * 7);
    $tanggal_test = "2024-01-18";

    // sql statement untuk menampilkan data dari tabel "tbl_antrian" berdasarkan "tanggal"
    $s_query = "SELECT ta.id, ta.no_antrian, ta.status, ta.jenis,ta.tanggal,ta.nomor,ta.nopen,ta.ruangan,ru.DESKRIPSI POLI,LPAD(ta.norm,6,'0') as norm ,p.NAMA , ta.norm norm_ori
  FROM tbl_antrian ta left join regonline.pasien p on ta.norm = p.NORM
  left join ruangan ru on ru.ID = ta.ruangan
  WHERE tanggal='$tanggal'";
    //echo $s_query;

    $query = mysqli_query($mysqli, $s_query)
    or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
    // ambil jumlah baris data hasil query
    $rows = mysqli_num_rows($query);

    // cek hasil query
    // jika data ada
    if ($rows != 0) {
        $response = array();
        $response["data"] = array();

        // ambil data hasil query
        while ($row = mysqli_fetch_assoc($query)) {
            $data['id'] = $row["id"];
            $data['no_antrian'] = $row["no_antrian"];
            $data['status'] = $row["status"];
            $data['jenis'] = $row["jenis"];
            $data['tanggal'] = $row["tanggal"];
            $data['norm'] = "(" . $row["norm"] . ") " . $row['NAMA'];
            $data['ruangan'] = $row['POLI'];

            //$s_task_5 = "select  regonline.getJamTaskid(5, ".$row["norm"].", ".$row["tanggal"].") as peresepan";
            $s_task_5 = "select  regonline.getJamTaskid(5, " . $row["norm_ori"] . ", '" . $row["tanggal"] . "') as peresepan , regonline.getJamTaskid(6, " . $row["norm_ori"] . ", '" . $row["tanggal"] . "') as validasi, regonline.getJamTaskid(7, " . $row["norm_ori"] . ", '" . $row["tanggal"] . "') as penyerahan";
            //echo $s_task_5."<br>";
            $query_task = mysqli_query($mysqli_prod, $s_task_5)
            or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli_prod));

            $data_query = mysqli_fetch_assoc($query_task);
            $data['peresepan'] = $data_query['peresepan'];
            $data['validasi'] = $data_query['validasi'];
            $data['penyerahan'] = $data_query['penyerahan'];

            $racikan = ($row["jenis"] == 0 ? 'NON RACIKAN' : 'RACIKAN');
            $data['racikan'] = $racikan;

            array_push($response["data"], $data);
        }

        // tampilkan data
        echo json_encode($response);
    }
    // jika data tidak ada
    else {
        $response = array();
        $response["data"] = array();

        // buat data kosong untuk ditampilkan
        $data['id'] = "";
        $data['no_antrian'] = "-";
        $data['status'] = "";
        $data['jenis'] = "";
        $data['racikan'] = "";
        $data['tanggal'] = "-";
        $data['norm'] = "-";
        $data['ruangan'] = "-";
        $data['peresepan'] = "-";
        $data['validasi'] = "-";
        $data['penyerahan'] = "-";

        array_push($response["data"], $data);

        // tampilkan data
        echo json_encode($response);
    }
}
