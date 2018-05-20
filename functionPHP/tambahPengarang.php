<?php
    session_start();
    include "pengarang.php";

    //kalau tombol OK dipencet
    if(!empty($_POST["tombolOk"])){
        $id=getLastIdPengarang();  //adalah fungsi yang ada di member.php
        //masukkan ke variabel
        $nama = $_POST["namaPengarang"];
        $asal = $_POST["asal"];
        $foto = "../images/pengarang/".$_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], $foto);
        if($nama == "" || $asal == ""){
            $_SESSION["belumLengkap"]=1;
        }
        //kalau data sudah lengkap
        else{
            //untuk cek apakah org itu sudah ada di database (berdasarkan no identitasnya)
            $query = "SELECT * FROM penulis WHERE namaPenulis = '$nama'";
            $hasil = mysqli_query($conn,$query);
            $count = mysqli_num_rows($hasil);
            //kalau ada di DB (sudah jadi member)
            if($count>0){
                $_SESSION["sudahAda"]=1;
            }
            //kalau belum ada di DB -> tambahkan ke DB
            else{
                $query="INSERT INTO `penulis` (`idPenulis`, `namaPenulis`, `asal`, `foto`) VALUES ('$id', '$nama', '$asal', '$foto');";
                $result=mysqli_query($conn,$query);
                $_SESSION["berhasil"]=1;
            }
        }
        header ("location:../Gudang/gudangDefault.php");
    }
?>