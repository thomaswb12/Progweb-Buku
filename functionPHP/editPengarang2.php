<?php
    session_start();
    include "pengarang.php";

    //kalau tombol OK dipencet
    if(!empty($_POST["tombolOk"])){
        $id=$_SESSION['idPengarang'];
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
            $query="UPDATE `penulis` SET `namaPenulis` = '$nama', `asal` = '$asal', `foto` = '$foto' WHERE `idPenulis` = '$id'";
            $result=mysqli_query($conn,$query);
            $_SESSION["pengarangEdit"]=1;
        }
        header ("location:../Gudang/gudangDefault.php");
    }
?>