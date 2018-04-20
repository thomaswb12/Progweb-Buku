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
                $_SESSION['pass'] = $_POST['password'];
                require("getIdentitas.php");
                switch ($_SESSION['idJabatan']){
                    case "KSRR" : header("location:kasir/Kasir - peminjaman/Kasir - peminjaman.php");break;
                }
            }
            $conn->close();
        }
    }
?>