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
            <script type="text/javascript" src="../../jquery-3.3.1.min.js"></script>
            <script src="../UserDefault.js"></script>
            <!--<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.12/css/all.css" integrity="sha384-G0fIWCsCzJIMAVNQPfjH08cyYaUtMwjJwqiRKxxE/rx96Uroj1BtIQ6MLJuheaO9" crossorigin="anonymous">-->
            <script defer src="../../fontawesome-free-5.0.13\svg-with-js\js\fontawesome-all.min.js"></script>
            
        </head>
        <body>
            <header>
                <img src="../../logobaru.png" id="logo"/>
                <p class="blue font15" id="welcome">Welcome, <span id="namaUser">our customer</span> | <a href="../../"><span id="logOut">Log Out</span></a></p>
                <p id="tanggal" class="blue font15">
                <?php include "../../functionPHP/getTanggal.php"?>
                </p>
            </header>
            <article>
                <div id="judul">
                    <h1>Daftar Komik</h1>
                    <div id="simple">
                        <a href="#" onclick="advanced()" >Advanced Search</a>
                        <a>|</a>
                        <a>Simple Search</a>
                        <div id="sorting">
                            <label id="labelSortBy" class="blue font15">Sort by :</label>
                            <br/>
                            <select id="selectSortBy" class="font15">
                                <option value = 1>Terbaru</option>
                                <option value = 2>Terpopuler</option>
                                <option value = 3>Stok terbanyak</option>
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
                    
                    <div id="advanced" style="display:none">
                        <a>Advanced Search</a>
                        <a>|</a>
                        <a href="#" onclick="simple()" >Simple Search</a><br><br>
                        <label>Judul</label>
                        <input type="text" id="jdl"></input><br><br>
                        <label>Penulis</label>
                        <input type="text" id="pnl"></input><br><br>
                        <label>Penerbit</label>
                        <input type="text" id="pnb"></input><br><br>
                        <label>Genre</label>
                        <input type="text" id="gnr"></input><br>
                        <input type="submit" id="submit" value="SEARCH"></input>
                    </div>
                </div>
                <div id="daftarKomik" class="font15">
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