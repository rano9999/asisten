<?php
session_start();
include 'koneksi.php';
include 'session.php';
$qy_user = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM admin WHERE username = '$_SESSION[username]'"));
?>
<!doctype html>
<html lang="en" class="fullscreen-bg">

<head>
	<title>Ubah Password || Administrator Sistem Penilaian Asisten</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
	<!-- VENDOR CSS -->
	<link rel="stylesheet" href="assets/vendor/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/vendor/font-awesome/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/vendor/linearicons/style.css">
	<!-- MAIN CSS -->
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- FOR DEMO PURPOSES ONLY. You should remove this in your project -->
	<!-- <link rel="stylesheet" href="assets/css/demo.css"> -->
	<!-- GOOGLE FONTS -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700" rel="stylesheet">
	<!-- ICONS -->
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
</head>

<body>
	<!-- WRAPPER -->
	<div id="wrapper">
		<div class="vertical-align-wrap">
			<div class="vertical-align-middle">
				<div class="auth-box lockscreen clearfix">
					<div class="content">
						<div class="logo text-center">
              <img src="img/logo-baru.png" width="150px" alt="Klorofil Logo">
            </div>
						<div class="user text-center">
              <?php if($qy_user['foto'] == ''){ ?>
              <img src="images/avatar0.jpg" class="img-circle" width="70px" alt="Avatar">
              <?php }else{ ?>
              <img src="images/<?= $qy_user['foto']; ?>" class="img-circle" width="70px" alt="Avatar">
              <?php } ?>
              <h2 class="name"><?= $qy_user['nama']; ?></h2>
						</div>
						<form action="update-password.php" method="post">
							<div class="form-group">
								<input type="text" class="form-control" placeholder="Masukan Username" name="email">
                <input type="password" class="form-control" placeholder="Masukan Password Lama" name="pass_lama">
                <input type="password" class="form-control" placeholder="Masukan Password Baru" id="pass1" name="pass_baru">
                <input type="password" class="form-control" placeholder="Masukan Kembali Password Baru" id="pass2" name="konfirmasi_pass" onkeyup="checkPass(); return false;" required>
                <span id="confirmMessage" class="confirmMessage"></span>
              </div>
              <button type="submit" class="btn btn-primary" name="button">Simpan</button>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- END WRAPPER -->
</body>

</html>
<script type="text/javascript">
function checkPass()
{
  //Store the password field objects into variables ...
  var pass1 = document.getElementById('pass1');
  var pass2 = document.getElementById('pass2');
  //Store the Confimation Message Object ...
  var message = document.getElementById('confirmMessage');
  //Set the colors we will be using ...
  var goodColor = "#42a5f5";
  var badColor = "#ff6666";
  //Compare the values in the password field
  //and the confirmation field
  if(pass2.value == ""){
    message.innerHTML = ""
  }else if(pass1.value == pass2.value){
      //The passwords match.
      //Set the color to the good color and inform
      //the user that they have entered the correct password
      pass2.style.backgroundColor = goodColor;
      message.style.color = goodColor;
      message.innerHTML = "Password Cocok!"
  }else{
      //The passwords do not match.
      //Set the color to the bad color and
      //notify the user.
      pass2.style.backgroundColor = badColor;
      message.style.color = badColor;
      message.innerHTML = "Password Tidak Cocok!"
  }
}
</script>
