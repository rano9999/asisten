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
   $aktif = antiinjection($_POST['aktif']);
	 $smt = antiinjection($_POST['smt']);


	 $qy = mysqli_query($connect, "UPDATE tahun_ajar SET aktif = '$aktif', semester = '$smt' WHERE id_tahun = '$id'");
			if($qy){
			    echo '<script language="javascript">swal("", "Aktifasi berhasil!", "success").then(() => { window.history.back(); });</script>';
			}else{
					echo '<script language="javascript">swal("", "Aktifasi Gagal!", "error").then(() => { window.history.back(); });</script>';
			}

?>
