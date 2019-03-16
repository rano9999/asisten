<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
	 <meta charset="utf-8">
	 <script type="text/javascript" src="assets/vendor/sweetalert/sweetalert.min.js"></script>
 </head>
</html>
<?php
    include('session-siswa.php');
    unset($_SESSION['nim']);
    session_unset();
    session_destroy();
    echo '<script language="javascript">swal("Logout Sukses!","Anda Telah Logout!","success").then(() => { window.location="masuk"; });</script>';
	exit;
?>
