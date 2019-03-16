<?php
include("header.php");
$qy = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM jurusan WHERE id_jurusan = '$_POST[id]'"));
?>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title"> <i class="lnr lnr-cog"></i> Settings <i class="fa fa-angle-right"></i> <a href="jurusan">Prodi</a> <i class="fa fa-angle-right"></i> <a href="edit-jurusan">Edit Prodi</a> </h3>
							<p class="panel-subtitle">Halaman untuk mengelola Prodi</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<form class="" enctype="multipart/form-data" action="update-jurusan.php" method="post">
										<div class="modal-body">
												<div class="form-group float-lb">
													<div class="nk-int-st">
															<label class="nk-label">Nama Prodi</label>
															<input type="hidden" class="form-control" name="id" value="<?= $qy['id_jurusan'] ?>" required>
															<input type="text" class="form-control" name="nama" value="<?= $qy['nama_jurusan'] ?>" placeholder="Nama" required>
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
						</div>
					</div>
					<!-- END OVERVIEW -->
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->

		<?php include('footer.php'); ?>
