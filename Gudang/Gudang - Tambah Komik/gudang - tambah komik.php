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
            <title>Gudang - Tambah Komik</title>
            <link href="gudang - tambah komik.css" type="text/css" rel="stylesheet">
            <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
            <script src="gudang - tambah komik.js"></script>
            <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
        </head>
        <body>
            <header>
                <img src="../../logobaru.png" id="logo"/>
                <p class="blue font15" id="welcome">Welcome, <span id="namaUser">our customer</span> | <span id="logOut">Log Out</span></p>
                <p id="tanggal" class="blue font15">tanggal</p>
            </header>
            <article>
                <div id="aside">
                    <div id="minimizeOption"> <!--Dipakai ketika media query utk ukuran smartphone-->
                        <h3><span><i class="fas fa-bars" style="color: white;"></i></span></h3>
                        <hr/>
                    </div>
                    <div id="option">
                        <h3 class="blue" id="aside1">Daftar Komik</h3>
                        <hr/>
                        <h3 class="blue" id="aside2"><span><i class="fas fa-angle-right"></i></span> Tambah Komik</h3>
                        <hr/>
                        <h3 class="blue" id="aside3">Daftar Penerbit</h3>
                        <hr/>
                        <h3 class="blue" id="aside4">Tambah Penerbit</h3>
                        <hr/>
                        <h3 class="blue" id="aside5">Daftar Pengarang</h3>
                        <hr/>
                        <h3 class="blue" id="aside6">Tambah Pengarang</h3>
                        <hr/>
                        <h3 class="blue" id="aside7">Daftar Supplier</h3>
                        <hr/>
                        <h3 class="blue" id="aside8">Tambah Supplier</h3>
                        <hr/>
                    </div>
                </div>
                <div id="konten">
                    <div id="judul">
                        <h1>Tambah Komik</h1>
                    </div>
                    <div id="kiri">
                        <label>Gambar</label><br/>
                        <input type="file" id="gambar" name="gambar"/><br/>

                        <label>Sinopsis</label><br/>
                        <input type="text" id="sinopsis" name="sinopsis"/><br/>
                    </div>

                    <div id="kanan">
                        <label>ID Komik</label><br/>
                        <input type="text" id="idKomik" name="idKomik"/><br/>

                        <label>Judul</label><br/>
                        <input type="text" id="judul" name="judul"/><br/>

                        <label>Penulis</label><br/>
                        <input type="text" id="penulis" name="penulis"/><br/>

                        <label>Penerbit</label><br/>
                        <input type="text" id="penerbit" name="penerbit"/><br/>

                        <label>Tanggal Terbit</label><br/>
                        <input type="text" id="tanggalTerbit" name="tanggalTerbit"/><br/>

                        <label>Jumlah Halaman</label><br/>
                        <input type="text" id="jumlahHalaman" name="jumlahHalaman"/><br/>

                        <label>Berat Buku</label><br/>
                        <input type="text" id="beratBuku" name="beratBuku"/><br/>

                        <label>Jenis Cover</label><br/>
                        <input type="text" id="jenisCover" name="jenisCover"/><br/>

                        <label>Dimensi</label><br/>
                        <input type="text" id="dimensi" name="dimensi"/><br/>

                        <label>Text</label><br/>
                        <input type="text" id="text" name="text"/><br/>

                        <label>Genre</label><br/>
                        <input type="text" id="genre" name="genre"/><br/>

                        <label>Rating</label><br/>
                        <input type="text" id="rating" name="rating"/><br/>
                    </div>
                </div>
            </article>
            <a href="#logo" id="tombolUp"><i class="fas fa-chevron-circle-up blue"></i></a>
        </body>
        </html>
        <?php
    }
?>

