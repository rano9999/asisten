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

$data = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM admin WHERE id_admin='$id'"));

if(is_file("images/".$data['foto']))
	 unlink("images/".$data['foto']);

	 $qy = mysqli_query($connect, "DELETE FROM admin WHERE id_admin = '$id'");
			if($qy){
			    echo '<script language="javascript">swal("Hapus berhasil!", "Data User Terhapus!", "success").then(() => { window.history.back(); });</script>';
			}else{
					echo '<script language="javascript">swal("Hapus Gagal!", "Data User Gagal Terhapus!", "error").then(() => { window.history.back(); });</script>';
			}

?>
