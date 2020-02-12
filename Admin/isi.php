<?php

if($_GET['hal']=='beranda')
	{include "beranda.php";}

else if($_GET['hal']=='home')
	{include "home.php";}

else if($_GET['hal']=='dataKategori')
	{include "dataKategori/dataKategori.php";}
else if($_GET['hal']=='tambahKategori')
	{include "dataKategori/tambahKategori.php";}
else if($_GET['hal']=='ubahKategori')
	{include "dataKategori/ubahKategori.php";}
else if($_GET['hal']=='dataBarang')
	{include "dataBarang/dataBarang.php";}
else if($_GET['hal']=='tambahBarang')
	{include "dataBarang/tambahBarang.php";}
else if($_GET['hal']=='ubahBarang')
	{include "dataBarang/ubahBarang.php";}
else if($_GET['hal']=='dataAdmin')
	{include "dataAdmin/dataAdmin.php";}
else if($_GET['hal']=='tambahAdmin')
	{include "dataAdmin/tambahAdmin.php";}
else if($_GET['hal']=='ubahAdmin')
	{include "dataAdmin/ubahAdmin.php";}
else if($_GET['hal']=='dataSupplier')
	{include "dataSupplier/dataSupplier.php";}
else if($_GET['hal']=='tambahSupplier')
	{include "dataSupplier/tambahSupplier.php";}
else if($_GET['hal']=='ubahSupplier')
	{include "dataSupplier/ubahSupplier.php";}
else if($_GET['hal']=='dataPenerimaan')
	{include "penerimaan/dataPenerimaan.php";}
else if($_GET['hal']=='tambahPenerimaan')
	{include "penerimaan/tambahPenerimaan.php";}
else if($_GET['hal']=='detailPenerimaan')
	{include "penerimaan/detailPenerimaan.php";}
else if($_GET['hal']=='dataPengeluaran')
	{include "pengeluaran/dataPengeluaran.php";}
else if($_GET['hal']=='tambahPengeluaran')
	{include "pengeluaran/tambahPengeluaran.php";}
else if($_GET['hal']=='detailPengeluaran')
	{include "pengeluaran/detailPengeluaran.php";}
else if($_GET['hal']=='stokBarang')
	{include "stokBarang.php";}
else if($_GET['hal']=='detailStokBarang')
	{include "detailStokBarang.php";}
else if($_GET['hal']=='laporanTransaksi')
	{include "laporan/laporanTransaksi.php";}
?>