<?php
	require "koneksi.php";
	include "penerbit.php";
	session_start();

	$buku = getPenerbit($_POST['idPenerbit']);
	$path = '../'.$penerbit['foto'];
	unlink($path);

	$query = "DELETE FROM penerbit WHERE `idPenerbit` = '$_POST[idPenerbit]'";
	mysqli_query($conn,$query);
	
	$_SESSION['penerbitHapus'] = 1;
?>