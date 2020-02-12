<?php
include "koneksi.php";

$username = $_POST['username'];
$password = $_POST['password'];


$login = mysqli_query($connecting,"Select * from tblogin where username = '$username' and password = '$password'");
$ketemu = mysqli_num_rows($login);
$r = mysqli_fetch_array($login);

	if ($ketemu > 0){
		 session_start();


		 $_SESSION['id_login'] = $r['id_login'];
		 $_SESSION['username'] = $r['username'];
		 $_SESSION['password'] = $r['password'];
		 $_SESSION['nama_admin'] = $r['nama_admin'];
		 $_SESSION['status_admin'] = $r['status_admin'];

	echo "
 			<script>
 			alert('Anda Berhasil Login, Selamat Datang $_SESSION[username]');
 			window.location = 'admin/index.php'
 			</script>
	";

	}else{

	echo "
 			<script>
 			alert('Username atau Password Salah');
 			window.location = 'index.php'
 			</script>
 	";


	}


	

?>
