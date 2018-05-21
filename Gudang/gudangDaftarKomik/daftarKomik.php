<div id="judul">
    <h1>Daftar Komik</h1>

    <div id="sorting">
        <label id="labelSortBy" class="blue font15">Sort by :</label>
        <br/>
        <select id="selectSortBy" class="font15">
            <option value="1">Terbaru</option>
            <option value="2">Terpopuler</option>
            <option value="3">Stok terbanyak</option>
        </select>
        <i class="fa fa-search blue font15 klik" onclick="searchKomik()"></i>
    </div>

    <div id="searching">
        <label id="labelSearchBy" class="blue font15">Search by :</label>
        <br/>
        <select id="selectSearchBy" class="font15">
            <option value="1">Judul</option>
            <option value="2">Pengarang</option>
            <option value="3">Penerbit</option>
        </select>
        <div id="searchBox">
            <input type="text"  placeholder="Search" class="font15" id="inputSearchBy" name="inputSearchBy" onkeyup="searchKomik()" />
        </div>
    </div>
</div>
<div id="daftar" class="font15">
</div>
<!-- keperluan popup-->
<div id="blur" onclick="pencetBlur()">
</div>
<div id="popup"></div>

<?php
    session_start();

    if(isset($_SESSION['komikHapus'])){
        unset($_SESSION['komikHapus']);
        ?>
        <script>
            alert("Sukses menghapus komik");
        </script>
        <?php   
    }
    else if(isset($_SESSION['komikEdit'])){
        unset($_SESSION['komikEdit']);
        ?>
        <script>
            alert("Sukses mengedit komik");
        </script>
        <?php   
    }
?>