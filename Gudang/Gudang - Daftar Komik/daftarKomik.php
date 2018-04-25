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
                    <div id="daftar" class="font15">
                        <?php

                           require "../../getDataBuku.php";
                           $data = getBuku();
                           foreach($data as $key=>$value){
                            ?>
                            <div class="info">
                                <img class="foto" src="miiko19.jpg"/>
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