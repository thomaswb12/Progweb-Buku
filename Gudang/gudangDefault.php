<?php
    session_start();
    if(!isset($_SESSION['id'])){
        $_SESSION['error']= 2;
        header("location:http://localhost/project-akhir/Progweb-Buku/");
    }
    else{
        ?>
        <!DOCTYPE html>
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
            <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
        </head>
        <body>
            <header>
                <img src="../logobaru.png" id="logo"/>
                <p class="blue font15" id="welcome">Welcome, <span id="namaUser">Erinda Resha</span> | <a href="../" style="text-decoration:none;"><span id="logOut">Log Out</span></a></p>
                <p id="tanggal" class="blue font15">tanggal</p>
            </header>
            <article>
                <div id="aside">
                    <div id="minimizeOption"> <!--Dipakai ketika media query utk ukuran smartphone-->
                        <h3><span><i class="fas fa-bars" style="color: white;"></i></span></h3>
                        <hr/>
                    </div>
                    <div id="option">
                        
                        <h3 class="blue terpilih" id="aside1"> <span><i class="fas fa-angle-down" id="dropdown"></i><i class="fas fa-angle-right" id="centang"></i></span> Daftar Komik</h3>
                        <hr/>
                        <h3 class="blue" id="asideDetail"><span></span> Detail Komik</h3>
                        <hr/>
                        <h3 class="blue" id="aside2"><span></span> Tambah Komik</h3>
                        <hr/>
                        <h3 class="blue" id="aside3"><span></span> Daftar Penerbit</h3>
                        <hr/>
                        <h3 class="blue" id="aside4"><span></span> Tambah Penerbit</h3>
                        <hr/>
                        <h3 class="blue" id="aside5"><span></span> Daftar Pengarang</h3>
                        <hr/>
                        <h3 class="blue" id="aside6"><span></span> Tambah Pengarang</h3>
                        <hr/>
                        <h3 class="blue" id="aside7"><span></span> Daftar Supplier</h3>
                        <hr/>
                        <h3 class="blue" id="aside8"><span></span> Tambah Supplier</h3>
                        <hr/>
                    </div>
                </div>
                <div id="konten">
                    <!--<?php include "Gudang - Daftar Komik/daftarKomik.php" ?>-->
                </div>
            </article>
            <a href="#logo" id="tombolUp"><i class="fas fa-chevron-circle-up blue"></i></a>
        </body>
        </html>
        <?php
    }
?>

