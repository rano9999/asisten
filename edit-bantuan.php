<?php
include("header.php");
$qy = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM bantuan WHERE id = '$_POST[id]'"));
?>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title"> <i class="lnr lnr-cog"></i> Settings <i class="fa fa-angle-right"></i> <a href="kelas">Bantuan</a> </h3>
							<p class="panel-subtitle">Halaman untuk mengelola pengertian Kriteria fitur aplikasi</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<form class="" enctype="multipart/form-data" action="update-bantuan.php" method="post">
										<div class="modal-body">
												<div class="form-group">
													<label class="nk-label">Nama Fitur</label>
													<input type="hidden" class="form-control" name="id" value="<?= $qy['id'] ?>" required>
													<input type="text" class="form-control" name="nama" value="<?= $qy['nama'] ?>" placeholder="Nama" required>
												</div>

												<div class="form-group">
													<label class="nk-label">Keterangan</label>
													<textarea name="ket" class="form-control" rows="8" cols="80" ><?= $qy['keterangan'] ?></textarea>
												</div>

										</div>
										<div class="modal-footer">
												<button type="submit" class="btn btn-default">Save changes</button>
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
