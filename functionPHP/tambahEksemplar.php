<?php
	require "koneksi.php";
	session_start();

    $id = $_POST['idKomik'];
    $idEksemplar = $_POST['idEksemplar'];

    if($idEksemplar == ""){
        $_SESSION['belumLengkap'] = 1;
    }
    else{
        $query = "INSERT INTO `eksbuku` (`idEksBuku`, `idBuku`, `Status`, `tanggalTiba`) VALUES ('$idEksemplar', '$id', 'Tersedia', CURRENT_TIMESTAMP)";
        if ($conn->query($query) === TRUE) {
            echo "New record created successfully";
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
?>