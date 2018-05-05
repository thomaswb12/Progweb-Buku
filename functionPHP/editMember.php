<?php
    session_start();
    include "member.php";

    //kalau tombol OK dipencet
    if(!empty($_POST["tombolDetailMember"])){
        //masukkan ke variabel
        $id=$_POST["popupIdMemberDummy"];
        $nama=$_POST["popupNamaMember"];
        $noIdentitas=$_POST["popupNoIdentitas"];
        $gender=$_POST["popupGender"];
            if($gender=="Perempuan") $gender="Wanita";
            else if($gender=="Laki-laki") $gender="Pria";        
        $lahir=$_POST["popupTanggalLahir"];
        $email=$_POST["popupEmail"];
        $noTelp=$_POST["popupTelepon"];
        $alamat=$_POST["popupAlamat"];
        //kalau data belum lengkap
        if($nama==""||$noIdentitas==""||$lahir=="--"||$email==""||$noTelp==""||$alamat==""){
            $_SESSION["belumLengkap"]=1;
        }
        //kalau data sudah lengkap
        else{
            //untuk ganti semuanya berdasar id-nya
            $query = "UPDATE member SET nama='$nama',alamat='$alamat',birtday='$lahir',noTelp='$noTelp',idIdentitas='$noIdentitas',gender='$gender',email='$email' WHERE id='$id'";
            $hasil = mysqli_query($conn,$query);
            $count = mysqli_affected_rows($conn);
            echo $count;
            if($count==1){
                $_SESSION["berhasil"]=1;
            }
            else if ($count==0){
                $_SESSION["Gagal diedit :("]=1;
            }
/*            $query = "SELECT * FROM member WHERE idIdentitas = '$noIdentitas'";
            $hasil = mysqli_query($conn,$query);
            $count = mysqli_num_rows($hasil);
            //kalau ada di DB (sudah jadi member)
            if($count>0){
                $_SESSION["sudahJadiMember"]=1;
            }
            //kalau belum ada di DB -> tambahkan ke DB
            else{
                $query="INSERT INTO `member` (`id`, `nama`, `alamat`, `birtday`, `saldo`, `noTelp`, `idIdentitas`, `gender`, `email`) VALUES ('$id', '$nama', '$alamat', '$lahir', '0', '$noTelp', '$noIdentitas', '$gender', '$email');";
                $result=mysqli_query($conn,$query);
                $_SESSION["berhasil"]=1;
            }
*/       }
        header ("location:../kasir/KasirDefault.php");
    }
?>