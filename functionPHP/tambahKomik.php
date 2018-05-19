<?php
    session_start();
    include "komik.php";

    //kalau tombol OK dipencet
    if(!empty($_POST["tombolOk"])){
        $id=getLastIdKomik();  //adalah fungsi yang ada di member.php
        //masukkan ke variabel
        $judul = $_POST['judul'];
        $sinopsis = $_POST['sinopsis'];
        $penulis = $_POST['penulis'];
        $penerbit = $_POST['penerbit'];
        $tgl = $_POST['tanggalTerbit'];
        $jml = $_POST['jumlahHalaman'];
        $berat = $_POST['beratKomik'];
        $panjang = $_POST['panjang'];
        $lebar = $_POST['lebar'];
        switch ($_POST['genre']) {
            case 1: $genre = 'Action';break;
            case 2: $genre = 'Romance';break;
            case 3: $genre = 'Fantasi';break;
            case 4: $genre = 'Comedy';break;
            case 5: $genre = 'Thrille';break;
            case 6: $genre = 'Horor';break;
            case 7: $genre = 'Sci-fi';break;
        }
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
        if($judul==""||$sinopsis==""||$rating==""||$penulis==""||$penerbit==""||$tgl==""||$jml==""||$berat==""||$cover==""||$panjang==""||$lebar==""){
            $_SESSION["belumLengkap"]=1;
        }
        //kalau data sudah lengkap
        else{
            //untuk cek apakah org itu sudah ada di database (berdasarkan no identitasnya)
            $query = "SELECT * FROM buku WHERE judulBuku = '$judul'";
            $hasil = mysqli_query($conn,$query);
            $count = mysqli_num_rows($hasil);
            //kalau ada di DB (komik sudah ada)
            if($count>0){
                $_SESSION["sudahAda"]=1;
            }
            //kalau belum ada di DB -> tambahkan ke DB
            else{
                $query = "SELECT idPenerbit FROM penerbit WHERE NamaPenerbit = '$penerbit'";
                $idPenerbit = mysqli_query($conn,$query);
                $count = mysqli_num_rows($idPenerbit);
                if($count == 0){
                    $_SESSION["penerbit"] = 1;
                }
                else{
                    $query="INSERT INTO `buku` (`idBuku`, `judulBuku`, `tanggalTerbit`, `jumlahHalaman`, `beratBuku`, `jenisCover`, `sinopsis`, `panjang`, `lebar`,`Dipinjam`,`idPenerbit`,`idPenulis`,`Rating`,`idRak`,`jumlahEksemplar`,`Location`,`Available`,`specialEdition`) VALUES ('$id', '$judul', '$tgl', '$jml', 'berat', '$cover', '$sinopsis', '$panjang', '$lebar', '0', '$idPenerbit', '$idPenulis', '$rating', '$idRak', '$jml', '$loc', '1', '$specialEdition');";
                    $result=mysqli_query($conn,$query);
                    $_SESSION["berhasil"]=1;
                }
            }
        }
        header ("location:../Gudang/gudangDefault.php");
    }
?>