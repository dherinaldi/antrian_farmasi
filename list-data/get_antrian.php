<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
    // panggil file "database.php" untuk koneksi ke database
    require_once "../config/database.php";

    // ambil tanggal sekarang
    $tanggal = gmdate("Y-m-d", time() + 60 * 60 * 7);

    $tanggal_awal  = isset($_GET['tanggal_awal']) ? $_GET['tanggal_awal'] : '';
    $tanggal_akhir = isset($_GET['tanggal_akhir']) ? $_GET['tanggal_akhir'] : '';

// Base query
    $sql = "SELECT ta.tanggal, MAX(ta.no_antrian) AS antrian
        FROM regonline.tbl_antrian ta
        WHERE ta.status = 1";

// Tambahkan filter jika input tanggal ada
    if (! empty($tanggal_awal) && ! empty($tanggal_akhir)) {
        $sql .= " AND ta.tanggal BETWEEN '$tanggal_awal' AND '$tanggal_akhir'";
    }

    $sql .= " GROUP BY ta.tanggal";

// Eksekusi query
    $query = mysqli_query($mysqli, $sql)
    or die('Ada kesalahan pada query tampil data: ' . mysqli_error($mysqli));

    $rows = mysqli_num_rows($query);

    if ($rows != 0) {
        $response = array();
        $response["data"] = array();

        // ambil data hasil query
        while ($row = mysqli_fetch_assoc($query)) {
            $data['tanggal'] = $row["tanggal"];
            $data['antrian'] = $row["antrian"];            

            array_push($response["data"], $data);
        }

        // tampilkan data
       // echo json_encode($response);
    }
    echo json_encode($response);

}
