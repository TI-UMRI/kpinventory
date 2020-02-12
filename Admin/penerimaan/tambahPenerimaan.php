<?php
include "../koneksi.php";
// Nomor Transaksi otomatis
// nomor otomatis belum jalan

$today=date("Ymd");
$query = "SELECT MAX(RIGHT(kode_terima,12)) As akhir From tbpenerimaan where RIGHT(kode_terima,12) LIKE '$today%'";
$hasil = mysqli_query($connecting,$query);
$data = mysqli_fetch_array($hasil);
$noAkhirTerima = $data['akhir'];
$noAkhirUrut = substr($noAkhirTerima, 8, 4);
$noUrutSelanjutnya = $noAkhirUrut + 1;
$noTerimaSelanjutnya = $today . sprintf('', $noUrutSelanjutnya);
$kode = "";
$no_baru = $kode.$noTerimaSelanjutnya;

// Proses Tambah

if($_SERVER['REQUEST_METHOD']== "POST" && isset($_POST['tambah'])){
	$kode_terima = $_POST['kode_terima'];
	$kode_barang = $_POST['kode_barang'];
	$jumlah = $_POST['jumlah'];

	//cek apakah ada kode barang yang sama di table sementara
	$cekData = "SELECT kode_barang from tbsementara where kode_barang ='$kode_barang' ";
	$ada = mysqli_query($connecting,$cekData) or die (mysqli_error());
		if(mysqli_num_rows($ada) > 0) {
			// jika ada 1 kode barang yang duplikat di tabel sementara maka jumlah kode barang tersebut akan di tambahan
			// melalui proses UPDATE
		$ubah = mysqli_query($connecting,"UPDATE tbsementara SET jumlah = jumlah + '$jumlah' where kode_barang ='$kode_barang'");

		} else {
			// apabila kode barang tidak sama maka akan langsung menambahkan data (INSERT)
			$simpan = mysqli_query($connecting,"INSERT INTO tbsementara VALUES('','$kode_terima','$kode_barang','$jumlah')");
			if($simpan){
				echo "<meta http-equiv='refresh' content='0 url=?hal=tambahPenerimaan'>";
		}
}
}

	//Proses Simpan data ke tabel penerimaan dan detail penerimaan

	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['simpan'])){
		$kode_terima = $_POST['kode_terima'];
		$jumlah_item = $_POST['jumlah_item'];
		$kode_supplier = $_POST['kode_supplier'];
		$id_login = $_SESSION['id_login'];
		$keterangan = $_POST['keterangan'];

		$simpanData = mysqli_query($connecting,"INSERT INTO tbpenerimaan Values ('$kode_terima','$today','$jumlah_item','$kode_supplier','$id_login','$keterangan')");
		if($simpanData){
			// Pindahkan Data Yang ada di tabel sementara ke tabel detail_penerimaan

			$simpanTMP = mysqli_query($connecting,"INSERT INTO tbdetail_penerimaan (kode_terima,kode_barang,jumlah_barang) SELECT kode,kode_barang,jumlah FROM tbsementara");


			$simpanGabungTerima = mysqli_query($connecting,"INSERT INTO tbgabung_transaksi (kode,tanggal,kode_barang,jumlah_barang,ket) SELECT kode,'$today',kode_barang,jumlah,'MASUK' FROM tbsementara");

			$simpanGabungKeluar = mysqli_query($connecting,"INSERT INTO tbgabung_transaksi (kode,tanggal,kode_barang,jumlah_barang,ket) SELECT kode,'$today',kode_barang,0,'KELUAR' FROM tbsementara");

			// Setelah data yang ada di tabel sementara di pindahkan ke tabel detail, maka hapus semua data yang ada ditabel sementara

			$hapusTMP = mysqli_query($connecting,"DELETE FROM tbsementara") or die(mysqli_error());

			echo "<script>window.alert('Data Penerimaan Barang Berhasil disimpan')</script>";
			echo "<meta http-equiv='refresh' content='0; url=?hal=dataPenerimaan'>";
		}
	}




?>







