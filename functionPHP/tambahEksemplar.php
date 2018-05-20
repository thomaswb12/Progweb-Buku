<?php
	require "koneksi.php";
	session_start();
	$idKomik = $_POST['idKomik'];
	$idEksemplar = $_POST['idEksemplar'];

	$query = "SELECT * FROM buku WHERE idBuku = '$idKomik'";
    $hasil = mysqli_query($conn,$query);
    $count = mysqli_num_rows($hasil);
    if($count == 0){
    	$_SESSION['komik'] = 1;
    }
    header ("location:../Gudang/gudangDefault.php");
?>