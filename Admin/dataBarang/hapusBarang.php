<?php
	include "../../koneksi.php";
	$kode_barang = $_GET['kode_barang'];
	$query = mysqli_query($connecting,"DELETE FROM tbbarang where kode_barang ='$kode_barang'") or die (mysql_error());

	echo "
        <meta http-equiv='refresh' content = '0; url=../beranda.php?hal=dataBarang'>
      ";
?>