<?php
include("header-mahasiswa.php");
include("session-siswa.php");

$sql = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM kelas WHERE id_kelas = '$_SESSION[kelas]'"));
$id_kelas = $sql['id_kelas'];
$sql1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM tahun_ajar WHERE aktif = 'Ya'"));
echo $thn = $sql1['id_tahun'];
echo $smt = $sql1['semester'];

$sql2 = mysqli_query($connect, "SELECT * FROM asisten INNER JOIN asisten_kelas ON asisten.nim_asisten = asisten_kelas.id_asisten WHERE asisten_kelas.id_kelas_asisten = '$id_kelas' AND asisten_kelas.id_tahun = '$thn' AND asisten_kelas.smt = '$smt' GROUP BY asisten.nim_asisten");
$sql3 = mysqli_query($connect, "SELECT * FROM asisten INNER JOIN asisten_kelas ON asisten.nim_asisten = asisten_kelas.id_asisten WHERE asisten_kelas.id_kelas_asisten = '$id_kelas' AND asisten_kelas.id_tahun = '$thn' AND asisten_kelas.smt = '$smt' GROUP BY asisten.nim_asisten");
$sql4 = mysqli_query($connect, "SELECT * FROM asisten INNER JOIN asisten_kelas ON asisten.nim_asisten = asisten_kelas.id_asisten WHERE asisten_kelas.id_kelas_asisten = '$id_kelas' AND asisten_kelas.id_tahun = '$thn' AND asisten_kelas.smt = '$smt' GROUP BY asisten.nim_asisten");
?>

		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Selamat datang <i style="color:red"><?= $_SESSION['nama']; ?></i> <br> Form Penilaian Asisten Praktikum Kelas <?= $sql['nama_kelas'] ?> Tahun Akademik  <?= $sql1['tahun_ajar'] ?> Semester <?= $smt ?></h3>
							<p class="panel-subtitle">Silahkan isikan penilaian anda terhadap asisten praktikum dikelas anda</p>
						</div>
					</div>
					<!-- END OVERVIEW -->
					<div class="row">
						<div class="col-md-12">
							<!-- RECENT PURCHASES -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title" style="padding-bottom:10px;">Petunjuk</h3>
									<p class="panel-subtitle">Pilih nilai sesuai penilaian anda dengan memberi nilai <code>a/b/c/d</code></p>

									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body no-padding">
									<table class="table table-striped">
										<thead>
											<tr>
												<th>#</th>
												<th>Nama Asisten</th>
												<th>Foto</th>
												<?php
												$qj = mysqli_query($connect, "SELECT * FROM keterangan ORDER BY id ASC");
												while ($j = mysqli_fetch_array($qj)) { ?>
												<th><?= $j['nama'] ?> <a href="#" data-toggle="tooltip" data-placement="top" title="<?= $j['keterangan'] ?>"><i class="fa fa-info-circle"></i></a> </th>
												<?php } ?>
												<th>Kritik & Saran</th>
											</tr>
										</thead>
										<tbody>
											<?php $no = 1; while ($s = mysqli_fetch_array($sql2)) { ?>
												<?php
												$qy_nilai = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM nilai WHERE asisten = '$s[id_asisten]' AND penilai = '$_SESSION[nim]'"));
												if($qy_nilai['asisten'] == $s['id_asisten'] && $qy_nilai['kelas'] == $s['id_kelas_asisten']){
												 ?>
												<tr>
	 												<td class="font-weight-medium"><?= $no; ?></td>
	 												<td><?= $s['nama_asisten'] ?></td>
	 												<input type="hidden" name="nim" value="<?= $s['id_asisten'] ?>">
	 												<input type="hidden" name="tahun" value="<?= $s['id_tahun'] ?>">
	 												<input type="hidden" name="kelas" value="<?= $s['id_kelas_asisten'] ?>">
													<?php if($s['foto'] == ''){ ?>
													<td class="py-1">
														<img src="images/avatar0.jpg" class="img-circle" width="80px" alt="image" />
													</td>
													<?php }else{ ?>
													<td>
														<div class="hd-message-img">
															<img src="images/<?= $s['foto']; ?>" class="img-circle" width="80px" alt="image" />
														</div>
													</td>
													<?php } ?>
	 												<td>
	 													<select class="form-control" name="kreatifitas" disabled>
	 														<?php if($qy_nilai['kreatifitas'] == '5'){ ?>
	 														<option value="">A</option>
	 														<?php }elseif($qy_nilai['kreatifitas'] == '4'){ ?>
	 														<option value="">B</option>
	 														<?php }elseif($qy_nilai['kreatifitas'] == '3'){ ?>
	 														<option value="">C</option>
	 														<?php }elseif($qy_nilai['kreatifitas'] == '2'){ ?>
	 														<option value="">D</option>
	 														<?php }elseif($qy_nilai['kreatifitas'] == '1'){ ?>
	 														<option value="">E</option>
	 														<?php } ?>
	 													</select>
	 												</td>
	 												<td>
	 													<select class="form-control" name="kedisiplinan" disabled>
	 														<?php if($qy_nilai['kedisiplinan'] == '5'){ ?>
	 														<option value="">A</option>
	 														<?php }elseif($qy_nilai['kedisiplinan'] == '4'){ ?>
	 														<option value="">B</option>
	 													 <?php }elseif($qy_nilai['kedisiplinan'] == '3'){ ?>
	 														<option value="">C</option>
	 														<?php }elseif($qy_nilai['kedisiplinan'] == '2'){ ?>
	 														<option value="">D</option>
	 														<?php }elseif($qy_nilai['kedisiplinan'] == '1'){ ?>
	 														<option value="">E</option>
	 														<?php } ?>
	 													</select>
	 												</td>
	 												<td>
	 													<select class="form-control" name="kerapian" disabled>
	 														<?php if($qy_nilai['kerapian'] == '5'){ ?>
	 														<option value="">A</option>
	 														<?php }elseif($qy_nilai['kerapian'] == '4'){ ?>
	 														<option value="">B</option>
	 													 <?php }elseif($qy_nilai['kerapian'] == '3'){ ?>
	 														<option value="">C</option>
	 														<?php }elseif($qy_nilai['kerapian'] == '2'){ ?>
	 														<option value="">D</option>
	 														<?php }elseif($qy_nilai['kerapian'] == '1'){ ?>
	 														<option value="">E</option>
	 														<?php } ?>
	 													</select>
	 												</td>
	 												<td>
	 													<select class="form-control" name="komunikasi" disabled>
	 														<?php if($qy_nilai['komunikasi'] == '5'){ ?>
	 														<option value="">A</option>
	 														<?php }elseif($qy_nilai['komunikasi'] == '4'){ ?>
	 														<option value="">B</option>
	 													 <?php }elseif($qy_nilai['komunikasi'] == '3'){ ?>
	 														<option value="">C</option>
	 														<?php }elseif($qy_nilai['komunikasi'] == '2'){ ?>
	 														<option value="">D</option>
	 														<?php }elseif($qy_nilai['komunikasi'] == '1'){ ?>
	 														<option value="">E</option>
	 														<?php } ?>
	 													</select>
	 												</td>
	 												<td>
	 													<select class="form-control" name="pemahaman" disabled>
	 														<?php if($qy_nilai['pemahaman_materi'] == '5'){ ?>
	 														<option value="">A</option>
	 														<?php }elseif($qy_nilai['pemahaman_materi'] == '4'){ ?>
	 														<option value="">B</option>
	 													 <?php }elseif($qy_nilai['pemahaman_materi'] == '3'){ ?>
	 														<option value="">C</option>
	 														<?php }elseif($qy_nilai['pemahaman_materi'] == '2'){ ?>
	 														<option value="">D</option>
	 														<?php }elseif($qy_nilai['pemahaman_materi'] == '1'){ ?>
	 														<option value="">E</option>
	 														<?php } ?>
	 													</select>
	 												</td>
	 												<td>
	 													<input type="text" class="form-control" placeholder="Kritik & Saran" name="kritik" value="<?= $qy_nilai['kritik-saran'] ?>" disabled>
	 												</td>
	 												<td>

	 												</td>
	 											</tr>
											<?php }else{ ?>
												<form class="" action="simpan-nilai" method="post" enctype="multipart/form-data">
												<tr>
													<td class="font-weight-medium"><?= $no; ?></td>
													<td><?= $s['nama_asisten'] ?></td>
													<input type="hidden" name="nim" value="<?= $s['id_asisten'] ?>">
													<input type="hidden" name="smt" value="<?= $s['smt'] ?>">
													<input type="hidden" name="pemilih" value="<?= $_SESSION['nim'] ?>">
													<input type="hidden" name="tahun" value="<?= $s['id_tahun'] ?>">
													<input type="hidden" name="kelas" value="<?= $s['id_kelas_asisten'] ?>">
													<?php if($s['foto'] == ''){ ?>
													<td class="py-1">
														<img src="images/avatar0.jpg" class="img-circle" width="80px" alt="image" />
													</td>
													<?php }else{ ?>
													<td>
														<div class="hd-message-img">
															<img src="images/<?= $s['foto']; ?>" class="img-circle" width="80px" alt="image" />
														</div>
													</td>
													<?php } ?>
													<td>
														<select class="form-control" name="kreatifitas">
															<option value="5">A</option>
															<option value="4">B</option>
															<option value="3">C</option>
															<option value="2">D</option>
															<option value="1">E</option>
														</select>
													</td>
													<td>
														<select class="form-control" name="kedisiplinan">
															<option value="5">A</option>
															<option value="4">B</option>
															<option value="3">C</option>
															<option value="2">D</option>
															<option value="1">E</option>
														</select>
													</td>
													<td>
														<select class="form-control" name="kerapian">
															<option value="5">A</option>
															<option value="4">B</option>
															<option value="3">C</option>
															<option value="2">D</option>
															<option value="1">E</option>
														</select>
													</td>
													<td>
														<select class="form-control" name="komunikasi">
															<option value="5">A</option>
															<option value="4">B</option>
															<option value="3">C</option>
															<option value="2">D</option>
															<option value="1">E</option>
														</select>
													</td>
													<td>
														<select class="form-control" name="pemahaman">
															<option value="5">A</option>
															<option value="4">B</option>
															<option value="3">C</option>
															<option value="2">D</option>
															<option value="1">E</option>
														</select>
													</td>
													<td>
														<input type="text" class="form-control" placeholder="Kritik & Saran" name="kritik">
													</td>
													<td>
														<button type="submit" class="btn btn-icons btn-success" data-toggle="tooltip" title="Simpan">
															<i class="fa fa-save"></i> Simpan
														</button>
													</td>
												</tr>
												</form>
											<?php } ?>
												<?php $no++; } ?>
										</tbody>
									</table>
								</div>
								<div class="panel-footer">
									<div class="row">
										<div class="col-md-6"><span class="panel-note"> <br><br> </span></div>
										<div class="col-md-6 text-right"></div>
									</div>
								</div>
							</div>
							<!-- END RECENT PURCHASES -->
						</div>
					</div>
					<div class="row">
						<div class="col-md-12">
							<!-- TODO LIST -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Asisten Favorit </h3>
									<p>Pilih asisten yang menurut anda menjadi Favorit bagi anda</p>
									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body">
									<table class="table table-striped">
											<tbody>
													<tr>
														<th>#</th>
														<th>Nama Asisten</th>
														<?php
														$cek1 = mysqli_fetch_array(mysqli_query($connect, "SELECT * FROM `nilai_asistenfavorit`,`asisten` WHERE nilai_asistenfavorit.asistenfavorit = asisten.nim_asisten AND `penilai` = '$_SESSION[nim]' AND nilai_asistenfavorit.tahun_ajar = '$thn' AND smt = '$smt'"));
														if(empty($cek1)){
														?>
														<form class="" action="simpan-favorit.php" method="post">
															<th>
																<input type="hidden" name="pemilih" value="<?= $_SESSION['nim'] ?>">
																<input type="hidden" name="kelas" value="<?= $_SESSION['kelas'] ?>">
																<select class="form-control" name="asisten">
																	<option value="">Pilih Asisten Favoritmu</option>
																	<?php while($b = mysqli_fetch_array($sql3)) { ?>
																	<option value="<?= $b['id_asisten'] ?>"><?= $b['nama_asisten'] ?></option>
																	<?php } ?>
																	<input type="hidden" name="" value="<?= $b['nama_asisten'] ?>">
																</select>
															</th>
															<th>
																<button type="submit" class="btn btn-icons btn-success" data-toggle="tooltip" title="Simpan">
																	<i class="fa fa-save"></i> Simpan
																</button>
															</th>
														</form>
													<?php }else{ ?>
														<th>
															<select class="form-control" name="asisten" disabled>
																<option value=""><?= $cek1['nama_asisten'] ?></option>
															</select>
														</th>
													<?php } ?>
													</tr>
											</tbody>
									</table>
								</div>
							</div>
							<!-- END TODO LIST -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>



    <script type="text/javascript">

    $(document).ready(function(){

        $(".tip-top").tooltip({placement : 'top'});

        $(".tip-right").tooltip({placement : 'right'});

        $(".tip-bottom").tooltip({placement : 'bottom'});

        $(".tip-left").tooltip({ placement : 'left'});

    });

    </script>


<?php include('footer.php'); ?>
