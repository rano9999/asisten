<?php
include("header.php");
$qy = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM asisten WHERE nim_asisten = '$_POST[id]'"));
?>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title"> <i class="lnr lnr-users"></i> <a href="asisten">Asisten</a> <i class="fa fa-angle-right"></i> <a href="edit-asisten">Edit Asisten</a> </h3>
							<p class="panel-subtitle">Halaman untuk mengelola Asisten</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<form class="" enctype="multipart/form-data" action="update-asisten.php" method="post">
										<div class="modal-body">
											<div class="form-group">
												<label class="nk-label">NIM Mahasiswa</label>
												<input type="hidden" class="form-control" name="nim_lama" value="<?= $qy['nim_asisten'] ?>" placeholder="NIM Asisten">
												<input type="text" class="form-control input-sm" name="nim" value="<?= $qy['nim_asisten'] ?>" placeholder="Nama" required>
											</div>
											<div class="form-group">
												<label class="nk-label">Nama Mahasiswa</label>
												<input type="text" class="form-control" name="nama" value="<?= $qy['nama_asisten'] ?>" placeholder="Masukan Jurusan">
											</div>
											<div class="form-group">
												<label>Kelas Mahasiswa</label>
                        <h6 style="font-size:13px">Terpilih : <?= $qy['kelas_asisten'] ?></h6>
												<select class="form-control" name="kelas">
													<option value="">Pilih</option>
													<?php $query = mysqli_query($connect, "SELECT * FROM kelas");
													while($m = mysqli_fetch_array($query)){ ?>
													<option value="<?= $m['nama_kelas'] ?>"><?= $m['nama_kelas'] ?></option>
													<?php } ?>
												</select>
											</div>
											<div class="form-group">
												<label class="nk-label">Jenis Kelamin</label>
												<select class="form-control" name="jk">
												<?php if($qy['jk'] == 'Laki-laki'){ ?>
													<option value="Laki-laki" selected>Laki-laki</option>
													<option value="Perempuan">Perempuan</option>
												<?php }else{ ?>
													<option value="Laki-laki">Laki-laki</option>
													<option value="Perempuan" selected>Perempuan</option>
												<?php } ?>
												</select>
											</div>
											<div class="form-group">
												<label class="nk-label">Nomor Telepon</label>
												<input type="text" class="form-control" name="telp" value="<?= $qy['telp'] ?>" placeholder="Masukan Nomor Telepon">
											</div>
											<br>
											<div class="form-group">
												<?php if($qy['foto'] == ''){ ?>
													<img src="images/avatar0.jpg" class="img-circle" width="100px" alt="image" />
												<?php }else{ ?>
													<div class="hd-message-img">
														<img src="images/<?= $qy['foto']; ?>" class="img-circle" width="100px" alt="image" />
													</div>
												<?php } ?>
												<img src="images/<?= $qy['foto']; ?>" width="250px" alt=""><br>
												<label class="fancy-checkbox">
												<input type="checkbox"  id="toggle1" name="ubah_foto" hidden="hidden">
												<span>Tambah Foto</span>
												</label>
											</div>
											<div class="nk-int-st">
													<input type="file" accept="image/*" name="foto" class="form-control" id="foto" required disabled>
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
