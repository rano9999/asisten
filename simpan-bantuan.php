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
$ket = antiinjection($_POST['ket']);

	$cek = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM bantuan WHERE nama = '$nama'"));
	if ($cek > 0) {
	  echo '<script language="javascript">swal("Simpan gagal!", "Data Sudah Ada!", "warning").then(() => { window.location="bantuan"; });</script>';
	}else{
	  $qy = mysqli_query($connect, "INSERT INTO bantuan (nama, keterangan)
			VALUES ('$nama', '$ket')");
	  if($qy){
	  echo '<script language="javascript">swal("Simpan berhasil!", "Data tersimpan", "success").then(() => { window.location="bantuan"; });</script>';
	  }else{
	echo '<script language="javascript">swal("Simpan gagal!", "Data gagal tersimpan", "success").then(() => { window.location="bantuan"; });</script>';
	  }
	}
?>
