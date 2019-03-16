<?php
include("header.php");
?>
<style>
		#loading{
	background: whitesmoke;
	position: absolute;
	top: 140px;
	left: 82px;
	padding: 5px 10px;
	border: 1px solid #ccc;
}
</style>

<script>
$(document).ready(function(){
	// Sembunyikan alert validasi kosong
	$("#kosong").hide();
});
</script>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title"> <i class="lnr lnr-cog"></i> Data Mahasiswa <i class="fa fa-angle-right"></i> <a href="jurusan">import Data Mahasiswa</a> </h3>
							<p class="panel-subtitle"></p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div style="padding: 0 15px;">
									<!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
									<form method="post" action="" enctype="multipart/form-data">
										<a href="Format.xlsx" class="btn btn-default" data-toggle="modal" title="Download Form Excel" data-target="#myModalone" name="button">
											<span class="glyphicon glyphicon-download"></span>
											Download Format
										</a><br><br>

										<!--
										-- Buat sebuah input type file
										-- class pull-left berfungsi agar file input berada di sebelah kiri
										-->
										<input type="file" name="file" class="pull-left">

										<button type="submit" name="preview" class="btn btn-primary btn-sm">
											<span class="glyphicon glyphicon-eye-open"></span> Preview
										</button>
									</form>

									<hr>

									<!-- Buat Preview Data -->
									<?php
									// Jika user telah mengklik tombol Preview
									if(isset($_POST['preview'])){
										//$ip = ; // Ambil IP Address dari User
										$nama_file_baru = 'data.xlsx';

										// Cek apakah terdapat file data.xlsx pada folder tmp
										if(is_file('tmp/'.$nama_file_baru)) // Jika file tersebut ada
											unlink('tmp/'.$nama_file_baru); // Hapus file tersebut

										$tipe_file = $_FILES['file']['type']; // Ambil tipe file yang akan diupload
										$tmp_file = $_FILES['file']['tmp_name'];

										// Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
										if($tipe_file == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"){
											// Upload file yang dipilih ke folder tmp
											// dan rename file tersebut menjadi data{ip_address}.xlsx
											// {ip_address} diganti jadi ip address user yang ada di variabel $ip
											// Contoh nama file setelah di rename : data127.0.0.1.xlsx
											move_uploaded_file($tmp_file, 'tmp/'.$nama_file_baru);

											// Load librari PHPExcel nya
											require_once 'PHPExcel/PHPExcel.php';

											$excelreader = new PHPExcel_Reader_Excel2007();
											$loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file yang tadi diupload ke folder tmp
											$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

											// Buat sebuah tag form untuk proses import data ke database
											echo "<form method='post' action='import.php'>";

											echo "<table class='table table-bordered'>
											<tr>
												<th colspan='5' class='text-center'>Preview Data</th>
											</tr>
											<tr>
												<th>NIM</th>
												<th>Nama</th>
												<th>Password</th>
												<th>Kelas</th>
											</tr>";

											$numrow = 1;
											$kosong = 0;
											foreach($sheet as $row){ // Lakukan perulangan dari data yang ada di excel
												// Ambil data pada excel sesuai Kolom
												$nim = $row['B']; // Ambil data NIS
												$nama = $row['C']; // Ambil data nama
												$pass = $row['D']; // Ambil data jenis kelamin
												$kelas = $row['E']; // Ambil data telepon


												// Cek jika semua data tidak diisi
												if(empty($nim) && empty($nama))
													continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

												// Cek $numrow apakah lebih dari 1
												// Artinya karena baris pertama adalah nama-nama kolom
												// Jadi dilewat saja, tidak usah diimport
												if($numrow > 1){
													// Validasi apakah semua data telah diisi
													$nim_td = ( ! empty($nim))? "" : " style='background: #E07171;'"; // Jika NIS kosong, beri warna merah
													$nama_td = ( ! empty($nama))? "" : " style='background: #E07171;'"; // Jika Nama kosong, beri warna merah
													$pass_td = ( ! empty($pass))? "" : " style='background: #E07171;'"; // Jika Jenis Kelamin kosong, beri warna merah
													$kelas_td = ( ! empty($kelas))? "" : " style='background: #E07171;'"; // Jika Telepon kosong, beri warna merah

													// Jika salah satu data ada yang kosong
													if(empty($nim) && empty($nama) && empty($pass) && empty($kelas)){
														$kosong++; // Tambah 1 variabel $kosong
													}

													echo "<tr>";
													echo "<td".$nim_td.">".$nim."</td>";
													echo "<td".$nama_td.">".$nama."</td>";
													echo "<td".$pass_td.">".$pass."</td>";
													echo "<td".$kelas_td.">".$kelas."</td>";

													echo "</tr>";
												}

												$numrow++; // Tambah 1 setiap kali looping
											}

											echo "</table>";

											// Cek apakah variabel kosong lebih dari 1
											// Jika lebih dari 1, berarti ada data yang masih kosong
											if($kosong > 1){
											?>
												<script>
												$(document).ready(function(){
													// Ubah isi dari tag span dengan id jumlah_kosong dengan isi dari variabel kosong
													$("#jumlah_kosong").html('<?php echo $kosong; ?>');

													$("#kosong").show(); // Munculkan alert validasi kosong
												});
												</script>
											<?php
											}else{ // Jika semua data sudah diisi
												echo "<hr>";

												// Buat sebuah tombol untuk mengimport data ke database
												echo "<button type='submit' name='import' class='btn btn-primary'><span class='glyphicon glyphicon-upload'></span> Import</button>";
											}

											echo "</form>";
										}else{ // Jika file yang diupload bukan File Excel 2007 (.xlsx)
											// Munculkan pesan validasi
											echo "<div class='alert alert-danger'>
											Hanya File Excel 2007 (.xlsx) yang diperbolehkan
											</div>";
										}
									}
									?>
								</div>

							</div>
						</div>
					</div>
					<!-- END OVERVIEW -->
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->

		<div class="modal fade" id="myModalone" role="dialog">
			<div class="modal-dialog modal-large">
				<!-- PANEL DEFAULT -->
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Download Form Excel</h3>
						<div class="right">
							<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
							<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
						</div>
					</div>
					<div class="panel-body">
						<form class="" enctype="multipart/form-data" action="proses.php" method="get">
							<div class="modal-body">
									<div class="form-group float-lb">
										<div class="nk-int-st">
												<label class="nk-label">Pilih Kelas</label>
												<select class="form-control" name="id">
													<option value="">Pilih</option>
													<?php
													$qy_k = mysqli_query($connect, "SELECT * FROM kelas ORDER BY nama_kelas ASC");
													while ($k = mysqli_fetch_array($qy_k)) { ?>
														<option value="<?= $k['id_kelas'] ?>"><?= $k['nama_kelas'] ?></option>
													<?php } ?>
												</select>
										</div>

									</div>
							</div>
							<div class="modal-footer">
									<button type="submit" class="btn btn-default">Save changes</button>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</form>

					</div>
				</div>
				<!-- END PANEL DEFAULT -->
			</div>
		</div>

		<script>
		$(document).ready(function(){
			// Sembunyikan alert validasi kosong
			$("#kosong").hide();
		});
		</script>
		<?php include('footer.php'); ?>
