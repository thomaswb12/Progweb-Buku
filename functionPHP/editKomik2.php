<?php
    session_start();
    include "koneksi.php";

if(!empty($_POST["tombolOk"])){
        //masukkan ke variabel
        $idKomik = $_SESSION['idKomik'];
        $judul = $_POST['judul'];
        $sinopsis = $_POST['sinopsis'];
        $tgl = $_POST['tanggalTerbit'];
        $jml = $_POST['jumlahHalaman'];
        $berat = $_POST['beratKomik'].'.0';
        $panjang = $_POST['panjang'];
        $lebar = $_POST['lebar'];
        $foto = "../images/buku/".$_FILES['gambar']['name'];
        $location = "images/buku/".$_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], $foto);
        /*switch ($_POST['genre']) {
            case 1: $genre = 'Action';break;
            case 2: $genre = 'Romance';break;
            case 3: $genre = 'Fantasi';break;
            case 4: $genre = 'Comedy';break;
            case 5: $genre = 'Thrille';break;
            case 6: $genre = 'Horor';break;
            case 7: $genre = 'Sci-fi';break;
        }*/
        switch ($_POST['rating']) {
            case 1: $rating = 'anak-anak';break;
            case 2: $rating = 'remaja';break;
            case 3: $rating = 'dewasa';break;
            case 4: $rating = 'semua umur';break;
        }
        switch ($_POST['specialEdition']) {
            case 1: $specialEdition = 'Ya';break;
            case 2: $specialEdition = 'Tidak';break;
        }
        switch ($_POST['jenisCover']) {
            case 1: $jenisCover = 'Soft';break;
            case 2: $jenisCover = 'Hard';break;
        }

        //kalau data belum lengkap
        if($judul==""||$sinopsis==""||$rating==""||$tgl==""||$jml==""||$berat==""||$jenisCover==""||$panjang==""||$lebar==""||$rating==""||$specialEdition==""||$jenisCover==""){
            $_SESSION["belumLengkap"]=1;
        }
        //kalau data sudah lengkap
        else{
            $idRak = "CC000001";
            $satu = 1;
            $nol = 0;
            $query="UPDATE `buku` SET `judulBuku` = '$judul', `tanggalTerbit` = '$tgl', `jumlahHalaman` = '$jml', `beratBuku` = '$berat', `jenisCover` = '$jenisCover', `sinopsis` = '$sinopsis', `panjang` = '$panjang', `lebar` = '$lebar', `Rating` = '$rating', `idRak` = '$idRak',`Location` = '$location', `specialEdition` = '$specialEdition' WHERE `idBuku` = '$idKomik'";
            $result=mysqli_query($conn,$query);
            $_SESSION["berhasil"]=1;
            echo $query;
        }
        //header ("location:../Gudang/gudangDefault.php");
    }
?>