<?php
    session_start();
    include "penerbit.php";

    //kalau tombol OK dipencet
    if(!empty($_POST["tombolOk"])){
        $id=$_SESSION['idPenerbit'];  //adalah fungsi yang ada di member.php
        //masukkan ke variabel
        $nama=$_POST["namaPenerbit"];
        $email = $_POST["email"];
        $noTelp = $_POST["noTelp"];
        $alamat = $_POST["alamat"];
        $foto = "../images/penerbit/".$_FILES['gambar']['name'];
        move_uploaded_file($_FILES['gambar']['tmp_name'], $foto);
        if($nama=="" || $email == "" || $noTelp == "" || $alamat == ""){
            $_SESSION["belumLengkap"]=1;
        }
        //kalau data sudah lengkap
        else{
            $query="UPDATE `penerbit` SET `NamaPenerbit` = '$nama', `email` = '$email', `alamat` = '$alamat', `noTelp` = '$noTelp', `foto` = '$foto' WHERE `idPenerbit` = '$id'";
            $result=mysqli_query($conn,$query);
            $_SESSION["penerbitEdit"]=1;
        }
        header ("location:../Gudang/gudangDefault.php");
    }
?>