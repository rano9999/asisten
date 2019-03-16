<?php
include("header.php");
$qy = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM asisten_kelas
  JOIN asisten ON asisten_kelas.id_asisten = asisten.nim_asisten
  JOIN kelas ON asisten_kelas.id_kelas_asisten = kelas.id_kelas
  JOIN matkul ON asisten_kelas.id_matkul_asisten = matkul.id_matkul
  JOIN jurusan ON asisten_kelas.id_jurusan = jurusan.id_jurusan
  Join tahun_ajar ON asisten_kelas.id_tahun = tahun_ajar.id_tahun WHERE id_asisten_kelas = '$_POST[id]'"));

?>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title"> <i class="lnr lnr-users"></i><a href="asisten-kelas"> Asisten Kelas </a> <i class="fa fa-angle-right"></i> <a href="edit-asisten-kelas">Edit Asisten Kelas</a> </h3>
							<p class="panel-subtitle">Halaman untuk mengelola Asisten kelas</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<form class="" enctype="multipart/form-data" action="update-asisten-kelas.php" method="post">
										<div class="modal-body">
											<div class="form-group">
												<label class="nk-label">Pilih Asisten</label>
												<h5>Terpilih : <?= $qy['nama_asisten'] ?></h5>
												<input type="hidden" name="id" value="<?= $qy['id_asisten_kelas'] ?>">
												<select class="form-control" name="asisten" required>
													<?php $query = mysqli_query($connect, "SELECT * FROM asisten");
													while($m = mysqli_fetch_array($query)){ ?>
													<option value="<?= $m['nim_asisten'] ?>"><?= $m['nama_asisten'] ?></option>
													<?php } ?>
												</select>
												<br>
												<div class="form-group">
													<label class="nk-label">Pilih Kelas</label>
													<h5>Terpilih : <?= $qy['nama_kelas'] ?></h5>
													<select class="form-control" name="kelas" required>
														<?php $query = mysqli_query($connect, "SELECT * FROM kelas");
	                          while($m = mysqli_fetch_array($query)){ ?>
	                          <option value="<?= $m['id_kelas'] ?>"><?= $m['nama_kelas'] ?></option>
	                          <?php } ?>
													</select>
												</div>
												<br>
												<div class="form-group">
													<label class="nk-label">Pilih Matkul</label>
													<h5>Terpilih : <?= $qy['nama_matkul'] ?></h5>
													<select class="form-control" name="matkul" required>
														<?php $query = mysqli_query($connect, "SELECT * FROM matkul");
	                          while($m = mysqli_fetch_array($query)){ ?>
														<option value="<?= $m['id_matkul'] ?>"><?= $m['nama_matkul'] ?></option>
	                          <?php } ?>
													</select>
												</div>
												<br>
												<div class="form-group">
													<label class="nk-label">Pilih Jurusan</label>
													<h5>Terpilih : <?= $qy['nama_jurusan'] ?></h5>
													<select class="form-control" name="jurusan" required>
														<?php $query = mysqli_query($connect, "SELECT * FROM jurusan");
	                          while($m = mysqli_fetch_array($query)){ ?>
	                          <option value="<?= $m['id_jurusan'] ?>"><?= $m['nama_jurusan'] ?></option>
	                          <?php } ?>
													</select>
												</div>
												<br>
												<div class="form-group">
													<label class="nk-label">Pilih Tahun Ajaran</label>
													<h5>Terpilih : <?= $qy['tahun_ajar'] ?></h5>
													<select class="form-control" name="tahun" required>
														<?php $query = mysqli_query($connect, "SELECT * FROM tahun_ajar");
	                          while($m = mysqli_fetch_array($query)){ ?>
	                          <option value="<?= $m['id_tahun'] ?>"><?= $m['tahun_ajar'] ?></option>
	                          <?php } ?>
													</select>
												</div>
												<br>
												<div class="form-group">
													<label class="nk-label">Pilih Semester</label>
													<h5>Terpilih : <?= $qy['smt'] ?></h5>
													<select class="form-control" name="smt" required>
														<?php if($qy['smt']=='Genap'){ ?>
	                            <option value="Genap" selected>Genap</option>
	                            <option value="Ganjil">Ganjil</option>
	                          <?php }else{ ?>
	                            <option value="Genap">Genap</option>
	                            <option value="Ganjil" selected>Ganjil</option>
	                          <?php } ?>
													</select>
												</div>
										</div>
										<div class="modal-footer">
												<button type="submit" class="btn btn-default">Save changes</button>
												<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
										</div>
									</form>
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

		<?php include('footer.php'); ?>
