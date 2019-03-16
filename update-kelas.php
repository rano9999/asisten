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
$nama = antiinjection($_POST['nama']);
$jurusan = antiinjection($_POST['jurusan']);
$kode = antiinjection($_POST['kode']);

	$qy =	mysqli_query($connect, "UPDATE kelas SET
			nama_kelas = '$nama', kode_akses = '$kode', jurusan = '$jurusan' WHERE id_kelas = '$id'");
if ($qy) {
	echo '<script language="javascript">swal("Update berhasil!", "Data Kelas terupdate", "success").then(() => { window.location="Kelas"; });</script>';
}else{
	echo '<script language="javascript">swal("Update gagal!", "Data Kelas gagal terupdate", "error").then(() => { window.history.back(); });</script>';
}
?>
