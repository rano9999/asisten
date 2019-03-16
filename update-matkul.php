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
$dosen = antiinjection($_POST['dosen']);

	$qy =	mysqli_query($connect, "UPDATE matkul SET
			nama_matkul = '$nama', dosen_matkul = '$dosen' WHERE id_matkul = '$id'");
if ($qy) {
	echo '<script language="javascript">swal("Update berhasil!", "Data Matkul terupdate", "success").then(() => { window.location="matkul"; });</script>';
}else{
	echo '<script language="javascript">swal("Update gagal!", "Data Matkul gagal terupdate", "error").then(() => { window.history.back(); });</script>';
}
?>
