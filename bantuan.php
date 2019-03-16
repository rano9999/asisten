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
							<h3 class="panel-title"> <i class="lnr lnr-cog"></i> Settings <i class="fa fa-angle-right"></i> <a href="kelas">Bantuan</a> </h3>
							<p class="panel-subtitle">Halaman untuk mengelola pengertian Kriteria fitur aplikasi</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<button type="button" class="btn btn-primary" data-toggle="modal" title="Tambah Kelas" data-target="#myModalthree" name="button">Tambah Bantuan</button>
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-md-12">
									<!-- DataTables init on table by adding .js-dataTable-full class, functionality initialized in js/pages/be_tables_datatables.js -->
									<table id="" class="table display table-bordered" style="width:100%">
										<thead>
												<tr>
														<th></th>
														<th width="160px">Nama Fitur</th>
														<th>Keterangan</th>
														<th class="text-center" width="100px"></th>
														<th class="text-center" width="100px"></th>
												</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											$qy = mysqli_query($connect, "SELECT * FROM bantuan ORDER BY id DESC");
											while($q = mysqli_fetch_array($qy)) { ?>
												<tr>
													<td><?= $no; ?></td>
													<td><?= $q['nama']; ?></td>
													<td><?= $q['keterangan']; ?></td>
													<td class="text-center">
														<form class="" action="edit-bantuan" method="post">
															<input type="hidden" name="id" value="<?= $q['id'] ?>">
															<button type="submit" class="btn btn-icons btn-success" data-toggle="tooltip" title="Edit">
																<i class="fa fa-edit"></i>
															</button>
														</form>
													</td>
													<td class="text-center">
														<form class="" action="hapus-bantuan.php" method="post">
															<input type="hidden" name="id" value="<?= $q['id'] ?>">
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
						<h3 class="panel-title">Tambah Bantuan</h3>
						<div class="right">
							<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
							<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
						</div>
					</div>
					<div class="panel-body">
						<form class="" enctype="multipart/form-data" action="simpan-bantuan.php" method="post">
							<div class="modal-body">
								<div class="form-group">
									<label class="nk-label">Nama Fitur</label>
									<input type="text" class="form-control" name="nama" placeholder="Masukan Nama Kelas">
								</div>
								<div class="form-group">
									<label class="nk-label">Keterangan</label>
									<textarea class="form-control" name="ket" placeholder="Masukan Keterangan" rows="6"></textarea>
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
