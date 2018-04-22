<?php
    session_start();
    if(!isset($_SESSION['id'])){
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
            <title>User - Daftar Komik</title>
            <link href="userdaftarkomik.css" type="text/css" rel="stylesheet">
            <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
            <script src="userdaftarkomik.js"></script>
            <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
        </head>
        <body>
            <header>
                <img src="../../logobaru.png" id="logo"/>
                <p class="blue font15" id="welcome">Welcome, <span id="namaUser">our customer</span> | <span id="logOut">Log Out</span></p>
                <p id="tanggal" class="blue font15">tanggal</p>
            </header>
            <article>
                <div id="judul">
                    <h1>Daftar Komik</h1>

                    <div id="sorting">
                        <label id="labelSortBy" class="blue font15">Sort by :</label>
                        <br/>
                        <select id="selectSortBy" class="font15">
                            <option>Terbaru</option>
                            <option>Terpopuler</option>
                            <option>Stok terbanyak</option>
                        </select>
                    </div>

                    <div id="searching">
                        <label id="labelSearchBy" class="blue font15">Search by :</label>
                        <br/>
                        <select id="selectSearchBy" class="font15">
                            <option>Judul</option>
                            <option>Pengarang</option>
                            <option>Penerbit</option>
                        </select>
                        <div id="searchBox">
                            <input type="text"  placeholder="Search" class="font15" id="inputSearchBy" name="inputSearchBy"/>
                            <i class="fa fa-search blue font15"></i>
                        </div>
                    </div>
                </div>
                <div id="daftarKomik" class="font15">
                    <div class="infoKomik">
                        <img class="komik" src="miiko19.jpg"/>
                        <h4 class="judul">Hai Miiko! Vol.19</h4>
                        <p class="stok">Stok : 5</p>
                        <p class="tersedia">Tersedia : 1</p>
                        <p class="status">Available</p>
                    </div>
                    <div class="infoKomik">
                        <img class="komik" src="miiko19.jpg"/>
                        <h4 class="judul">Hai Miiko! Vol.19</h4>
                        <p class="stok">Stok : 5</p>
                        <p class="tersedia">Tersedia : 1</p>
                        <p class="status">Available</p>
                        <img class="new" src="../../label_new.png"/>
                    </div>
                    <div class="infoKomik favorit">
                        <img class="komik" src="miiko19.jpg"/>
                        <h4 class="judul">Hai Miiko! Vol.19</h4>
                        <p class="stok">Stok : 5</p>
                        <p class="tersedia">Tersedia : 1</p>
                        <p class="status">Available</p>
                    </div>
                    <div class="infoKomik">
                        <img class="komik" src="miiko19.jpg"/>
                        <h4 class="judul">Hai Miiko! Vol.19</h4>
                        <p class="stok">Stok : 5</p>
                        <p class="tersedia">Tersedia : 1</p>
                        <p class="status">Available</p>
                    </div>
                    <div class="infoKomik">
                        <img class="komik" src="miiko19.jpg"/>
                        <h4 class="judul">Hai Miiko! Vol.19</h4>
                        <p class="stok">Stok : 5</p>
                        <p class="tersedia">Tersedia : 1</p>
                        <p class="status">Available</p>
                    </div>
                    <div class="infoKomik specialEdition">
                        <img class="komik" src="miiko19.jpg"/>
                        <h4 class="judul">Hai Miiko! Vol.19</h4>
                        <p class="stok">Stok : 5</p>
                        <p class="tersedia">Tersedia : 1</p>
                        <p class="status">Available</p>
                    </div>
                    <div class="infoKomik favorit specialEdition">
                        <img class="komik" src="miiko19.jpg"/>
                        <h4 class="judul">Hai Miiko! Vol.19</h4>
                        <p class="stok">Stok : 5</p>
                        <p class="tersedia">Tersedia : 1</p>
                        <p class="status">Available</p>
                    </div>
                    <div class="infoKomik">
                        <img class="komik" src="miiko19.jpg"/>
                        <h4 class="judul">Hai Miiko! Vol.19</h4>
                        <p class="stok">Stok : 5</p>
                        <p class="tersedia">Tersedia : 1</p>
                        <p class="status">Available</p>
                    </div>
                </div>
            </article>
            <a href="#logo" id="tombolUp"><i class="fas fa-chevron-circle-up blue"></i></a>
        </body>
        </html>
        <?php
    }
?>

