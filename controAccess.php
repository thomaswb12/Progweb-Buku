<?php
    //print_r($_POST);
    if($_POST){//untuk mengecek apakah sudah ada yg post
        session_start();
        if($_POST['id'] == "admin" && $_POST['password'] == "admin"){ //untuk login ke page user
            header("location:User/User - Daftar Komik/User - daftar komik.html");//untuk pindah ke page tersebuh
        }
        else{
            if($_POST['id'] == "" || $_POST['password'] == ""){
                $_SESSION['error'] = 1;
                header("location:index.php");
            }
            else{
                $_SESSION['id'] = $_POST['id'];
                require("koneksi.php");
                $sql =  " SELECT idJabatan FROM karyawan where idKaryawan = '".$_POST['id']."' and pass = '".hash('sha256',$_POST['password'])."'";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        switch ($row["idJabatan"]){
                            case "KSRR" : header("location:kasir/Kasir - peminjaman/Kasir - peminjaman.php");break;
                        }
                    }
                } 
                else {
                    $_SESSION['error'] = 1;
                    header("location:index.php");
                }
            }
            $conn->close();
        }
    }
?>