<?php
	include "../../koneksi.php";
	$kode_terima = $_GET['kode_terima'];
	$hapusTabelPenerimaan = mysqli_query($connecting,"DELETE FROM tbpenerimaan where kode_terima ='$kode_terima'") or die (mysql_error());
		if($hapusTabelPenerimaan){
			$hapusTabelPenerimaan = mysqli_query($connecting,"DELETE FROM tbdetail_penerimaan where kode_terima = '$kode_terima'");
		}

	echo "
        <meta http-equiv='refresh' content = '0; url=../beranda.php?hal=dataPenerimaan'>
      ";
?>