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
							<h3 class="panel-title"> <i class="lnr lnr-users"></i> Asisten Praktikum </h3>
							<p class="panel-subtitle">Halaman untuk mengelola Asisten Praktikum</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<button type="button" class="btn btn-primary" data-toggle="modal" title="Tambah Asisten" data-target="#myModalthree" name="button">Tambah Asisten Praktikum</button>
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
														<th>NIM</th>
														<th>Nama Asisten</th>
														<th width="20px">Kelas Asisten</th>
														<th width="20px">Jenis Kelamin</th>
														<th>Telepon</th>
														<th width="30px">Foto</th>
														<th width="10px"></th>
														<th width="10px"></th>
												</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											$qy = mysqli_query($connect, "SELECT * FROM asisten ORDER BY nim_asisten DESC");
											while($q = mysqli_fetch_array($qy)) { ?>
												<tr>
													<td><?= $no; ?></td>
													<td><?= $q['nim_asisten']; ?></td>
													<td><?= $q['nama_asisten']; ?></td>
													<td><?= $q['kelas_asisten']; ?></td>
													<td><?= $q['jk']; ?></td>
													<td><?= $q['telp']; ?></td>
													<?php if($q['foto'] == ''){ ?>
													<td class="py-1">
														<img src="images/avatar0.jpg" class="img-circle" width="100px" alt="image" />
													</td>
													<?php }else{ ?>
													<td>
														<div class="hd-message-img">
															<img src="images/<?= $q['foto']; ?>" class="img-circle" width="100px" alt="image" />
														</div>
													</td>
													<?php } ?>
													<td class="text-center">
														<form class="" action="edit-asisten" method="post">
															<input type="hidden" name="id" value="<?= $q['nim_asisten'] ?>">
															<button type="submit" class="btn btn-icons btn-success" data-toggle="tooltip" title="Edit">
																<i class="fa fa-edit"></i>
															</button>
														</form>
													</td>
													<td>
														<form class="" action="hapus-asisten.php" method="post">
															<input type="hidden" name="id" value="<?= $q['nim_asisten'] ?>">
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
						<h3 class="panel-title">Tambah Asisten</h3>
						<div class="right">
							<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
							<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
						</div>
					</div>
					<div class="panel-body">
						<form class="" enctype="multipart/form-data" action="simpan-asisten.php" method="post">
							<div class="modal-body">
									<div class="form-group">
										<label class="nk-label">NIM Mahasiswa</label>
										<input type="text" class="form-control" name="nim" placeholder="Masukan Jurusan">
									</div>
									<div class="form-group">
										<label class="nk-label">Nama Mahasiswa</label>
										<input type="text" class="form-control" name="nama" placeholder="Masukan Jurusan">
									</div>
									<div class="form-group">
										<label class="nk-label">Kelas Mahasiswa</label>
										<select class="form-control" name="kelas">
											<?php $query = mysqli_query($connect, "SELECT * FROM kelas");
											while($m = mysqli_fetch_array($query)){ ?>
											<option value="<?= $m['nama_kelas'] ?>"><?= $m['nama_kelas'] ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label class="nk-label">Jenis Kelamin</label>
										<select class="form-control" name="jk">
											<option value="Laki-laki">Laki-laki</option>
											<option value="Perempuan">Perempuan</option>
										</select>
									</div>
									<div class="form-group">
										<label class="nk-label">Nomor Telepon</label>
										<input type="text" class="form-control" name="telp" placeholder="Masukan Nomor Telepon">
									</div>
									<div class="form-group">
										<label class="nk-label">Foto</label>

										<label class="fancy-checkbox">
										<input type="checkbox"  id="toggle1" name="ubah_foto" hidden="hidden">
										<span>Tambah Foto</span>
										</label>

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
				<!-- END PANEL DEFAULT -->
			</div>
		</div>
		<?php include('footer.php'); ?>
