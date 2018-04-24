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
            <title>Gudang - Daftar Komik</title>
            <link href="gudang - daftar komik.css" type="text/css" rel="stylesheet">
            <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
            <script src="gudang - daftar komik.js"></script>
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
                        <h3 class="blue" id="aside1"> <span><i class="fas fa-angle-right"></i></span> Daftar Komik</h3>
                        <hr/>
                        <h3 class="blue" id="aside2">Tambah Komik</h3>
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
                        <?php

                           require "../../getDataBuku.php";
                           $data = getBuku();
                           foreach($data as $key=>$value){
                            ?>
                            <div class="infoKomik">
                                <img class="komik" src="miiko19.jpg"/>
                                <h4 class="judul"><?php echo $value['judulBuku']?></h4>
                                <p class="stok">Stok : 5</p>
                                <p class="tersedia">Tersedia : 1</p>
                                <p class="status">Available</p>
                                <img class="new" src="../../label_new.png"/>
                            </div>
                                <?php
                           }
                        ?>
                        
                        <!--<div class="infoKomik">
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
                        </div>-->
                    </div>
                </div>
            </article>
            <a href="#logo" id="tombolUp"><i class="fas fa-chevron-circle-up blue"></i></a>
        </body>
        </html>
        <?php
    }
?>

