<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<script src="js/sweetalert2/es6-promise.auto.min.js"></script>
		<script src="js/sweetalert2/sweetalert2.min.js"></script>
		<link rel="stylesheet" href="js/sweetalert2/sweetalert2.min.css">
	</head>
</html>
<?php
if(empty($_SESSION['username'])) {
	echo '<script language="javascript">swal("Akses ditolak!","","error").then(() => { window.location="masuk"; });</script>';
	exit;
}
?>
