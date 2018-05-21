<?php
    session_start();
    include "komik.php";

    //kalau tombol OK dipencet
    if(!empty($_POST["tombolOk"])){
        $id=getLastIdKomik();  //adalah fungsi yang ada di member.php
        //masukkan ke variabel
        $judul = $_POST['judul'];
        $sinopsis = $_POST['sinopsis'];
        $idPengarang = $_POST['idPengarang'];
        $idPenerbit = $_POST['idPenerbit'];
        $tgl = $_POST['tanggalTerbit'];
        $jml = $_POST['jumlahHalaman'];
        $berat = $_POST['beratKomik'].'.0';
        $panjang = $_POST['panjang'];
        $lebar = $_POST['lebar'];
        $foto = "../images/buku/".$_FILES['gambar']['name'];
        $location = "images/buku/".$_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], $foto);
        $genre=array();
        if(!empty($_POST['listgenre'])){
            foreach($_POST['listgenre'] as $selected){
                $genre[]=$selected;
            }
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
        if($judul==""||$sinopsis==""||$rating==""||$idPengarang==""||$idPenerbit==""||$tgl==""||$jml==""||$berat==""||$jenisCover==""||$panjang==""||$lebar==""||$rating==""||$specialEdition==""||$jenisCover==""){
            $_SESSION["belumLengkap"]=1;
        }
        //kalau data sudah lengkap
        else{
            //untuk cek apakah org itu sudah ada di database (berdasarkan no identitasnya)
            $query = "SELECT * FROM buku WHERE judulBuku = '$judul'";
            $hasil = mysqli_query($conn,$query);
            $count = mysqli_num_rows($hasil);

            $query = "SELECT * FROM penerbit WHERE idPenerbit = '$idPenerbit'";
            $hasilPenerbit = mysqli_query($conn,$query);
            $cekPenerbit = mysqli_num_rows($hasilPenerbit);

            $query = "SELECT * FROM penulis WHERE idPenulis = '$idPengarang'";
            $hasilPengarang = mysqli_query($conn,$query);
            $cekPengarang = mysqli_num_rows($hasilPengarang);
            //kalau ada di DB (komik sudah ada)
            if($count>0){
                $_SESSION["sudahAda"]=1;
            }
            else if($cekPenerbit == 0){
                $_SESSION["penerbit"]=1;
            }
            else if($cekPengarang == 0){
                $_SESSION["pengarang"]=1;
            }
            //kalau belum ada di DB -> tambahkan ke DB
            else{
                $idRak = "CC000001";
                $satu = 1;
                $nol = 0;
                $query="INSERT INTO `buku` (`idBuku`, `judulBuku`, `tanggalTerbit`, `jumlahHalaman`, `beratBuku`, `jenisCover`, `sinopsis`, `panjang`, `lebar`,`Dipinjam`,`idPenerbit`,`idPenulis`,`Rating`,`idRak`,`jumlahEksemplar`,`Location`,`Available`,`specialEdition`) VALUES ('$id', '$judul', '$tgl', '$jml', '$berat', '$jenisCover', '$sinopsis', '$panjang', '$lebar', '$nol', '$idPenerbit', '$idPengarang', '$rating', '$idRak', '$satu', '$location', '1', '$specialEdition');";
                $result=mysqli_query($conn,$query);
                //echo $query;
                foreach($genre as $selected){
                    $query="INSERT INTO `genrebuku` (`idGenre`, `idBuku`) VALUES ('$selected', '$id');";
                    $result=mysqli_query($conn,$query);
                }
                $_SESSION["berhasil"]=1;
            }
        }
        header ("location:../Gudang/gudangDefault.php");
    }
?>