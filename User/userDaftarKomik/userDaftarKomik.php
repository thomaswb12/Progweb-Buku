<?php
    session_start();
    if($_SESSION['id'] != "admin" || $_SESSION['control'] != 1 ){
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
            <title>User - Daftar Komik</title>
            <link href="../UserDefault.css" type="text/css" rel="stylesheet">
            <link href="userdaftarkomik.css" type="text/css" rel="stylesheet">
            <script type="text/javascript" src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
            <script src="../UserDefault.js"></script>
            <script defer src="https://use.fontawesome.com/releases/v5.0.9/js/all.js" integrity="sha384-8iPTk2s/jMVj81dnzb/iFR2sdA7u06vHJyyLlAd4snFpCl/SnyUjRrbdJsw1pGIl" crossorigin="anonymous"></script>
        </head>
        <body>
            <header>
                <img src="../../logobaru.png" id="logo"/>
                <p class="blue font15" id="welcome">Welcome, <span id="namaUser">our customer</span> | <a href="../../"><span id="logOut">Log Out</span></a></p>
                <p id="tanggal" class="blue font15">
                <?php
                    $hari;
                    $bulan;
                    
                    //atur hari bahasa indonesia
                    if(date("D")=='Mon') $hari="Senin";
                    else if(date("D")=='Tue') $hari="Selasa";
                    else if(date("D")=='Wed') $hari="Rabu";
                    else if(date("D")=='Thu') $hari="Kamis";
                    else if(date("D")=='Fri') $hari="Jum'at";
                    else if(date("D")=='Dat') $hari="Sabtu";

                    //atur bulan bahasa indonesia
                    if(date("m")=='01') $bulan="Januari";
                    else if(date("m")=='02') $bulan="Februari";
                    else if(date("m")=='03') $bulan="Maret";
                    else if(date("m")=='04') $bulan="April";
                    else if(date("m")=='05') $bulan="Mei";
                    else if(date("m")=='06') $bulan="Juni";
                    else if(date("m")=='07') $bulan="Juli";
                    else if(date("m")=='08') $bulan="Agustus";
                    else if(date("m")=='09') $bulan="September";
                    else if(date("m")=='10') $bulan="Oktober";
                    else if(date("m")=='11') $bulan="November";
                    else if(date("m")=='12') $bulan="Desember";

                    echo $hari.', '.date("d")." ".$bulan." ".date("Y");
                ?>
                </p>
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
                            <option value= 1>Judul</option>
                            <option value= 2>Pengarang</option>
                            <option value= 3>Penerbit</option>
                        </select>
                        <div id="searchBox">
                            <input type="text" placeholder="Search" class="font15" id="inputSearchBy" name="inputSearchBy"/>
                            <i class="fa fa-search blue font15 klik" onclick="search()"></i>
                        </div>
                    </div>
                </div>
                <div id="daftarKomik" class="font15">
                <?php 
                    include "isiKonten.php";
                ?>
                </div>
            </article>
            <a href="#logo" id="tombolUp"><i class="fas fa-chevron-circle-up blue"></i></a>
            <!-- keperluan popup-->
            <div id="blur" onclick="pencetBlur()"></div>
            <div id="popup"></div>
        </body>
        </html>
        <?php
    }
?>