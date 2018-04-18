<!DOCTYPE html>
<html lang="en">
<head>
    <?php session_start();?>
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
        <img src="../../logobaru.png" id="logo"/>
        <p class="blue font15" id="welcome">Welcome, <span id="namaUser"> <?php echo $_SESSION['nama'];?></span> | <span id="logOut">Log Out</span></p>
        <p id="tanggal" class="blue font15">tanggal</p>
    </header>
    <article>
        <div id="aside">
            <div id="minimizeOption"> <!--Dipakai ketika media query utk ukuran smartphone-->
                <h3><span><i class="fas fa-bars" style="color: white;"></i></span></h3>
                <hr/>
            </div>
            <div id="option">
                <h3 class="blue" id="aside1"> <span><i class="fas fa-angle-right"></i></span> Peminjaman</h3>
                <hr/>
                <h3 class="blue" id="aside2">Pengembalian</h3>
                <hr/>
                <h3 class="blue" id="aside3">Perpanjangan</h3>
                <hr/>
                <h3 class="blue" id="aside4">Daftar komik</h3>
                <hr/>
                <h3 class="blue" id="aside4">Tambah member</h3>
                <hr/>
                <h3 class="blue" id="aside4">Daftar member</h3>
                <hr/>
            </div>
        </div>
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