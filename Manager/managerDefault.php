<!DOCTYPE html>
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
    <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <?php include "template/header.php"?>
    </header>
    <article>
        <div id="aside">
            <?php include "template/aside.php"?>
        </div>
        <div id="konten">
            <?php include "managerDaftarPeminjaman/managerDaftarPeminjaman.php"?>
        </div>
    </article>
    <a href="#logo" id="tombolUp"><i class="fas fa-chevron-circle-up blue"></i></a>
</body>
</html>