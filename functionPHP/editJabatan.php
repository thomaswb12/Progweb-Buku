<?php
    session_start();
    include "koneksi.php";
    include "curency.php";

    //kalau tombol save dipencet
    if(!empty($_POST["tombolSave"])){
        //masukkan ke variabel
        $idJabatan=$_POST["idJabatanCadangan"];
        $namaJabatan=$_POST["namaJabatan"];
        $gaji=toNumber($_POST["gaji"]);
        $keterangan=$_POST["keterangan"];

        //kalau belum pilih jabatan
        if($idJabatan==""){
            $_SESSION["belumPilih"]=1;
        }

        //kalau data belum lengkap
        else if($namaJabatan==""||$gaji==""||$keterangan ==""){
            $_SESSION["belumLengkap"]=1;
        }
        //kalau data sudah lengkap
        else{
            //untuk ganti semuanya berdasar id-nya
            $query = "UPDATE jabatanKaryawan SET namaJabatan='$namaJabatan',gaji='$gaji',keterangan='$keterangan' WHERE idJabatan='$idJabatan'";
            $hasil = mysqli_query($conn,$query);
            $count = mysqli_affected_rows($conn);
            if($count==1){
                $_SESSION["berhasil"]=1;
            }
            else if ($count==0){
                $_SESSION["tidakBerubah"]=1;
            }
        }
        header ("location:../HRD/HRDDefault.php");
    }

    //kalau tombol delete dipencet //under maintenance
    if(!empty($_POST["tombolDelete"])){
        ?>
        <script>
            if(!confirm("Apakah Anda yakin akan menghapus Jabatan ini?")){
                document.location.href = '../HRD/HRDDefault.php';
            }
            else{
                <?php
                $idJabatan=$_POST["idJabatanCadangan"];
                if($idJabatan==""){
                    $_SESSION["belumPilih"]=1;
                }
                else{
                    $query = "DELETE FROM `jabatankaryawan` WHERE `jabatankaryawan`.`idJabatan` = '$idJabatan'";
                    $hasil = mysqli_query($conn,$query);
                    $count = mysqli_affected_rows($conn);
                    if($count==1){
                        $_SESSION["hapusBerhasil"]=1;
                    }
                    else if ($count==0){
                        $_SESSION["hapusGagal"]=1;
                    }
      //             header ("location:../HRD/HRDDefault.php");
                }
                ?>
            }
        </script>
        <?php
        
    }
?>