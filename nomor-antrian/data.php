<?php
// pengecekan ajax request untuk mencegah direct access file, agar file tidak bisa diakses secara langsung dari browser
// jika ada ajax request
if (isset($_SERVER['HTTP_X_REQUESTED_WITH']) && ($_SERVER['HTTP_X_REQUESTED_WITH'] == 'XMLHttpRequest')) {
 
}

require_once "../config/database_prod.php";
$tanggal = gmdate("Y-m-d", time() + 60 * 60 * 7);

$search = $_REQUEST['search'];
//echo $search;

//$start = ( $start != '' )?date( 'Y-m-d', strtotime( $start ) ):date( 'Y-m-d' );

$s_where=$s_tanggal='';

$s_tanggal = " AND DATE_FORMAT(kun.MASUK,'%Y-%m-%d') BETWEEN '".$tanggal."' AND '".$tanggal."' ";

$search = ( $search != '' )?" AND pen.NORM LIKE '%".$search."%' ":"";

//echo $search;

$s_query = "SELECT SQL_NO_CACHE kun.NOMOR, kun.NOPEN, kun.RUANGAN , `master`.getNamaRuang(kun.RUANGAN) POLI, kun.MASUK, kun.KELUAR ,pen.NORM, 
`master`.getNamaLengkap(pen.NORM) NAMA, o.PEMBERI_RESEP, o.TUJUAN, `master`.getNamaRuang(o.TUJUAN) NAMA_TUJUAN
FROM pendaftaran.kunjungan kun
LEFT join pendaftaran.pendaftaran pen ON pen.NOMOR = kun.NOPEN
LEFT JOIN layanan.order_resep o ON kun.NOMOR = o.KUNJUNGAN
LEFT JOIN `master`.pasien mp ON mp.NORM = pen.NORM
WHERE 0=0
AND kun.RUANGAN LIKE '10201%'  
$search
".$s_tanggal."
GROUP BY o.KUNJUNGAN
ORDER BY o.KUNJUNGAN DESC limit 10";

$fetchData = mysqli_query($mysqli, $s_query)
or die('Ada kesalahan pada query tampil data : ' . mysqli_error($mysqli));
// ambil data hasil query

$hasil = array();

// buat variabel untuk menampilkan data
while ($data = mysqli_fetch_array($fetchData)) {
  $id = $data['NOMOR']."|".$data['NOPEN']."|".$data['RUANGAN']."|".$data["NORM"];
  $norm = sprintf("%06d", $data["NORM"]);
  $text = $norm." | ".$data["NAMA"]." | ".$data["POLI"];

  $hasil[] = array("id" => $id, "text" => $text);
}

echo json_encode($hasil);
