<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
	 <meta charset="utf-8">
	 <script type="text/javascript" src="assets/vendor/sweetalert/sweetalert.min.js"></script>
 </head>
</html>
<?php
if(empty($_SESSION['nim']) AND empty($_SESSION['nama']) AND empty($_SESSION['kode'])) {
	echo '<script language="javascript">swal("Akses ditolak!","","error").then(() => { window.location="masuk"; });</script>';
	exit;
}
?>
