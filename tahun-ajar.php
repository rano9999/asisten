<?php
include("header.php");
?>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title"> <i class="lnr lnr-cog"></i> Settings <i class="fa fa-angle-right"></i> <a href="tahun_ajar">Tahun Akademik</a> </h3>
							<p class="panel-subtitle">Halaman untuk mengelola Tahun Akademik / periode asisten</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<button type="button" class="btn btn-primary" data-toggle="modal" title="Tambah Tahun Ajar" data-target="#myModalthree" name="button">Tambah Tahun Akademik</button>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-12">
									<!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
									<table class="table table-bordered table-striped table-vcenter js-dataTable-full">
										<thead>
												<tr>
														<th></th>
														<th>Tahun</th>
														<th>Aktifasi</th>
														<th>Semester</th>
														<th width="10px"></th>
														<th width="10px"></th>
														<th width="10px"></th>
												</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											$qy = mysqli_query($connect, "SELECT * FROM tahun_ajar ORDER BY tahun_ajar DESC");
											while($q = mysqli_fetch_array($qy)) { ?>
												<tr>
													<td><?= $no; ?></td>
													<td><?= $q['tahun_ajar']; ?></td>
													<td>
														<form action="aktifasi.php" method="post">
																<input type="hidden" name="id" value="<?= $q['id_tahun']; ?>" />

															<?php if($q['aktif']=="Ya"){ ?>
																<label><input type="radio" class="form-control" name="aktif" id="genderM" value="Ya" checked="" required />&nbsp;Ya</label>&nbsp;&nbsp;&nbsp;
																<label><input type="radio" class="form-control" name="aktif" id="genderF" value="Tidak" required/>&nbsp;Tidak</label>
															<?php }else{ ?>
																<label><input type="radio" class="form-control" name="aktif" id="genderM" value="Ya" required />&nbsp;Ya</label>&nbsp;&nbsp;&nbsp;
																<label><input type="radio" class="form-control" name="aktif" id="genderF" value="Tidak" checked="" required/>&nbsp;Tidak</label>
															<?php } ?>
													</td>
													<td>
															<?php if($q['semester']=="Genap"){ ?>
																<label><input type="radio" class="form-control" name="smt" id="genderM" value="Genap" checked="" required />&nbsp;Genap</label>&nbsp;&nbsp;&nbsp;
																<label><input type="radio" class="form-control" name="smt" id="genderF" value="Ganjil" required/>&nbsp;Ganjil</label>
															<?php }else{ ?>
																<label><input type="radio" class="form-control" name="smt" id="genderM" value="Genap" required />&nbsp;Genap</label>&nbsp;&nbsp;&nbsp;
																<label><input type="radio" class="form-control" name="smt" id="genderF" value="Ganjil" checked="" required/>&nbsp;Ganjil</label>
															<?php } ?>
													</td>
													<td>
																<button class="btn btn-default btn-sm" type="submit">Update</button>
														</form>
													</td>
													<td class="text-center">
														<form class="" action="edit-tahun" method="post">
															<input type="hidden" name="id" value="<?= $q['id_tahun'] ?>">
															<button type="submit" class="btn btn-icons btn-success" data-toggle="tooltip" title="Edit">
																<i class="fa fa-edit"></i>
															</button>
														</form>
													</td>
													<td>
														<form class="" action="hapus-tahun.php" method="post">
															<input type="hidden" name="id" value="<?= $q['id_tahun'] ?>">
															<button type="submit" class="btn btn-icons btn-success" data-toggle="tooltip" title="Hapus">
																<i class="fa fa-trash"></i>
															</button>
														</form>
													</td>
												</tr>
											<?php $no++; } ?>
										</tbody>
									</table>
									<!-- END Dynamic Table Full -->
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

		<div class="modal fade" id="myModalthree" role="dialog">
			<div class="modal-dialog modal-large">
				<!-- PANEL DEFAULT -->
				<div class="panel">
					<div class="panel-heading">
						<h3 class="panel-title">Tambah Tahun Akademik / Periode</h3>
						<div class="right">
							<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
							<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
						</div>
					</div>
					<div class="panel-body">
						<form class="" enctype="multipart/form-data" action="simpan-tahun.php" method="post">
							<div class="modal-body">
									<div class="form-group float-lb">
										<div class="nk-int-st">
												<label class="nk-label">Nama Tahun</label>
												<input type="text" class="form-control" name="nama" placeholder="Masukan Periode / Tahun Ajar">
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
		<?php include('footer.php'); ?>
