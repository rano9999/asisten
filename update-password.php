<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
	 <meta charset="utf-8">
	 <script type="text/javascript" src="assets/vendor/sweetalert/sweetalert.min.js"></script>
 </head>
</html>
<?php
include "koneksi.php";

	/*--------------------------------------------------------------------------*/


		/*---------------------------- ANTI XSS & SQL INJECTION -------------------------------*/
		function antiinjection($data){
			$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
			return $filter_sql;
		}

        $nip = antiinjection($_POST['email']);
        $password_lama			= antiinjection($_POST['pass_lama']);
    		$password_baru			= antiinjection($_POST['pass_baru']);
    		$konfirmasi_password	= antiinjection($_POST['konfirmasi_pass']);

				$salt ='vieyama';
        $hash = md5($salt.$password_lama);
				$hash_baru = md5($salt.$password_baru);

				$cek_user=mysqli_num_rows(mysqli_query($connect, "SELECT * FROM admin WHERE username = '$nip' AND password = '$hash'"));
					if ($cek_user > 0) {
						  if ($password_baru == $konfirmasi_password) {
	                mysqli_query($connect, "UPDATE `admin` SET
	                `password`='$hash_baru' WHERE `username` = '$nip'");
	                echo '<script language="javascript">swal("", "Password berhasil dirubah!", "success").then(() => { window.location="dashboard-admin"; });</script>';
	  					}else{
	                echo '<script language="javascript">swal("", "Password tidak cocok!", "error").then(() => { window.history.back(); });</script>';
	            }
					} else {
            echo '<script language="javascript">swal("", "Password tidak ditemukan!", "error").then(() => { window.history.back(); });</script>';
				}
?>
