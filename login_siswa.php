<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
	 <meta charset="utf-8">
	 <script type="text/javascript" src="assets/vendor/sweetalert/sweetalert.min.js"></script>
 </head>
</html>


<?php

include('koneksi.php');

function antiinjection($data){
	$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
  	return $filter_sql;
}

$nim = $_POST['nim'];
$pass = $_POST['pass'];
// $kode = $_POST['kode'];


$c = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM mahasiswa WHERE nim = '$nim' AND password = '$pass'"));
if ($c['nim'] == $nim AND $c['password'] == $pass) {

  $_SESSION['nim'] = $nim;
  $_SESSION['nama'] = $c['nama_mhs'];
  $_SESSION['kelas'] = $c['kelas_mhs'];

  echo '<script language="javascript">swal("Login berhasil!", "Silahkan Masuk!", "success").then(() => { window.location="dashboard-siswa"; });</script>';
}else{
  echo '<script language="javascript">swal("Login Gagal!", " Silahkan cek lagi username dan password anda!", "error").then(() => { window.location="masuk"; });</script>';
}

?>
