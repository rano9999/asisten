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
$dosen = antiinjection($_POST['dosen']);

	$cek = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM matkul WHERE nama_matkul = '$nama' AND dosen_matkul = '$dosen'"));
	if ($cek > 0) {
	  echo '<script language="javascript">swal("Simpan gagal!", "Data Matkul Sudah Ada!", "warning").then(() => { window.location="matkul"; });</script>';
	}else{
	  mysqli_query($connect, "INSERT INTO matkul (nama_matkul, dosen_matkul)
			VALUES ('$nama','$dosen')");
	  echo '<script language="javascript">swal("Simpan berhasil!", "Data Matkul tersimpan", "success").then(() => { window.location="matkul"; });</script>';
	}

?>
