<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Mahasiswa | Sisten Penilaian Asisten</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
	<link rel="icon" type="image/png" href="img/logo.png"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="login/css/util.css">
	<link rel="stylesheet" type="text/css" href="login/css/main.css">
<!--===============================================================================================-->
<!-- Load librari/plugin jquery nya -->
<script src="jquery.min.js" type="text/javascript"></script>

<!-- Load File javascript config.js -->
<script src="config.js" type="text/javascript"></script>
</head>
<body>

	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-pic js-tilt" data-tilt>
					<img src="img/logo.png" alt="IMG">
				</div>

				<form class="login100-form validate-form" method="post" action="proses-mahasiswa">
					<span class="login100-form-title">
						Form Penilaian Identitas Mahasiswa
					</span>

					<div class="wrap-input100 validate-input" data-validate = "Login Failed">
						<input class="input100" type="text" name="nim" placeholder="Masukan NIM">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-envelope" aria-hidden="true"></i>
						</span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Login Failed">
						<input class="input100" type="password" name="pass" placeholder="Masukan Password">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div>

					<!-- <div class="wrap-input100 validate-input" data-validate = "Code Acceess is required">
						<input class="input100" type="text" name="kode" placeholder="Masukan Kode Akses Kelas">
						<span class="focus-input100"></span>
						<span class="symbol-input100">
							<i class="fa fa-lock" aria-hidden="true"></i>
						</span>
					</div> -->

          <!-- <div class="wrap-input100 validate-input" data-validate = "Password is required">
            <select name="jurusan" id="jurusan" class="js-example-basic-single js-states form-control">
              <option value="">Pilih Jurusan</option>

              <?php
              // Load file koneksi.php
              include "koneksi.php";

              // Buat query untuk menampilkan semua data siswa
              $sql = mysqli_query($connect, "SELECT * FROM jurusan");

              while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                echo "<option value='".$data['id_jurusan']."'>".$data['nama_jurusan']."</option>";
              }
              ?>
            </select>
					</div>

          <div class="wrap-input100 validate-input" data-validate = "Password is required">
              <select name="kelas" id="kota" class="js-example-basic-single js-states form-control">
                <option value="">Pilih</option>
              </select>
              <div id="loading" style="margin-top: 15px;">
                <img src="loading.gif" width="18"> <small>Loading...</small>
              </div>
          </div> -->

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" type="submit">
							Login
						</button>
					</div>

					<div class="text-center p-t-12">

					</div>
				</form>
			</div>
		</div>
	</div>




<!--===============================================================================================-->
  <script src="config.js"></script>
  <script src="jquery.min.js"></script>
	<script src="login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/bootstrap/js/popper.js"></script>
	<script src="login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="login/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="login/js/main.js"></script>

</body>
</html>
