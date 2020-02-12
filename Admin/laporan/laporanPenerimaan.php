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
$pdf-> Cell(155,10,'Laporan Penerimaan Barang', 0,1,'C');
$pdf-> Ln(2);

$pdf-> SetFont('Arial','B',12); // tipe font , bold , ukuran
$pdf-> Cell(40,6,'Tanggal',1,0,'C');
$pdf-> Cell(40,6,'Kode Penerimaan',1,0,'C');
$pdf-> Cell(40,6,'Nama Barang',1,0,'C');
$pdf-> Cell(40,6,'Jumlah Barang',1,0,'C');
$pdf-> Cell(50,6,'Nama Supplier',1,0,'C');
$pdf-> Cell(40,6,'No PO',1,0,'C');

$query = mysqli_query($connecting,"SELECT distinct * FROM tbpenerimaan left join tbdetail_penerimaan on tbpenerimaan.kode_terima = tbdetail_penerimaan.kode_terima left join tbbarang on tbdetail_penerimaan.kode_barang = tbbarang.kode_barang left join tbsupplier on tbpenerimaan.kode_supplier = tbsupplier.kode_supplier where (tbpenerimaan.tanggal_terima BETWEEN '$tgl_awal' AND '$tgl_akhir') GROUP BY tbpenerimaan.kode_terima");
while ($data = mysqli_fetch_array($query)){

$pdf-> Ln(6);
$pdf-> SetFont('Arial','B',12); // tipe font , bold , ukuran
$pdf-> Cell(40,6,tgl_indo($data['tanggal_terima']),1,0,'C');
$pdf-> Cell(40,6,$data['kode_terima'],1,0,'C');
$pdf-> Cell(40,6,$data['nama_barang'],1,0,'C');
$pdf-> Cell(40,6,$data['jumlah_barang'],1,0,'C');
$pdf-> Cell(50,6,$data['nama_supplier'],1,0,'C');
$pdf-> Cell(40,6,$data['keterangan'],1,0,'C');
}



$pdf-> Output();


?>