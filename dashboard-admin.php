<?php
include("header.php");
$sql1 = mysqli_query($connect, "select *, count(tahun_ajar.id_tahun) as jml_thn from tahun_ajar");
$a = mysqli_fetch_array($sql1);
$jml_thn = $a['jml_thn'];

$tahun = mysqli_fetch_array(mysqli_query($connect, "select * from tahun_ajar WHERE aktif = 'Ya'"));

$sql2 = mysqli_query($connect, "select *, count(jurusan.id_jurusan) as jml_jurusan from jurusan");
$b = mysqli_fetch_array($sql2);
$jml_jurusan = $b['jml_jurusan'];

$sql2 = mysqli_query($connect, "select *, count(kelas.id_kelas) as jml_kls from kelas");
$b = mysqli_fetch_array($sql2);
$jml_kls = $b['jml_kls'];

$sql2 = mysqli_query($connect, "select *, count(matkul.id_matkul) as jml_matkul from matkul");
$b = mysqli_fetch_array($sql2);
$jml_matkul = $b['jml_matkul'];

$sql2 = mysqli_query($connect, "select *, count(asisten.nim_asisten) as jml_asisten from asisten");
$b = mysqli_fetch_array($sql2);
$jml_asisten = $b['jml_asisten'];

$sql2 = mysqli_query($connect, "select *, count(asisten_kelas.id_asisten_kelas) as jml_asisten_kls from asisten_kelas");
$b = mysqli_fetch_array($sql2);
$jml_asisten_kls = $b['jml_asisten_kls'];

