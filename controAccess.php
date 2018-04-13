<?php
    //print_r($_POST);
    if($_POST){
        session_start();
        if($_POST['id'] == "admin" && $_POST['password'] == "admin"){
            header("location:");
        }
        else{
            if($_POST['id'] == "" || $_POST['password'] == ""){
                $_SESSION['error'] = 1;
                header("location:index.php");
            }
        }
    }
?>