<section id="main-content">
	<section class="wrapper">
		<div class="col-md-6">
			<div class="form-panel">
				<h3><i class="fa fa-file-o"></i> Laporan Penerimaan Barang</h3>
					<form method="POST" action="laporan/laporanPenerimaan.php">
						<div class="form_group">
							<label>Tanggal Awal</label>
							<input class="form-control" type="date" name="tgl_awal">
						</div>
						<div class="form_group">
							<label>Tanggal Akhir</label>
							<input class="form-control" type="date" name="tgl_akhir">
						</div>
						<br>
						<div class="form_group">
						<button class="btn btn-primary" name="cetakPenerimaan"><i class="fa fa-print"></i> Cetak</button>
						</div>
						
					</form>
				
			</div> <!-- Akhir Panel -->

		</div>
		<div class="col-md-6">
			<div class="form-panel">
				<h3><i class="fa fa-file-o"></i> Laporan Pengeluaran Barang</h3>
					<form method="POST" action="laporan/laporanPengeluaran.php">
						<div class="form_group">
							<label>Tanggal Awal</label>
							<input class="form-control" type="date" name="tgl_awal">
						</div>
						<div class="form_group">
							<label>Tanggal Akhir</label>
							<input class="form-control" type="date" name="tgl_akhir">
						</div>
						<br>
						<div class="form_group">
						<button class="btn btn-primary" name="cetakPenerimaan"><i class="fa fa-print"></i> Cetak</button>
						</div>
						
					</form>
				
			</div> <!-- Akhir Panel --



	</section>
</section>