<section id="main-content">
	<section class="wrapper">
		<div class="form-panel">
			<h3><i class="fa fa-backward"></i> Tambah Data Penerimaan</h3>
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<form method="POST" enctype="multipart/form-data">
								<div class="form-group">
								<label>No Terima</label>
								<input class ="form-control" type="text" name="kode_terima" value="">

								</div>

								<div class="form-group">
								<label>Nama Barang</label>
								<select class ="form-control" type="text" name="kode_barang" id="kode_barang" onchange="changeValue(this.value)">
								<?php
									$tampil = mysqli_query($connecting,"SELECT * FROM tbbarang");
									while($w=mysqli_fetch_array($tampil)){
										echo "<option value=$w[kode_barang] selected>$w[nama_barang]</option>";
									}
									
								?>
								</select>

								</div>

								<div class="form-group">
								<label>Jumlah</label>
								<input class ="form-control" type="text" name="jumlah" required="">
								</div>
							
								<div class="form-group">
								<button class="btn btn-primary" name="tambah">Tambah</button>
								</div>

							</form>


						</div> <!-- akhir row kiri -->

						<div class="col-md-6">
							<table class="table table-striped table-advance table-hover">
								<thead>
									<?php
									include "../koneksi.php";
									$query = mysqli_query($connecting, "SELECT * FROM tbsementara left join tbbarang on tbsementara.kode_barang = tbbarang.kode_barang");
									?>
									<tr>
										<th>Kode Barang</th>
										<th>Nama Barang</th>
										<th>Jumlah</th>
										<th></th>
									</tr>
								</thead>
									<tbody>
										<?php
										while($data = mysqli_fetch_array($query)){
										?>
										<td><?php echo $data['kode_barang'] ?></td>
										<td><?php echo $data['nama_barang'] ?></td>
										<td><?php echo $data['jumlah'] ?></td>
										<td>
										<a href="penerimaan/hapusSementara.php?id=<?php echo $data['id'] ?>" onclick="return confirm('Yakin Akan dihapus??')" class="btn btn-danger" name="hapus"><i class="fa fa-trash-o"></i></a>
										</td>
									<tr>



										<?php
										}
										?>
									</tbody>


							</table>
							

						</div>
					</div>
					
				</div>
			</div>



		</div> <!-- akhir panel atas-->

		<div class="form-panel"> <!-- panel bawah-->
			<h3><i class="fa fa-save"></i> Simpan Data Penerimaan</h3>
			<div class="row">
				<div class="col-md-12">
					<div class="row">
						<div class="col-md-6">
							<form method="POST" enctype="multipart/form-data">
								<div class="form-group">
								<label>No Terima</label>
								<input class ="form-control" type="text" name="kode_terima" value="">

								</div>

								<div class="form-group">
								<label>Supplier</label>
								<select class ="form-control" type="text" name="kode_supplier" id="kode_supplier" onchange="changeValue(this.value)">
								<?php
									$tampil = mysqli_query($connecting,"SELECT * FROM tbsupplier");
									while($w=mysqli_fetch_array($tampil)){
										echo "<option value=$w[kode_supplier] selected>$w[nama_supplier]</option>";
									}
									
								?>
								</select>
								</div>
								


								<div class="form-group">
								<label>Keterangan</label>
								<input class ="form-control" type="text" name="keterangan" id="keterangan" required="">
								</div>
							
								<div class="form-group">
								<button class="btn btn-primary" name="simpan">Simpan</button>
								</div>

							

						</div> <!-- akhir row kiri -->

						<div class="col-md-6">
							
								<div class="form-group">
								<label>Pemberi</label>
								<input class ="form-control" type="text" name="penerima" id="penerima" value="<?php echo $_SESSION['nama_admin'] ?>" readonly>
								</div>

								<?php
								//Hitung Jumlah Item Yang akan di simpan
								include "../koneksi.php";
								$item = mysqli_query($connecting,"SELECT kode_barang from tbsementara");
								$jumlahitem = mysqli_num_rows($item);

								?>

								<div class="form-group">
								<label>Jumlah Item Barang</label>
								<input class ="form-control" type="text" name="jumlah_item" value="<?php echo $jumlahitem ?>" readonly>
								</div>
							</form>

						</div>


					</div>
					
				</div>
			</div>



		</div> <!-- akhir panel bawah -->

	</section>
</section>
