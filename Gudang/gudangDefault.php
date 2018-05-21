<?php 
    session_start();
    if(isset($_SESSION["id"]) && isset($_SESSION["control"])){
        if($_SESSION["control"]==5 || $_SESSION["control"]==0){
            echo '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <link href="gudangDefault.css" type="text/css" rel="stylesheet">
            <div id="gantiHead">
                <title>Gudang - Daftar Komik</title>
                <link href="gudangDefault.css" type="text/css" rel="stylesheet">
            </div>
            <script type="text/javascript" src="../jquery-3.3.1.min.js"></script>
            <script src="jquery.session.js"></script>
            <script src="gudangDefault.js"></script>
            <script defer src="../fontawesome-free-5.0.13\svg-with-js\js\fontawesome-all.min.js"></script>
        </head>
        <body>
            <header>';
                include "template/header.php";
            echo '
            </header>
            <article>
                <div id="aside">
                    <div id="minimizeOption"> <!--Dipakai ketika media query utk ukuran smartphone-->
                        <h3><span><i class="fas fa-bars" style="color: white;"></i></span></h3>
                        <hr/>
                    </div>
                    <div id="option">';
                    include "template/aside.php";
                echo '    </div>
                </div>
                <div id="konten">
                </div>
            </article>
            <a href="#logo" id="tombolUp"><i class="fas fa-chevron-circle-up blue"></i></a>
        </body>
        </html>';
    }
    else{
        $_SESSION['error'] = 5;
        header("location:../index.php");
    }
}
else{
    $_SESSION['error'] = 5;
    header("location:../index.php");
}
?>