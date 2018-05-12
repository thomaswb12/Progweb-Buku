<?php
    session_start();
    include "komik.php";

    //kalau tombol OK dipencet
    if(!empty($_POST["tombolOk"])){
        $id=getLastIdKomik();  //adalah fungsi yang ada di member.php
        //masukkan ke variabel
        $judul = $_POST['judul'];
        $genre = $_POST['genre'];
        $rating = $_POST['rating'];
        $sinopsis = $_POST['sinopsis'];
        $penulis = $_POST['penulis'];
        $penerbit = $_POST['penerbit'];
        $tgl = $_POST['tanggalTerbit'];
        $jml = $_POST['jumlahHalaman'];
        $berat = $_POST['beratKomik'];
        $cover = $_POST['jenisCover'];
        $panjang = $_POST['panjang'];
        $lebar = $_POST['lebar'];

        //kalau data belum lengkap
        if($njudul==""||$sinopsis==""||$rating==""||$penulis==""||$penerbit==""||$tgl==""||$jml==""||$berat==""||$cover==""||$panjang==""||$lebar==""){
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
                $query="INSERT INTO `buku` (`idBuku`, `judulBuku`, `tanggalTerbit`, `jumlahHalaman`, `beratBuku`, `jenisCover`, `sinopsis`, `panjang`, `lebar`,`Dipinjam`,`idPenerbit`,`idPenulis`,`Rating`,`idRak`,`jumlahEksemplar`,`Location`,`Available`,`specialEdition`) VALUES ('$id', '$judul', '$tgl', '$jml', 'berat', '$cover', '$sinopsis', '$panjang', '$lebar', '0', 'idPenerbit', 'idPenulis', '$rating', '$idRak', '$jml', '$loc', '1', '$specialEdition');";
                $result=mysqli_query($conn,$query);
                $_SESSION["berhasil"]=1;
            }
        }
        header ("location:../Gudang/gudangDefault.php");
    }
?>