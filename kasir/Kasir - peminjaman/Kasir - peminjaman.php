<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        session_start();
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Template</title>
    <link href="Kasir - peminjaman.css" type="text/css" rel="stylesheet">
    <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
    <script src="Kasir - peminjaman.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <?php
            include "../Template/header.php";
        ?>
    </header>
    <article>
        <?php 
            include "../Template/aside.php"
        ?>
        <div id="konten">
            <h1>Peminjaman</h1>
            <div>
                <form action="">
                    <div>
                        <input type="text">
                        <input type="text">
                    </div>
                    <div>
                        <input type="text" name="" id="">
                        <input type="submit">
                    </div>
                </form>
            </div>
        </div>
    </article>
    <a href="#logo" id="tombolUp"><i class="fas fa-chevron-circle-up blue"></i></a>
</body>
</html>