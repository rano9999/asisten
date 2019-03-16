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


	 $qy = mysqli_query($connect, "DELETE FROM matkul WHERE id_matkul = '$id'");
			if($qy){
			    echo '<script language="javascript">swal("Hapus berhasil!", "Data Matkul Terhapus!", "success").then(() => { window.history.back(); });</script>';
			}else{
					echo '<script language="javascript">swal("Hapus Gagal!", "Data Matkul Gagal Terhapus!", "error").then(() => { window.history.back(); });</script>';
			}

?>
