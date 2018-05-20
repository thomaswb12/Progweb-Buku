<?php 
    session_start();
    if(isset($_SESSION["id"]) && isset($_SESSION["control"])){
        if($_SESSION["control"]==3 || $_SESSION["control"]==0){
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
                        <script type="text/javascript" src="../jquery-3.3.1.min.js"></script>
                        <script src="managerDefault.js"></script>
                        <script src="jquery.session.js" ></script>
                        <script defer src="../fontawesome-free-5.0.13\svg-with-js\js\fontawesome-all.min.js"></script>
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