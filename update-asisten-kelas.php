<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
	 <meta charset="utf-8">
	 <script type="text/javascript" src="assets/vendor/sweetalert/sweetalert.min.js"></script>
 </head>
</html>
<?php
include('koneksi.php');
// include('session.php');

function antiinjection($data){
    $filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
    return $filter_sql;
}

$id = antiinjection($_POST['id']);
$asisten = antiinjection($_POST['asisten']);
$kelas = antiinjection($_POST['kelas']);
$matkul = antiinjection($_POST['matkul']);
$jurusan = antiinjection($_POST['jurusan']);
$tahun = antiinjection($_POST['tahun']);
$smt = antiinjection($_POST['smt']);

	$qy =	mysqli_query($connect, "UPDATE asisten_kelas SET
			id_asisten = '$asisten',
			id_kelas_asisten = '$kelas',
			id_matkul_asisten = '$matkul',
			id_jurusan = '$jurusan',
			id_tahun = '$tahun',
			smt = '$smt' WHERE id_asisten_kelas = '$id'");
if ($qy) {
	echo '<script language="javascript">swal("Update berhasil!", "Data Asisten Kelas terupdate", "success").then(() => { window.location="asisten-kelas"; });</script>';
}else{
	echo '<script language="javascript">swal("Update gagal!", "Data Asisten Kelas gagal terupdate", "error").then(() => { window.history.back(); });</script>';
}
?>
