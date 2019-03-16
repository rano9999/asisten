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

$asisten = antiinjection($_POST['asisten']);
$kelas = antiinjection($_POST['kelas']);
$matkul = antiinjection($_POST['matkul']);
$jurusan = antiinjection($_POST['jurusan']);
$tahun = antiinjection($_POST['tahun']);
$smt = antiinjection($_POST['smt']);


	$cek = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM asisten_kelas
		WHERE id_asisten = '$asisten' AND id_kelas_asisten = '$kelas'
		AND id_matkul_asisten = '$matkul' AND id_jurusan = '$jurusan'
		AND id_tahun = '$tahun'"));
	if ($cek > 0) {
	  echo '<script language="javascript">swal("Simpan gagal!", "Data Asisten Kelas Sudah Ada!", "warning").then(() => { window.location="asisten-kelas"; });</script>';
	}else{
	  mysqli_query($connect, "INSERT INTO asisten_kelas (id_asisten, id_kelas_asisten, id_matkul_asisten, id_jurusan, id_tahun, smt)
			VALUES ('$asisten','$kelas','$matkul', '$jurusan', '$tahun','$smt')");
	  echo '<script language="javascript">swal("Simpan berhasil!", "Data Asisten Kelas tersimpan", "success").then(() => { window.location="asisten-kelas"; });</script>';
	}
?>
