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

$nim = antiinjection($_POST['nim']);
$tahun = antiinjection($_POST['tahun']);
$smt = antiinjection($_POST['smt']);
$kelas = antiinjection($_POST['kelas']);
$kreatifitas = antiinjection($_POST['kreatifitas']);
$kedisiplinan = antiinjection($_POST['kedisiplinan']);
$kerapian = antiinjection($_POST['kerapian']);
$komunikasi = antiinjection($_POST['komunikasi']);
$pemahaman = antiinjection($_POST['pemahaman']);
$kritik = antiinjection($_POST['kritik']);
$penilai = antiinjection($_POST['pemilih']);

$total = ($kreatifitas + $kedisiplinan + $kerapian + $komunikasi + $pemahaman);


	$cek = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM `nilai_akumulasi_terbaik` WHERE `id_asisten` = '$nim' AND `tahun_ajar` = '$tahun' AND `semester` = '$smt'"));
	if ($cek > 0) {
		$cek1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM `nilai_akumulasi_terbaik` WHERE `id_asisten` = '$nim' AND `tahun_ajar` = '$tahun' AND `semester` = '$smt'"));
		$kr = $kreatifitas + $cek1['tot_kreatifias'];
		$kd = $kedisiplinan + $cek1['tot_kedisiplinan'];
		$kp = $kerapian + $cek1['tot_kerapihan'];
		$km = $komunikasi + $cek1['tot_komunikasi'];
		$pm = $pemahaman + $cek1['tot_pemahaman'];
		$jm = $cek1['jml_mhs'] + 1;

		$tot = ($kr+$kd+$kp+$km+$pm)/$jm;

			mysqli_query($connect, "UPDATE `nilai_akumulasi_terbaik` SET
			`tot_kreatifias`='$kr',`tot_kedisiplinan`='$kd',`tot_kerapihan`='$kp',`tot_komunikasi`='$km',`tot_pemahaman`='$pm',`jml_mhs`='$jm', `total`='$tot'
			WHERE `id_asisten` = '$nim' AND `tahun_ajar` = '$tahun' AND `semester` = '$smt'");

			mysqli_query($connect, "INSERT INTO `nilai`(`tahun_ajar`, `kelas`, `asisten`, `penilai`, `kreatifitas`, `kedisiplinan`, `kerapian`, `komunikasi`, `pemahaman_materi`, `kritik-saran`, `total`,`smt`)
			VALUES ('$tahun','$kelas','$nim', '$penilai', '$kreatifitas','$kedisiplinan','$kerapian','$komunikasi','$pemahaman','$kritik','$total','$smt')");

			echo '<script language="javascript">swal("Simpan berhasil!", "Data Nilai tersimpan", "success").then(() => { window.location="dashboard-siswa"; });</script>';
	}else{
	  mysqli_query($connect, "INSERT INTO `nilai_akumulasi_terbaik`(`id_asisten`, `tot_kreatifias`, `tot_kedisiplinan`, `tot_kerapihan`, `tot_komunikasi`, `tot_pemahaman`, `jml_mhs`, `tahun_ajar`, `semester`,`total`)
		VALUES ('$nim', '$kreatifitas','$kedisiplinan','$kerapian','$komunikasi','$pemahaman', '1', '$tahun','$smt','$total')");
		mysqli_query($connect, "INSERT INTO `nilai`(`tahun_ajar`, `kelas`, `asisten`, `penilai`, `kreatifitas`, `kedisiplinan`, `kerapian`, `komunikasi`, `pemahaman_materi`, `kritik-saran`, `total`,`smt`)
		VALUES ('$tahun','$kelas','$nim', '$penilai', '$kreatifitas','$kedisiplinan','$kerapian','$komunikasi','$pemahaman','$kritik','$total','$smt')");

	  echo '<script language="javascript">swal("Simpan berhasil!", "Data Nilai tersimpan", "success").then(() => { window.location="dashboard-siswa"; });</script>';
	}
?>
