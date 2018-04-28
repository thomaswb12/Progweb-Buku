<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        session_start();
        if(isset($_SESSION["position"])){
            
        }
    ?>
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
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <?php
            include "Template/header.php";
        ?>
    </header>
    <article>
        <?php 
            include "Template/aside.php"
        ?>
        <div id="konten">
            <?php include "Kasir - peminjaman/KontenKasirPeminjaman.php"?>
        </div>
    </article>
    <a href="#logo" id="tombolUp"><i class="fas fa-chevron-circle-up blue"></i></a>
</body>
</html>