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
        <img class="komik" src="Kasir - daftar komik/miiko19.jpg"/>
        <h4 class="judul">Miiko vol 19</h4>
        <p class="stok">Stok : 5</p>
        <p class="tersedia">Tersedia : 1</p>
        <p class="status">Available</p>
        <img class="new" src="../../label_new.png"/>
    </div>
    <?php

        require "../getDataBuku.php";
        $data = getBuku();
        foreach($data as $key=>$value){
        ?>
        <div class="infoKomik">
            <img class="komik" src="Kasir - daftar komik/miiko19.jpg"/>
            <h4 class="judul"><?php echo $value['judulBuku']?></h4>
            <p class="stok">Stok : 5</p>
            <p class="tersedia">Tersedia : 1</p>
            <p class="status">Available</p>
            <img class="new" src="../../label_new.png"/>
        </div>
            <?php
        }
    ?>
</div>