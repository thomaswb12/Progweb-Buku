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
        $gambar=$_FILES["gambar"]['tmp_name'];

        $foto = "../images/karyawan/".$idKaryawan.".jpg";
        move_uploaded_file($_FILES['gambar']['tmp_name'], $foto);

        //kalau pass beda
        if($pass1!=$pass2){
            $_SESSION["beda"]=1;
        }

        //kalau data belum lengkap
        if($idKaryawan==""||$namaKaryawan==""||$jabatan==""||$email==""||$telepon==""||$alamat==""||$pass1==""||$pass2==""){
            $_SESSION["belumLengkap"]=1;
        }
        //kalau data sudah lengkap
        else{       
                $pass=hash('sha256',$pass1);
                $query="INSERT INTO `karyawan` (`idKaryawan`, `nama`, `email`, `noTelp`, `idJabatan`, `pass`, `foto`) VALUES ('$idKaryawan', '$namaKaryawan', '$email', '$telepon', '$jabatan', '$pass', '$foto');";
                $result=mysqli_query($conn,$query);
                $_SESSION["berhasil"]=1;

        }
        header ("location:../HRD/HRDDefault.php");
    }
?>