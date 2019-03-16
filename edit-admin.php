<?php
include("header.php");
$ed=mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM admin WHERE id_admin = '$_POST[id]'"));

?>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title"> <i class="lnr lnr-users"></i> <a href="list-admin">List Administrator (Pengurus)</a> <i class="fa fa-angle-right"></i> <a href="edit-admin">Edit Administrator (Pengurus)</a></h3>
							<p class="panel-subtitle">Halaman untuk mengelola Administrator</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<form class="" enctype="multipart/form-data" action="update-admin.php" method="post">
										<div class="modal-body">
												<div class="form-group">
													<label class="nk-label">NIM</label>
													<input type="hidden" class="form-control" name="id" value="<?= $ed['id_admin'] ?>" placeholder="Enter Email">
													<input type="text" class="form-control" name="nim" value="<?= $ed['username'] ?>" placeholder="Enter Email">
												</div>
												<div class="form-group">
													<label class="nk-label">Nama</label>
													<input type="text" class="form-control" name="nama" value="<?= $ed['nama'] ?>" placeholder="Enter Email">
												</div>
												<div class="form-group">
													<label>Jabatan</label>
													<select class="form-control" name="jabatan">
														<?php if($ed['jabatan'] == 'Ketua'){ ?>
														<option value="Ketua" selected>Ketua</option>
														<option value="Sekretaris">Sekretaris</option>
														<option value="Bendahara">Bendahara</option>
														<?php }elseif($ed['jabatan'] == 'Sekretaris'){ ?>
														<option value="Ketua" >Ketua</option>
														<option value="Sekretaris" selected>Sekretaris</option>
														<option value="Bendahara">Bendahara</option>
													<?php }elseif($ed['jabatan'] == 'Bendahara'){ ?>
														<option value="Ketua" >Ketua</option>
														<option value="Sekretaris">Sekretaris</option>
														<option value="Bendahara" selected>Bendahara</option>
													<?php }else{ ?>
														<option value="Ketua" >Ketua</option>
														<option value="Sekretaris">Sekretaris</option>
														<option value="Bendahara">Bendahara</option>
													<?php } ?>
													</select>
												</div>
												<br>
	                      <div class="form-group">
													<?php if($ed['foto'] == ''){ ?>
														<img src="images/avatar0.jpg" class="img-circle" width="100px" alt="image" />
													<?php }else{ ?>
														<div class="hd-message-img">
															<img src="images/<?= $ed['foto']; ?>" class="img-circle" width="100px" alt="image" />
														</div>
													<?php } ?>
													<img src="images/<?= $ed['foto']; ?>" width="250px" alt=""><br>
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
