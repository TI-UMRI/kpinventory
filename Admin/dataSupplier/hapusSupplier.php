<?php
	include "../../koneksi.php";
	$kode_supplier = $_GET['kode_supplier'];
	$query = mysqli_query($connecting,"DELETE FROM tbsupplier where kode_supplier ='$kode_supplier'") or die (mysql_error());

	echo "
        <meta http-equiv='refresh' content = '0; url=../beranda.php?hal=dataSupplier'>
      ";
?>