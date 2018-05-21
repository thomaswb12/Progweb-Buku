<?php   
    session_start();
    include "koneksi.php";

    //kalau tombol OK dipencet
    if(!empty($_POST["tombolSave"])){
        $idKaryawan=$_POST["idKaryawan"];
        $namaKaryawan=$_POST["namaKaryawan"];
        $jabatan=$_POST["selectJabatan"];
        $email=$_POST["email"];
        $telepon=$_POST["telepon"];
        $alamat=$_POST["alamat"];
        $pass1=$_POST["pass1"];
        $pass2=$_POST["pass2"];

        $foto = "../images/karyawan/".$idKaryawan.".jpg";
        move_uploaded_file($_FILES['gambar']['tmp_name'], $foto);

        //kalau data belum lengkap
        if($idKaryawan==""||$namaKaryawan==""||$jabatan==""||$email==""||$telepon==""||$alamat==""){
            $_SESSION["belumLengkap"]=1;
        }
        //kalau data sudah lengkap
        else{       
                $pass=hash('sha256',$pass1);
                $query="UPDATE karyawan SET nama='$namaKaryawan', email='$email', noTelp='$telepon', idJabatan='$jabatan', foto=$foto WHERE idKaryawan='$idKaryawan'";
                $result=mysqli_query($conn,$query);
                $_SESSION["berhasil"]=1;

        }
        header ("location:../HRD/HRDDefault.php");
    }
    header ("location:../HRD/HRDDefault.php");
?>