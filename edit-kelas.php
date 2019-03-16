<?php
include("header.php");
$qy = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM kelas, jurusan WHERE kelas.jurusan = jurusan.id_jurusan AND kelas.id_kelas = '$_POST[id]'"));
?>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title"> <i class="lnr lnr-cog"></i> Settings <i class="fa fa-angle-right"></i> <a href="kelas">Kelas</a> <i class="fa fa-angle-right"></i> <a href="edit-kelas">Edit Kelas</a> </h3>
							<p class="panel-subtitle">Halaman untuk mengelola kelas</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<form class="" enctype="multipart/form-data" action="update-kelas.php" method="post">
										<div class="modal-body">
												<div class="form-group">
													<label class="nk-label">Nama Kelas</label>
													<input type="hidden" class="form-control" name="id" value="<?= $qy['id_kelas'] ?>" required>
													<input type="text" class="form-control" name="nama" value="<?= $qy['nama_kelas'] ?>" placeholder="Nama" required>
												</div>
												<div class="form-group">
	                        Jurusan Terpilih : <?= $qy['nama_jurusan'] ?>
													<select class="form-control" name="jurusan" required>
														<option value="<?= $qy['id_jurusan'] ?>"><?= $qy['nama_jurusan'] ?></option>
														<option>Pilih</option>
														<?php $query = mysqli_query($connect, "SELECT * FROM jurusan");
														while($m = mysqli_fetch_array($query)){ ?>
														<option value="<?= $m['id_jurusan'] ?>"><?= $m['nama_jurusan'] ?></option>
														<?php } ?>
													</select>
												</div>
												<?php if($qy['kode_akses'] == ''){ ?>
												<div class="form-group">
														<label class="nk-label">Kode Akses </label>
														<input type="text" class="form-control" name="kode" value="<?= randomString(); ?>" readonly>
												</div>
												<?php }else{ ?>
												<div class="form-group">
														<label class="nk-label">Kode Akses </label>
														<input type="text" class="form-control" name="kode" value="<?= $qy['kode_akses']; ?>" readonly>
												</div>
												<?php } ?>
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
