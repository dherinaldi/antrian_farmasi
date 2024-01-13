<?php
include 'config.php';

if(!isset($_POST['searchTerm'])){
	$fetchData = mysqli_query($con,"SELECT  *
	FROM pendaftaran.kunjungan kun
	LEFT join pendaftaran.pendaftaran pen ON pen.NOMOR = kun.NOPEN
	LEFT JOIN layanan.order_resep o ON kun.NOMOR = o.KUNJUNGAN
	WHERE 0=0
	AND kun.RUANGAN LIKE '10201%'  
	AND DATE_FORMAT(kun.MASUK,'%Y-%m-%d') BETWEEN '2023-06-05' AND '2023-06-05'
	GROUP BY o.KUNJUNGAN
	ORDER BY o.KUNJUNGAN DESC limit 10");
}else{
	$search = $_POST['searchTerm'];
	$fetchData = mysqli_query($con,"SELECT  *
	FROM pendaftaran.kunjungan kun
	LEFT join pendaftaran.pendaftaran pen ON pen.NOMOR = kun.NOPEN
	LEFT JOIN layanan.order_resep o ON kun.NOMOR = o.KUNJUNGAN
	WHERE 0=0
	AND kun.RUANGAN LIKE '10201%'
	AND pen.NORM LIKE '%".$search."%'
	AND DATE_FORMAT(kun.MASUK,'%Y-%m-%d') BETWEEN '2023-06-05' AND '2023-06-05'
	GROUP BY o.KUNJUNGAN
	ORDER BY o.KUNJUNGAN DESC limit 10");
}
	
$data = array();

while ($row = mysqli_fetch_array($fetchData)) {
    $data[] = array("id"=>$row['NOPEN'], "text"=>$row['NOPEN']);
}

echo json_encode($data);
