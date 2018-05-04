<?php
    session_start();
    include "member.php";

    if(!empty($_POST["tombolOk"])){
        $id=getLastIdMember();
        $nama=$_POST["namaMember"];
        $noIdentitas=$_POST["noIdentitas"];
        $gender=$_POST["gender"];
        if($gender=="Perempuan") $gender="Wanita";
        else if($gender=="Laki-laki") $gender="Pria";        
        $lahir=$_POST["tanggalLahir"];
        $email=$_POST["email"];
        $noTelp=$_POST["noTelp"];
        $alamat=$_POST["alamat"];
        if($nama==""||$noIdentitas==""||$lahir==""||$email==""||$noTelp==""||$alamat==""){
            $_SESSION["belumLengkap"]=1;
        }
        else{
            $query = "SELECT * FROM member WHERE idIdentitas = '$noIdentitas'";
            $hasil = mysqli_query($conn,$query);
            $count = mysqli_num_rows($hasil);
            if($count>0){
                $_SESSION["sudahJadiMember"]=1;
            }
            else{
                $query="INSERT INTO `member` (`id`, `nama`, `alamat`, `birtday`, `saldo`, `noTelp`, `idIdentitas`, `gender`, `email`) VALUES ('$id', '$nama', '$alamat', '$lahir', '0', '$noTelp', '$noIdentitas', '$gender', '$email');";
                $result=mysqli_query($conn,$query);
                $_SESSION["berhasil"]=1;
            }
        }
        header ("location:../kasir/KasirDefault.php");
    }
?>