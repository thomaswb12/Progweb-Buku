<?php
    session_start();
    include "penerbit.php";

    //kalau tombol OK dipencet
    if(!empty($_POST["tombolOk"])){
        $id=getLastIdPenerbit();  //adalah fungsi yang ada di member.php
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
            //untuk cek apakah org itu sudah ada di database (berdasarkan no identitasnya)
            $query = "SELECT * FROM penerbit WHERE NamaPenerbit = '$nama'";
            $hasil = mysqli_query($conn,$query);
            $count = mysqli_num_rows($hasil);
            //kalau ada di DB (sudah jadi member)
            if($count>0){
                $_SESSION["sudahAda"]=1;
            }
            //kalau belum ada di DB -> tambahkan ke DB
            else{
                $query="INSERT INTO `penerbit` (`idPenerbit`, `NamaPenerbit`, `email`, `alamat`, `noTelp`, `foto`) VALUES ('$id', '$nama', '$email', '$noTelp', '$alamat', '$foto');";
                $result=mysqli_query($conn,$query);
                $_SESSION["berhasil"]=1;
            }
        }
        header ("location:../Gudang/gudangDefault.php");
    }
?>