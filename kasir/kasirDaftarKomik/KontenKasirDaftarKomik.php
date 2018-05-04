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
            <i class="klik fa fa-search blue font15"></i>
        </div>
    </div>
</div>
<div id="daftarKomik" class="font15">
    <?php
        include "../../functionPHP/isiKonten.php";
    ?>
</div>
<!-- keperluan popup-->
<div id="blur" onclick="pencetBlur()">
</div>
<div id="popup"></div>