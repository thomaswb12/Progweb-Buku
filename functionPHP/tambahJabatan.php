<?php   
    session_start();
    include "curency.php";
    include "koneksi.php";

    //kalau tombol OK dipencet
    if(!empty($_POST["tombolSave"])){
        $idJabatan=$_POST["idJabatan"];
        $namaJabatan=$_POST["namaJabatan"];
        $tambahGaji=toNumber($_POST["tambahGaji"]);
        $keterangan=$_POST["keterangan"];

        //kalau data belum lengkap
        if($idJabatan==""||$namaJabatan==""||$tambahGaji==""||$keterangan==""){
            $_SESSION["belumLengkap"]=1;
        }
        //kalau data sudah lengkap
        else{
           //untuk cek apakah id jabatan itu sudah ada di database
           $queryId = "SELECT * FROM jabatankaryawan WHERE idJabatan = '$idJabatan'";
           $hasilId = mysqli_query($conn,$queryId);
           $countId = mysqli_num_rows($hasilId);
           //untuk cek apakah nama jabatan itu sudah ada di database
           $queryNama = "SELECT * FROM jabatankaryawan WHERE namaJabatan = '$namaJabatan'";
           $hasilNama = mysqli_query($conn,$queryNama);
           $countNama = mysqli_num_rows($hasilNama);

           //kalau id ada di DB
           if($countId>0){
               $_SESSION["idSudahAda"]=1;
           }
           //kalau nama ada di DB
           else if($countNama>0){
                $_SESSION["namaSudahAda"]=1;
            }
           //kalau belum ada di DB -> tambahkan ke DB
           else{               
                $query="INSERT INTO `jabatankaryawan` (`idJabatan`, `namaJabatan`, `gaji`, `keterangan`) VALUES ('$idJabatan', '$namaJabatan', '$tambahGaji', '$keterangan');";
                $result=mysqli_query($conn,$query);
                $_SESSION["berhasil"]=1;
           }
        }
        header ("location:../HRD/HRDDefault.php");
    }
?>