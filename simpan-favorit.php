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
	$penilai = antiinjection($_POST['pemilih']);
	$kelas = antiinjection($_POST['kelas']);


	$cek1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM `asisten_kelas` WHERE `id_asisten` = '$asisten'"));
	$cek5 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM `tahun_ajar` WHERE `aktif` = 'Ya'"));
	$cek = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `nilai_asistenfavorit` WHERE `penilai` = '$penilai'"));
	if ($cek > 0) {
 			echo '<script language="javascript">swal("Simpan Gagal!", "Anda telah memberikan penilaian!", "warning").then(() => { window.location="dashboard-siswa"; });</script>';
	}else{
		$cek2 = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `nilai_akumulasi_favorit` WHERE `id_asisten` = '$asisten' AND `tahun_ajar` = '$cek5[id_tahun]' AND `smt` = '$cek5[semester]'"));
		if ($cek2 > 0) {
			$cek3 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM `nilai_akumulasi_favorit` WHERE `id_asisten` = '$asisten' AND `tahun_ajar` = '$cek5[id_tahun]' AND `smt` = '$cek5[semester]'"));
			$jm = $cek3['jml_pemilih'] + 1;

			mysqli_query($connect, "UPDATE `nilai_akumulasi_favorit` SET `jml_pemilih`='$jm' WHERE `id_asisten`= '$asisten' AND `tahun_ajar`='$cek5[id_tahun]' AND `smt`='$cek5[semester]'");

			mysqli_query($connect, "INSERT INTO `nilai_asistenfavorit`( `tahun_ajar`, `kelas`, `penilai`, `asistenfavorit`, `smt`)
			VALUES ('$cek1[id_tahun]', '$kelas','$penilai','$asisten','$cek5[semester]')");
			echo '<script language="javascript">swal("Simpan berhasil!", "Data Nilai tersimpan", "success").then(() => { window.location="dashboard-siswa"; });</script>';

		}else{
			mysqli_query($connect, "INSERT INTO `nilai_asistenfavorit`( `tahun_ajar`, `kelas`, `penilai`, `asistenfavorit`, `smt`)
			VALUES ('$cek1[id_tahun]', '$kelas','$penilai','$asisten','$cek5[semester]')");

			mysqli_query($connect, "INSERT INTO `nilai_akumulasi_favorit`( `id_asisten`, `jml_pemilih`, `tahun_ajar`, `smt`)
			VALUES ( '$asisten','1','$cek1[id_tahun]','$cek5[semester]')");

			echo '<script language="javascript">swal("Simpan berhasil!", "Data Nilai tersimpan", "success").then(() => { window.location="dashboard-siswa"; });</script>';

		}
	}
?>