?>
		<!-- MAIN -->
		<div class="main">
			<!-- MAIN CONTENT -->
			<div class="main-content">
				<div class="container-fluid">
					<!-- OVERVIEW -->
					<div class="panel panel-headline">
						<div class="panel-heading">
							<h3 class="panel-title">Beranda Administrator (Pengurus)</h3>
							<!-- <p class="panel-subtitle">Period: Oct 14, 2016 - Oct 21, 2016</p> -->
						</div>
						<div class="panel-body">

							<div class="row">
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-building-o"></i></span>
										<p>
											<span class="number"><?= $jml_kls; ?></span>
											<span class="title">Total Kelas</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-book"></i></span>
										<p>
											<span class="number"><?= $jml_matkul; ?></span>
											<span class="title">Total Mata Kuliah</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-user"></i></span>
										<p>
											<span class="number"><?= $jml_asisten ?></span>
											<span class="title">Total Asisten</span>
										</p>
									</div>
								</div>
								<div class="col-md-3">
									<div class="metric">
										<span class="icon"><i class="fa fa-users"></i></span>
										<p>
											<span class="number"><?= $jml_asisten_kls; ?></span>
											<span class="title">Total Asisten Kelas</span>
										</p>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- END OVERVIEW -->

					<div class="row">
						<div class="col-md-6 col-sm-12">
							<!-- TASKS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Asisten Terbaik</h3>
									<p>Periode <?= $tahun['tahun_ajar'] ?> || Semester <?= $tahun['semester'] ?></p>

									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body">
									<ul class="list-unstyled task-list">
										<?php
										$no = 1;
										$qy = mysqli_query($connect, "SELECT * FROM nilai_akumulasi_terbaik
											JOIN asisten ON nilai_akumulasi_terbaik.id_asisten = asisten.nim_asisten
											Join tahun_ajar ON nilai_akumulasi_terbaik.tahun_ajar = tahun_ajar.id_tahun
											WHERE nilai_akumulasi_terbaik.tahun_ajar = '$tahun[id_tahun]'
											AND nilai_akumulasi_terbaik.semester = '$tahun[semester]'
											ORDER BY nilai_akumulasi_terbaik.total DESC LIMIT 3");
										while($q = mysqli_fetch_array($qy)) { ?>
										<li>
											<p><?= $q['nim_asisten']; ?> | <?= $q['nama_asisten']; ?> <span class="label-percent"><?= round($q['total']); ?></span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-danger" role="progressbar" aria-valuenow="<?= $q['total']; ?>" aria-valuemin="0" aria-valuemax="1000" style="width:<?= $q['total']; ?>%">
												</div>
											</div>
										</li>
									<?php } ?>
									</ul>
								</div>
							</div>
							<!-- END TASKS -->
						</div>
						<div class="col-md-6 col-sm-12">
							<!-- TASKS -->
							<div class="panel">
								<div class="panel-heading">
									<h3 class="panel-title">Asisten Favorit</h3>
									<p>Periode <?= $tahun['tahun_ajar'] ?> || Semester <?= $tahun['semester'] ?></p>

									<div class="right">
										<button type="button" class="btn-toggle-collapse"><i class="lnr lnr-chevron-up"></i></button>
										<button type="button" class="btn-remove"><i class="lnr lnr-cross"></i></button>
									</div>
								</div>
								<div class="panel-body">
									<ul class="list-unstyled task-list">
										<?php
										$no = 1;
										$qy = mysqli_query($connect, "SELECT * FROM `nilai_akumulasi_favorit`
											JOIN asisten ON nilai_akumulasi_favorit.id_asisten = asisten.nim_asisten
											Join tahun_ajar ON nilai_akumulasi_favorit.tahun_ajar = tahun_ajar.id_tahun
											WHERE nilai_akumulasi_favorit.tahun_ajar = '$tahun[id_tahun]'
											AND nilai_akumulasi_favorit.smt = '$tahun[semester]'
											ORDER BY nilai_akumulasi_favorit.jml_pemilih DESC LIMIT 3");
										while($q = mysqli_fetch_array($qy)) { ?>
										<li>
											<p><?= $q['nim_asisten']; ?> | <?= $q['nama_asisten']; ?> <span class="label-percent"><?= $q['jml_pemilih']; ?></span></p>
											<div class="progress progress-xs">
												<div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="<?= $q['jml_pemilih']; ?>" aria-valuemin="0" aria-valuemax="1000" style="width:<?= $q['jml_pemilih']; ?>%">
												</div>
											</div>
										</li>
									<?php } ?>
									</ul>
								</div>
							</div>
							<!-- END TASKS -->
						</div>
					</div>
				</div>
			</div>
			<!-- END MAIN CONTENT -->
		</div>
		<!-- END MAIN -->
		<div class="clearfix"></div>
		<footer>
			<div class="container-fluid">
				<p class="copyright">&copy; 2017 <a href="https://www.themeineed.com" target="_blank">Theme I Need</a>. All Rights Reserved.</p>
			</div>
		</footer>
	</div>
	<!-- END WRAPPER -->
	<!-- Javascript -->
	<script src="assets/vendor/jquery/jquery.min.js"></script>
	<script src="assets/vendor/bootstrap/js/bootstrap.min.js"></script>
	<script src="assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
	<script src="assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
	<script src="assets/vendor/chartist/js/chartist.min.js"></script>
	<script src="assets/scripts/klorofil-common.js"></script>
	<script>
	$(function() {
		var data, options;

		// headline charts
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[23, 29, 24, 40, 25, 24, 35],
				[14, 25, 18, 34, 29, 38, 44],
			]
		};

		options = {
			height: 300,
			showArea: true,
			showLine: false,
			showPoint: false,
			fullWidth: true,
			axisX: {
				showGrid: false
			},
			lineSmooth: false,
		};

		new Chartist.Line('#headline-chart', data, options);


		// visits trend charts
		data = {
			labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
			series: [{
				name: 'series-real',
				data: [200, 380, 350, 320, 410, 450, 570, 400, 555, 620, 750, 900],
			}, {
				name: 'series-projection',
				data: [240, 350, 360, 380, 400, 450, 480, 523, 555, 600, 700, 800],
			}]
		};

		options = {
			fullWidth: true,
			lineSmooth: false,
			height: "270px",
			low: 0,
			high: 'auto',
			series: {
				'series-projection': {
					showArea: true,
					showPoint: false,
					showLine: false
				},
			},
			axisX: {
				showGrid: false,

			},
			axisY: {
				showGrid: false,
				onlyInteger: true,
				offset: 0,
			},
			chartPadding: {
				left: 20,
				right: 20
			}
		};

		new Chartist.Line('#visits-trends-chart', data, options);


		// visits chart
		data = {
			labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
			series: [
				[6384, 6342, 5437, 2764, 3958, 5068, 7654]
			]
		};

		options = {
			height: 300,
			axisX: {
				showGrid: false
			},
		};

		new Chartist.Bar('#visits-chart', data, options);


		// real-time pie chart
		var sysLoad = $('#system-load').easyPieChart({
			size: 130,
			barColor: function(percent) {
				return "rgb(" + Math.round(200 * percent / 100) + ", " + Math.round(200 * (1.1 - percent / 100)) + ", 0)";
			},
			trackColor: 'rgba(245, 245, 245, 0.8)',
			scaleColor: false,
			lineWidth: 5,
			lineCap: "square",
			animate: 800
		});

		var updateInterval = 3000; // in milliseconds

		setInterval(function() {
			var randomVal;
			randomVal = getRandomInt(0, 100);

			sysLoad.data('easyPieChart').update(randomVal);
			sysLoad.find('.percent').text(randomVal);
		}, updateInterval);

		function getRandomInt(min, max) {
			return Math.floor(Math.random() * (max - min + 1)) + min;
		}

	});
	</script>
</body>

</html>
