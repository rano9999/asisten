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
$nim = antiinjection($_POST['nim']);
$nama = antiinjection($_POST['nama']);
$jabatan = antiinjection($_POST['jabatan']);

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
			echo '<script language="javascript">swal("Simpan gagal!", "File bukan gambar", "warning").then(() => { window.location="kelola-pegawai"; });</script>';
				$uploadOk = 0;
		}

		// Check file size
		if ($_FILES["foto"]["size"] > 2000000) {
			echo '<script language="javascript">swal("Simpan gagal!", "Gambar tidak boleh lebih dari 2MB", "warning").then(() => { window.location="kelola-pegawai"; });</script>';
				$uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
			echo '<script language="javascript">swal("Simpan gagal!", "Gambar hanya boleh berupa JPG, PNG atau JPEG", "warning").then(() => { window.location="kelola-pegawai"; });</script>';
				$uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
			echo '<script language="javascript">swal("Simpan gagal!", "Foto gagal diupload!", "warning").then(() => { window.location="kelola-pegawai"; });</script>';
		// if everything is ok, try to upload file
		} else {
				if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) {
				} else {
					echo '<script language="javascript">swal("Simpan gagal!", "Foto gagal diupload!", "warning").then(() => { window.location="kelola-pegawai"; });</script>';
				}
		}
	}

		$data = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM admin WHERE id_admin='$id'"));
		if(is_file("images/faces/".$data['foto']))
		unlink("images/faces/".$data['foto']);

		mysqli_query($connect, "UPDATE admin SET
			nama = '$nama',
			username = '$nim',
			foto = '$fotobaru',
			jabatan = '$jabatan' WHERE id_admin = '$id'");
		echo '<script language="javascript">swal("Update berhasil!", "Data User terupdate", "success").then(() => { window.location="list-admin"; });</script>';

}else{

	mysqli_query($connect, "UPDATE admin SET
		nama = '$nama',
		username = '$nim',
		jabatan = '$jabatan' WHERE id_admin = '$id'");
	echo '<script language="javascript">swal("Update berhasil!", "Data User terupdate", "success").then(() => { window.location="list-admin"; });</script>';

}
?>
