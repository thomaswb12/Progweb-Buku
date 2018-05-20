<?php
	require "koneksi.php";
	include "getDataBuku.php";

	$buku = getDetailBuku($_POST['idKomik']);
	$path = '../'.$buku['Location'];
	unlink($path);

	$query = "DELETE FROM buku WHERE `idBuku` = '$_POST[idKomik]'";
	mysqli_query($conn,$query);

	echo $query;
?>