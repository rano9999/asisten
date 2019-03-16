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
$nama = antiinjection($_POST['nama']);
$jabatan = antiinjection($_POST['jabatan']);
$pass = md5("vieyama".$nim);

if (isset($_POST['ubah_foto'])) {
	if($_FILES['foto']['name']!='')
	{
		$target_dir = "images/";
    $target_file = $target_dir . basename($nim . "-" . $_FILES["foto"]["name"]);
    $fotobaru = $nim . "-" . $_FILES["foto"]["name"];

		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));


		// gambar 1
		$check = getimagesize($_FILES["foto"]["tmp_name"]);
		if($check !== false) {
				$uploadOk = 1;
		} else {
			echo '<script language="javascript">swal("Simpan gagal!", "File bukan gambar", "warning").then(() => { window.location="list-admin"; });</script>';
				$uploadOk = 0;
		}

		// Check file size
		if ($_FILES["foto"]["size"] > 2000000) {
			echo '<script language="javascript">swal("Simpan gagal!", "Gambar tidak boleh lebih dari 2MB", "warning").then(() => { window.location="list-admin"; });</script>';
				$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
			echo '<script language="javascript">swal("Simpan gagal!", "Gambar hanya boleh berupa JPG, PNG atau JPEG", "warning").then(() => { window.location="list-admin"; });</script>';
				$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo '<script language="javascript">swal("Simpan gagal!", "Foto gagal diupload!", "warning").then(() => { window.location="list-admin"; });</script>';
		// if everything is ok, try to upload file
		} else {
				if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
				} else {
					echo '<script language="javascript">swal("Simpan gagal!", "Foto gagal diupload!", "warning").then(() => { window.location="list-admin"; });</script>';
				}
		}
	}

	$cek = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM admin WHERE username = '$nim'"));
	if ($cek > 0) {
	  echo '<script language="javascript">swal("Simpan gagal!", "Data Admin Sudah Ada!", "warning").then(() => { window.location="list-admin"; });</script>';
	}else{
	  mysqli_query($connect, "INSERT INTO admin (nama, username, password, jabatan, foto)
			VALUES ('$nama','$nim','$pass','$jabatan','$fotobaru')");
	  echo '<script language="javascript">swal("Simpan berhasil!", "Data Admin tersimpan", "success").then(() => { window.location="list-admin"; });</script>';
	}
}else{
	$cek = mysqli_num_rows(mysqli_query($connect, "SELECT * FROM admin WHERE username = '$nim'"));
	if ($cek > 0) {
	  echo '<script language="javascript">swal("Simpan gagal!", "Data Admin Sudah Ada!", "warning").then(() => { window.location="list-admin"; });</script>';
	}else{
		mysqli_query($connect, "INSERT INTO admin (nama, username, password, jabatan)
			VALUES ('$nama','$nim','$pass','$jabatan')");
	  echo '<script language="javascript">swal("Simpan berhasil!", "Data Admin tersimpan", "success").then(() => { window.location="list-admin"; });</script>';
	}
}
?>
