<?php
	require "koneksi.php";
	include "getDataBuku.php";
	session_start();

	$buku = getDetailBuku($_POST['idKomik']);
	$path = '../'.$buku['Location'];
	unlink($path);

	$query = "DELETE FROM genreBuku WHERE `idBuku` = '$_POST[idKomik]'";
	mysqli_query($conn,$query);
	$query = "DELETE FROM buku WHERE `idBuku` = '$_POST[idKomik]'";
	mysqli_query($conn,$query);
	
	$_SESSION['komikHapus'] = 1;
?>