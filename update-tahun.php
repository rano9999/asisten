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

	$qy =	mysqli_query($connect, "UPDATE tahun_ajar SET
			tahun_ajar = '$nama' WHERE id_tahun = '$id'");
if ($qy) {
	echo '<script language="javascript">swal("Update berhasil!", "Data Tahun Ajar terupdate", "success").then(() => { window.location="tahun-ajar"; });</script>';
}else{
	echo '<script language="javascript">swal("Update gagal!", "Data Tahun Ajar gagal terupdate", "error").then(() => { window.history.back(); });</script>';
}
?>
