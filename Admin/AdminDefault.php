<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        session_start();
        $_SESSION['control']=0;
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="AdminDefault.css" type="text/css">
    <div id="gantiHead">
        <title>Admin</title>
        <link href="AdminDefault.css" type="text/css" rel="stylesheet">
    </div>
    <script type="text/javascript" src="../jquery-3.3.1.min.js"></script>
    <script src="AdminDefault.js"></script>
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
        <div class="sidebar">
            <ul>
                <li id="menu1"><a href="../User/UserDaftarKomik/UserDaftarKomik.php"><h2>CUSTOMER</h2><i class="fas fa-user"></i> (Menu User)</a></li>
                <li id="menu3"><a href="../HRD/HRDDefault.php"><h2>HRD</h2><i class="fas fa-desktop"></i> (Menu HRD)</a></li>
                <li id="menu4"><a href="../kasir/KasirDefault.php"><h2>KASIR</h2><i class="fas fa-credit-card"></i></i> (Menu Kasir)</a></li>
                <li id="menu5"><a href="../Manager/managerDefault.php"><h2>MANAGER</h2><i class="fas fa-calendar-check"></i> (Menu Manager)</a></li>
                <li id="menu2"><a href="../Gudang/gudangDefault.php"><h2>GUDANG</h2><i class="fas fa-box"></i> (Menu Gudang)</a></li>

            </ul>
        </div>
        <div id="konten">
            
        </div>
    </article>
    <a href="#logo" id="tombolUp"><i class="fas fa-chevron-circle-up blue"></i></a>
</body>
</html>