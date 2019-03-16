<?php
include("header.php");
?>
<style>
		#loading{
	background: whitesmoke;
	position: absolute;
	top: 140px;
	left: 82px;
	padding: 5px 10px;
	border: 1px solid #ccc;
}
</style>

<script>
$(document).ready(function(){
	// Sembunyikan alert validasi kosong
	$("#kosong").hide();
});
</script>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title"> <i class="lnr lnr-thumbs-up"></i> Nilai Asisten Terbaik</h3>
							<p class="panel-subtitle">Halaman untuk mengelola Nilai Asisten Terbaik</p>
						</div>
						<div class="panel-body">

							<div class="row">
								<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
									<div class="tab-ctn">
										<div style="padding: 0 15px;">
											<form method="post" action="" enctype="multipart/form-data">
												<div class="form-group float-lb">
													<div class="nk-int-st">
															<label class="nk-label">Pilih Tahun Akademik</label>
															<select class="form-control" name="tahun">
																<option value="">Pilih</option>
																<?php
																$qy_k = mysqli_query($connect, "SELECT * FROM tahun_ajar");
																while ($k = mysqli_fetch_array($qy_k)) { ?>
																	<option value="<?= $k['id_tahun'] ?>"><?= $k['tahun_ajar'] ?></option>
																<?php } ?>
															</select>
													</div>
												</div>
												<div class="form-group float-lb">
													<div class="nk-int-st">
															<label class="nk-label">Pilih Semester</label>
															<select class="form-control" name="smt">
																<option value="">Pilih</option>
																<option value="Genap">Genap</option>
																<option value="Ganjil">Ganjil</option>
															</select>
													</div>
												</div>
												<div class="modal-footer">
													<button type="submit" name="preview" class="btn btn-primary btn-sm">
														Lihat Nilai
													</button>
												</div>
											</form>
											<hr>
											<?php
											// Jika user telah mengklik tombol Preview
											if(isset($_POST['preview'])){
												$th = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM tahun_ajar WHERE id_tahun = '$_POST[tahun]'"))
												?>
												<h4>Tahun Akademik : <b><?= $th['tahun_ajar']; ?></b> | Semester : <b><?= $_POST['smt'] ?></b> </h4> <br>

												<?php
												$qy = mysqli_query($connect, "SELECT * FROM nilai_akumulasi_terbaik
													JOIN asisten ON nilai_akumulasi_terbaik.id_asisten = asisten.nim_asisten
													Join tahun_ajar ON nilai_akumulasi_terbaik.tahun_ajar = tahun_ajar.id_tahun
													WHERE nilai_akumulasi_terbaik.tahun_ajar = '$_POST[tahun]'
													AND nilai_akumulasi_terbaik.semester = '$_POST[smt]'
													ORDER BY nilai_akumulasi_terbaik.total DESC");

												$cek1 = mysqli_num_rows($qy);
												if($cek1 > 0){
											?>
												<div class="data-table-list">
														<div class="table-responsive">
															<form class="" action="cetak-nilai-terbaik" method="get" target="_blank">
																<input type="hidden" name="tahun" value="<?= $_POST['tahun'] ?>">
																<input type="hidden" name="smt" value="<?= $_POST['smt'] ?>">
																<button type="submit" class="btn btn-primary btn-sm">Cetak PDF</button><br>
															</form>
															<table id="example" class="table display" style="width:100%">
																<thead>
																		<tr>
																				<th></th>
																				<th>NIM</th>
																				<th>Nama Asisten</th>
																				<th>Kreatifitas</th>
																				<th>Kedisiplinan</th>
																				<th>Kerapihan</th>
																				<th>Komunikasi</th>
																				<th>Pemahaman Materi</th>
																				<th>Total Penilai</th>
																				<th>Total Nilai</th>
																				<th>Tahun Ajaran</th>
																				<th>Semester</th>
																		</tr>
																</thead>
																<tbody>
																	<?php
																	$no = 1;

																	while($q = mysqli_fetch_array($qy)) { ?>
																		<tr>
																			<td><?= $no; ?></td>
																			<td><?= $q['nim_asisten']; ?></td>
																			<td><?= $q['nama_asisten']; ?></td>
																			<td><?= $q['tot_kreatifias']; ?></td>
																			<td><?= $q['tot_kedisiplinan']; ?></td>
																			<td><?= $q['tot_kerapihan']; ?></td>
																			<td><?= $q['tot_komunikasi']; ?></td>
																			<td><?= $q['tot_pemahaman']; ?></td>
																			<td><?= $q['jml_mhs']; ?></td>
																			<td><?= round($q['total']); ?></td>
																			<td><?= $q['tahun_ajar']; ?></td>
																			<td><?= $q['semester']; ?></td>
																		</tr>
																	<?php $no++; } ?>
																</tbody>
																<tfoot>
																		<tr>
																				<th></th>
																				<th>NIM</th>
																				<th>Nama Asisten</th>
																				<th>Kreatifitas</th>
																				<th>Kedisiplinan</th>
																				<th>Kerapihan</th>
																				<th>Komunikasi</th>
																				<th>Pemahaman Materi</th>
																				<th>Total Penilai</th>
																				<th>Total Nilai</th>
																				<th>Tahun Ajaran</th>
																				<th>Semester</th>
																		</tr>
																</tfoot>
														</table>
														</div>
												</div>
											<?php }else{ ?>
												<center><img src="images/index.png" alt=""></center>
											<?php }} ?>
										</div>
									</div>
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
