<?php
    //print_r($_POST);
    if($_POST){
        session_start();
        if($_POST['id'] == "admin" && $_POST['password'] == "admin"){
            header("location:");
        }
        else{
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "progweb";

            // Create connection
            $conn = new mysqli($servername, $username, $password, $dbname);
            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            
            $sql =  " SELECT * FROM karyawan where idKaryawan = '".$_POST['id']."' and pass = '".$_POST['password']."'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                echo "success";
            } 
            else {
                echo "0 results";
            }
            /*if($_POST['id'] == "" || $_POST['password'] == ""){
                $_SESSION['error'] = 1;
                header("location:index.php");
            }*/
        }
    }
?>