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
                <!-- kalau mau sambung database, yang ditiru yang bawah ya-->
                    <div class="infoKomik">
                        <img class="komik" src="miiko19.jpg"/>
                        <h4 class="judul">Hai Miiko! Vol.19</h4>
                        <p class="stok">Stok : 5</p>
                        <p class="tersedia">Tersedia : 1</p>
                        <p class="status">Available</p>
                        <img class="new" src="../../label_new.png"/>
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

                    <!-- ini yg ditiru-->
                    <div class="infoKomik favorit specialEdition" onclick="munculPopup($(this))">
                        <img class="komik" src="miiko19.jpg"/>
                        <h4 class="judul">Hai Miiko! Vol.19</h4>
                        <p>Stok : <span class="stok">5</span></p>
                        <p style="float:left;">Tersedia : <span class="tersedia">1</span></p>
                        <p class="status">Available</p>
                        <!-- yg perlu ditampilkan di popup, tp gaperlu tampil di page-nya -->
                        <div class="keperluanPopup" style="display: none">
                            <p class="idBuku">83742</p>
                            <p class="penulis">Masashi</p>
                            <p class="penerbit">Elex Media</p>
                            <p class="tanggalTerbit">4 Mei 2007</p>
                            <p class="jumlahHalaman">56</p>
                            <p class="beratBuku">500</p>
                            <p class="jenisCover">Soft Cover</p>
                            <p class="dimensi">8x15</p>
                            <p class="text">Bahasa Indonesia</p>
                            <p class="dipinjam">2023</p>
                            <p class="genre">Action</p>
                            <p class="rating">Semua umur</p>
                            <p class="rak">A1</p>
                            <h3 class="popular">Popular</h3>
                            <h3 class="specialEdition">Special Edition</h3>
                            <p class="hargaSewa">1500</p>
                            <p class="lamaSewa">7 </p>
                            <p class="isiSinopsis">
                                Hai, Miiko! (juga dikenal sebagai Kocchi Muite! Miiko) adalah manga seri karya seorang mangaka Jepang, Ono Eriko.
                                Menceritakan tentang gadis kelas 5 SD bernama Yamada Miiko beserta dengan teman-temannya.
                                Di Inggris manga ini dikenal dengan nama Hi, Michelle!.
                                Terdapat versi terdahulu dari Hai, Miiko! yang berudul Namaku Miiko! berjumlah 4 jilid.
                                Seri ini menceritakan tentang Miiko dan kawan-kawan saat kelas 4 SD menjelang kenaikan kelas.
                                Saat ini manga Hai, Miiko! sudah mencapai jilid 29, menceritakan Miiko dan kawan-kawan yang telah naik kelas ke kelas 6 SD.
                                Miiko dikenal sangat Aktif dan Ceria. karena itu Tappei dan Yoshida menyukai Miiko.
                                Miiko sangat ingin bertambah tinggi lantaran Tappei sering mengejek Miiko kecil karena tingginya hanya 122 cm.
                                Walaupun Tappei sering mengejek Miiko, tappei sering membantu dan menghibur Miiko saat terkena masalah.
                            </p>
                        </div>
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

            <!-- keperluan popup-->
            <div id="blur" onclick="pencetBlur()">
            </div>
            <div id="popup">
                <i class="fas fa-times simbolX" onclick="pencetBlur()"></i>
                <br/><br/>
                <div id="popupScroll">
                    <p id="popupJudul"></p>
                    <div id="istimewa">
                        <h3 id="popupPopular" style="color:red;"></h3>
                        <h3 id="popupSpecial" style="color:orange;"></h3>
                    </div>
                    <div id="penting">
                        <p>Status : <span id="popupStatus"></span></p>
                        <p>Harga Sewa : <span id="popupHarga"></span></p>
                        <p>Lama Sewa : <span id="popupLama"></span></p>
                    </div>
                    <table>
                        <tr><td>ID Buku</td>
                            <td id="popupIdBuku"></td></tr>
                        <tr><td>Penulis</td>
                            <td id="popupPenulis"></td></tr>
                        <tr><td>Penerbit</td>
                            <td id="popupPenerbit"></td></tr>
                        <tr><td>Tanggal Terbit</td>
                            <td id="popupTanggalTerbit"></td></tr>
                        <tr><td>Jumlah Halaman</td>
                            <td id="popupJumlahHalaman"></td></tr>
                        <tr><td>Berat</td>
                            <td id="popupBerat"></td></tr>
                        <tr><td>JenisCover</td>
                            <td id="popupJenisCover"></td></tr>
                        <tr><td>Dimensi</td>
                            <td id="popupDimensi"></td></tr>
                        <tr><td>Text</td>
                            <td id="popupText"></td></tr>
                        <tr><td>Stok</td>
                            <td id="popupStok"></td></tr>
                        <tr><td>Tersedia</td>
                            <td id="popupTersedia"></td></tr>
                        <tr><td>Dipinjam</td>
                            <td id="popupDipinjam"></td></tr>
                        <tr><td>Genre</td>
                            <td id="popupGenre"></td></tr>
                        <tr><td>Rating</td>
                            <td id="popupRating"></td></tr>
                        <tr><td>Rak</td>
                            <td id="popupRak"></td></tr>
                    </table>
                    <p>Sinopsis</p>
                    <p id="popupSinopsis"></p>
                </div>
            </div>
        </body>
        </html>
        <?php
    }
?>

