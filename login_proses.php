<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
 <head>
	 <meta charset="utf-8">
	 <script type="text/javascript" src="assets/vendor/sweetalert/sweetalert.min.js"></script>
 </head>
</html>


<?php

include('koneksi.php');

function antiinjection($data){
	$filter_sql = stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES)));
  	return $filter_sql;
}

$uname = antiinjection($_POST['username']);
$pass = antiinjection($_POST['password']);
$salt ='vieyama';
$hash = md5($salt.$pass);


$sql=mysqli_query($connect, "SELECT * FROM admin WHERE username='$uname' AND password='$hash'");
$r=mysqli_fetch_array($sql);

if ($r['username']==$uname and $r['password']==$hash){

$_SESSION['username']=$r['username'];
$_SESSION['password']=$r['password'];

echo '<script language="javascript">swal("Login berhasil!", "Silahkan Masuk!", "success").then(() => { window.location="dashboard-admin"; });</script>';

}else{
echo '<script language="javascript">swal("Login Gagal!", " Silahkan cek lagi username dan password anda!", "error").then(() => { window.location="masuk-admin"; });</script>';
}

?>
