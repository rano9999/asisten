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

$nama = antiinjection($_POST['nama']);

	$cek = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM tahun_ajar WHERE tahun_ajar = '$nama'"));
	if ($cek > 0) {
	  echo '<script language="javascript">swal("Simpan gagal!", "Data Tahun Ajar Sudah Ada!", "warning").then(() => { window.location="tahun-ajar"; });</script>';
	}else{
	  mysqli_query($connect, "INSERT INTO tahun_ajar (tahun_ajar)
			VALUES ('$nama')");
	  echo '<script language="javascript">swal("Simpan berhasil!", "Data Tahun Ajar tersimpan", "success").then(() => { window.location="tahun-ajar"; });</script>';
	}

?>
