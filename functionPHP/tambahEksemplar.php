<?php
	require "koneksi.php";
	session_start();

    $id = $_POST['idKomik'];

    if($id == ""){
        $_SESSION['belumLengkap'] = 1;
    }
    else{
    	$query = "SELECT * FROM buku WHERE idBuku = '$id'";
        $hasil = mysqli_query($conn,$query);
        $count = mysqli_num_rows($hasil);
        if($count == 0){
        	$_SESSION['komik'] = 1;

        }
        else{
            $query = "UPDATE buku SET Available = Available + 1, jumlahEksemplar = jumlahEksemplar + 1 WHERE idBuku = '$id';";
            mysqli_query($conn,$query);

            include "eksemplar.php";
            $idEks = getIdEks($id);
            $query = "INSERT INTO `eksbuku` (`idEksBuku`, `idBuku`, `Status`, `tanggalTiba`) VALUES ('$idEks', '$id', 'Tersedia', CURDATE());";
            mysqli_query($conn,$query);
            $_SESSION['berhasil'] = 1;
        }
    }
    header ("location:../Gudang/gudangDefault.php");
?>