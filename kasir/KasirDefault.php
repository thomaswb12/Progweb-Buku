<?php 
    session_start();
    if(isset($_SESSION["id"]) && isset($_SESSION["control"])){
        if($_SESSION["control"]==2){
            echo '<!DOCTYPE html>
            <html lang="en">
            <head>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <meta http-equiv="X-UA-Compatible" content="ie=edge">
                <link rel="stylesheet" href="KasirDefault.css" type="text/css">
                <div id="gantiHead">
                    <title>Kasir - Peminjaman</title>
                    <link href="Kasir - peminjaman/Kasir - peminjaman.css" type="text/css" rel="stylesheet">
                </div>
                <script type="text/javascript" src="../jquery-3.3.1.min.js"></script>
                <script src="KasirDefault.js"></script>
                <script src="jquery.session.js" ></script>
                <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">
            </head>
            <body>
                <header>';include "Template/header.php";
               echo '</header>
                <article>';include "Template/aside.php";
                echo    '<div id="konten">
                    </div>
                </article>
                <a href="#logo" id="tombolUp"><i class="fas fa-chevron-circle-up blue"></i></a>
            </body>
            </html>';
        }
        else{
            $_SESSION['error'] = 2;
            header("location:../index.php");
        }
    }
    else{
        $_SESSION['error'] = 2;
        header("location:../index.php");
    }
?>