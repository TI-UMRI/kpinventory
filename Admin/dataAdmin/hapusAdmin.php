<?php
	include "../../koneksi.php";
	$id_login = $_GET['id_login'];
	$query = mysqli_query($connecting,"DELETE FROM tblogin where id_login ='$id_login'") or die (mysql_error());

	echo "
        <meta http-equiv='refresh' content = '0; url=../beranda.php?hal=dataAdmin'>
      ";
?>