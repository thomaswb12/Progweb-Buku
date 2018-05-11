<?php
    //print_r($_POST);
    if($_POST){//untuk mengecek apakah sudah ada yg post
        session_start();
        if($_POST['id'] == "admin" && $_POST['password'] == "admin"){ //untuk login ke page user
            $_SESSION['id'] = $_POST['id'];
            $_SESSION['control'] = 1;
            header("location:../User/UserDaftarKomik/UserDaftarKomik.php");//untuk pindah ke page tersebut
        }
        else{
            if($_POST['id'] == "" || $_POST['password'] == ""){
                $_SESSION['error'] = 1;
                header("location:../index.php");
            }
            else{
                $_SESSION['id'] = $_POST['id'];
                $_SESSION['pass'] = $_POST['password'];
                require("getIdentitas.php");
                switch ($_SESSION['idJabatan']){
                    case "KSRR" :   $_SESSION['id'] = $_POST['id'];
                                    $_SESSION['control'] = 2;
                                    header("location:../kasir/KasirDefault.php");break;
                    case "MNGR" :   $_SESSION['id'] = $_POST['id'];
                                    $_SESSION['control'] = 3;
                                    header("location:../Manager/managerDefault.php");break;
                    case "HRDD" :   $_SESSION['id'] = $_POST['id'];
                                    $_SESSION['control'] = 4;
                                    header("location:../HRD/HRDDefault.php");break;
                }
            }
            $conn->close();
        }
    }
?>