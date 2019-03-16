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
							<h3 class="panel-title"> <i class="lnr lnr-cog"></i> Settings <i class="fa fa-angle-right"></i> <a href="jurusan">Data Mahasiswa</a> </h3>
							<p class="panel-subtitle">Halaman untuk mengelola data Mahasiswa</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<button type="button" class="btn btn-primary" title="Import Data From Excel" onclick="window.location='form-mahasiswa'" name="button">Import Data From Excel</button>
									<button type="button" class="btn btn-primary" data-toggle="modal" title="Tambah Mahasiswa" data-target="#myModalthree" name="button">Tambah Mahasiswa</button>
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
														<th>NIM Mahasiswa</th>
														<th>Nama Mahasiswa</th>
														<th>Password</th>
														<th>Kelas</th>
														<th width="10px"></th>
												</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											$qy = mysqli_query($connect, "SELECT * FROM mahasiswa, kelas where mahasiswa.kelas_mhs = kelas.id_kelas");
											while($q = mysqli_fetch_array($qy)) { ?>
												<tr>
													<td width="30px"><?= $no; ?></td>
													<td><?= $q['nim']; ?></td>
													<td><?= $q['nama_mhs']; ?></td>
													<td><?= $q['password']; ?></td>
													<td><?= $q['nama_kelas']; ?></td>
													<td>
														<form class="" action="hapus-mahasiswa.php" method="post">
															<input type="hidden" name="id" value="<?= $q['nim'] ?>">
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
						<h3 class="panel-title">Tambah Mahasiswa</h3>
						<div class="right">
							<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
							<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
						</div>
					</div>
					<div class="panel-body">
						<form class="" enctype="multipart/form-data" action="simpan-mahasiswa.php" method="post">
							<div class="modal-body">
									<div class="form-group float-lb">
										<div class="nk-int-st">
												<label class="nk-label">NIM Mahasiswa</label>
												<input type="text" class="form-control" name="nim" placeholder="Masukan NIM">
										</div>
									</div>
									<div class="form-group float-lb">
										<div class="nk-int-st">
												<label class="nk-label">Nama Mahasiswa</label>
												<input type="text" class="form-control" name="nama" placeholder="Masukan Nama">
										</div>
									</div>
									<div class="form-group float-lb">
										<div class="nk-int-st">
												<label class="nk-label">Password</label>
												<input type="text" class="form-control" name="password" value="<?= randomString() ?>" readonly>
										</div>
									</div>
									<div class="form-group float-lb">
										<div class="nk-int-st">
												<label class="nk-label">Pilih Kelas</label>
												<select class="form-control" name="kelas">
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
									<button type="submit" class="btn btn-default">Save</button>
									<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
							</div>
						</form>
					</div>
				</div>
				<!-- END PANEL DEFAULT -->
			</div>
		</div>
		
		<?php include('footer.php'); ?>
