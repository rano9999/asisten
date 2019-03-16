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
							<h3 class="panel-title"> <i class="lnr lnr-users"></i> Asisten Praktikum Kelas</h3>
							<p class="panel-subtitle">Halaman untuk mengelola Asisten Praktikum Kelas</p>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-md-12">
									<button type="button" class="btn btn-primary" data-toggle="modal" title="Tambah Asisten Kelas" data-target="#myModalthree" name="button">Tambah Asisten Praktikum Kelas</button>
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
													<th width="150px">Nama Asisten</th>
													<th width="50px">Kelas Asisten</th>
													<th>Matkul Asisten</th>
													<th>Program Studi</th>
													<th width="50px">Tahun Akademik</th>
													<th width="50px">Semester</th>
													<th width="10px"></th>
													<th width="10px"></th>
												</tr>
										</thead>
										<tbody>
											<?php
											$no = 1;
											$qy = mysqli_query($connect, "SELECT * FROM asisten_kelas
												JOIN asisten ON asisten_kelas.id_asisten = asisten.nim_asisten
												JOIN kelas ON asisten_kelas.id_kelas_asisten = kelas.id_kelas
												JOIN matkul ON asisten_kelas.id_matkul_asisten = matkul.id_matkul
												JOIN jurusan ON asisten_kelas.id_jurusan = jurusan.id_jurusan
												Join tahun_ajar ON asisten_kelas.id_tahun = tahun_ajar.id_tahun
												ORDER BY asisten_kelas.id_kelas_asisten ASC");
											while($q = mysqli_fetch_array($qy)) { ?>
												<tr>
													<td><?= $no; ?></td>
													<td><?= $q['nim_asisten']; ?></td>
													<td><?= $q['nama_asisten']; ?></td>
													<td><?= $q['nama_kelas']; ?></td>
													<td><?= $q['nama_matkul']; ?></td>
													<td><?= $q['nama_jurusan']; ?></td>
													<td><?= $q['tahun_ajar']; ?></td>
													<td><?= $q['smt']; ?></td>
													<td class="text-center">
														<form class="" action="edit-asisten-kelas" method="post">
															<input type="hidden" name="id" value="<?= $q['id_asisten_kelas'] ?>">
															<button type="submit" class="btn btn-icons btn-success" data-toggle="tooltip" title="Edit">
																<i class="fa fa-edit"></i>
															</button>
														</form>
													</td>
													<td>
														<form class="" action="hapus-asisten-kelas.php" method="post">
															<input type="hidden" name="id" value="<?= $q['id_asisten_kelas'] ?>">
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
						<h3 class="panel-title">Tambah Asisten Kelas</h3>
						<div class="right">
							<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
							<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
						</div>
					</div>
					<div class="panel-body">
						<form class="" enctype="multipart/form-data" action="simpan-asisten-kelas.php" method="post">
							<div class="modal-body">
									<div class="form-group">
										<label class="nk-label">Nama Asisten</label>
										<select class="form-control" name="asisten">
											<?php $query = mysqli_query($connect, "SELECT * FROM asisten");
											while($m = mysqli_fetch_array($query)){ ?>
											<option value="<?= $m['nim_asisten'] ?>"><?= $m['nama_asisten'] ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label class="nk-label">Kelas Asisten</label>
										<select class="form-control" name="kelas">
											<?php $query = mysqli_query($connect, "SELECT * FROM kelas");
											while($m = mysqli_fetch_array($query)){ ?>
											<option value="<?= $m['id_kelas'] ?>"><?= $m['nama_kelas'] ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label class="nk-label">Mata Kuliah</label>
										<select class="form-control" name="matkul">
											<?php $query = mysqli_query($connect, "SELECT * FROM matkul");
											while($m = mysqli_fetch_array($query)){ ?>
											<option value="<?= $m['id_matkul'] ?>"><?= $m['nama_matkul'] ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label class="nk-label">Program Studi</label>
										<select class="form-control" name="jurusan">
											<?php $query = mysqli_query($connect, "SELECT * FROM jurusan");
											while($m = mysqli_fetch_array($query)){ ?>
											<option value="<?= $m['id_jurusan'] ?>"><?= $m['nama_jurusan'] ?></option>
											<?php } ?>
										</select>
									</div>
									<div class="form-group">
										<label class="nk-label">Tahun Akademik</label>
										<select class="form-control" name="tahun" >
											<?php $query = mysqli_query($connect, "SELECT * FROM tahun_ajar where aktif = 'Ya'");
											$m = mysqli_fetch_array($query); ?>
											<option value="<?= $m['id_tahun'] ?>"><?= $m['tahun_ajar'] ?></option>
										</select>
									</div>
									<div class="form-group">
										<label class="nk-label">Semester</label>
										<select class="form-control" name="smt">
											<?php $query = mysqli_query($connect, "SELECT * FROM tahun_ajar where aktif = 'Ya'");
											$m = mysqli_fetch_array($query); ?>
											<option value="<?= $m['semester'] ?>"><?= $m['semester'] ?></option>
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
				<!-- END PANEL DEFAULT -->
			</div>
		</div>
		<?php include('footer.php'); ?>
