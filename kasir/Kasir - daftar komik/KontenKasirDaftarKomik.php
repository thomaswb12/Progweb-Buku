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
        include "../../functionPHP/getDataBuku.php";
        if(isset($_POST['kata'])&&isset($_POST['dari'])&&isset($_POST['sorting']))
            $buku = getBukuWith($_POST['kata'],$_POST['dari'],$_POST['sorting']);
        else
            $buku = getBuku();
        foreach($buku as $value){
            echo '<div class="infoKomik favorit specialEdition" onclick="munculPopup('."'".$value['idBuku']."'".')">
                    <img class="komik" src="../'.$value['Location'].'"/>
                    <h4 class="judul">'.$value['judulBuku'].'</h4>
                    <p>Stok : <span class="stok">'.$value['jumlahEksemplar'].'</span></p>
                    <p style="float:left;">Tersedia : <span class="tersedia">'.$value['jumlahEksemplar'].'</span></p>
                    <p class="status">'.(($value['Available']>0)?'available':'unavailable').'</p>
                </div>';
        }
    ?>
</div>
<!-- keperluan popup-->
<div id="blur" onclick="pencetBlur()">
</div>
<div id="popup"></div>