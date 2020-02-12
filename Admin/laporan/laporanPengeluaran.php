<?php
	include "../../koneksi.php";
	include "../../fpdf17/fpdf.php";
	include "../fungsiTanggal.php";
	$tgl_awal = $_POST['tgl_awal'];
	$tgl_akhir = $_POST['tgl_akhir'];

$pdf = new FPDF ('L','mm',array(210,297)); // tipe kertas P portrait , L landscape , mm milimeter , 210 297 ukuran kertas
$pdf-> addpage();

$pdf-> SetFont('Arial','B',18); // tipe font , bold , ukuran
$pdf-> Cell(60);
$pdf-> Cell(155,10,'Laporan Pengeluaran Barang', 0,1,'C');
$pdf-> Ln(2);

$pdf-> SetFont('Arial','B',12); // tipe font , bold , ukuran
$pdf-> Cell(40,6,'Tanggal',1,0,'C');
$pdf-> Cell(40,6,'Kode Keluar',1,0,'C');
$pdf-> Cell(40,6,'Nama Barang',1,0,'C');
$pdf-> Cell(40,6,'Jumlah Barang',1,0,'C');
$pdf-> Cell(50,6,'Nama Supplier',1,0,'C');
$pdf-> Cell(40,6,'No PO',1,0,'C');

$query = mysqli_query($connecting,"SELECT distinct * FROM tbpengeluaran left join tbdetail_pengeluaran on tbpengeluaran.kode_keluar = tbdetail_pengeluaran.kode_keluar left join tbbarang on tbdetail_pengeluaran.kode_barang = tbbarang.kode_barang left join tbsupplier on tbpengeluaran.kode_supplier = tbsupplier.kode_supplier where (tbpengeluaran.tanggal_keluar BETWEEN '$tgl_awal' AND '$tgl_akhir') GROUP BY tbpengeluaran.kode_keluar");
while ($data = mysqli_fetch_array($query)){

$pdf-> Ln(6);
$pdf-> SetFont('Arial','B',12); // tipe font , bold , ukuran
$pdf-> Cell(40,6,tgl_indo($data['tanggal_keluar']),1,0,'C');
$pdf-> Cell(40,6,$data['kode_keluar'],1,0,'C');
$pdf-> Cell(40,6,$data['nama_barang'],1,0,'C');
$pdf-> Cell(40,6,$data['jumlah_barang'],1,0,'C');
$pdf-> Cell(50,6,$data['nama_supplier'],1,0,'C');
$pdf-> Cell(40,6,$data['keterangan'],1,0,'C');
}



$pdf-> Output();


?>