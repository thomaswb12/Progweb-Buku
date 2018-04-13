<?php
    print_r($_POST);
    /*if($_POST){
        session_start();
        if($_POST['id'] == "admin" && $_POST['password'] == "admin"){
            header("location:");
        }
        else{
            $servername = "localhost";
            $username = "username";
            $password = "password";

            // Create connection
            $conn = new mysqli($servername, $username, $password);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            echo "Connected successfully";
        }
    }
    else{
        header("location:index.html");
    }*/
?>