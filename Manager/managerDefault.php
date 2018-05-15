<?php 
    session_start();
    if(isset($_SESSION["id"]) && isset($_SESSION["control"])){
        if($_SESSION["control"]==3){
            echo '<!DOCTYPE html>
                    <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <div id="gantiHead">
                            <?php include "managerDaftarPeminjaman/headManagerDaftarPeminjaman.php"?>
                        </div>
                        <link href="managerDefault.css" type="text/css" rel="stylesheet">
                        <link href="managerdaftarpeminjaman.css" type="text/css" rel="stylesheet">
                        <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
                        <script src="managerDefault.js"></script>
                        <script src="jquery.session.js" ></script>
                        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
                    </head>
                    <body>
                    <header>';
                        include "template/header.php";
                    echo '</header>
                    <article>
                        <div id="aside">';
                            include "template/aside.php";
                    echo '</div>
                        <div id="konten">';
                            include "managerDaftarPeminjaman/managerDaftarPeminjaman.php";
                    echo '</div>
                    </article>
                    <a href="#logo" id="tombolUp"><i class="fas fa-chevron-circle-up blue"></i></a>
                </body>
                </html>';
        }
        else{
            $_SESSION['error'] = 3;
            header("location:../index.php");
        }
    }
    else{
        $_SESSION['error'] = 3;
        header("location:../index.php");
    }
?>