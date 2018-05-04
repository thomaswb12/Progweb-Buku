<?php
session_start();
include "getDataBuku.php";
$buku = getDetailBuku($_POST['idBuku']);

echo '<i id="tombolClose" class="klik fas fa-times simbolX" onclick="pencetBlur()"></i>
        <br/><br/>
        <div id="popupScroll">
            <p id="popupJudul"></p>
            <div id="divImg">';
                if($_POST['status']==1) echo '<img class="komik" src="../../'.$buku['Location'].'"/>';
                else echo '<img class="komik" src="../'.$buku['Location'].'"/>';
            echo '</div>
            <div id="istimewa">
                <h3 id="popupPopular" style="color:red;"></h3>
                <h3 id="popupSpecial" style="color:orange;"></h3>
            </div>
            <div id="penting">
                <p>Status : <span id="popupStatus">'.(($buku['Available']>0)?'available':'unavailable').'</span></p>
                <p>Harga Sewa : <span id="popupHarga"></span></p>
                <p>Lama Sewa : <span id="popupLama"></span></p>
            </div>
            <table>
                <tr><td>ID Buku</td>
                    <td id="popupIdBuku">'.$buku['idBuku'].'</td></tr>
                <tr><td>Penulis</td>
                    <td id="popupPenulis">'.$buku['namaPenulis'].'</td></tr>
                <tr><td>Penerbit</td>
                    <td id="popupPenerbit">'.$buku['NamaPenerbit'].'</td></tr>
                <tr><td>Tanggal Terbit</td>
                    <td id="popupTanggalTerbit">'.$buku['tanggalTerbit'].'</td></tr>
                <tr><td>Jumlah Halaman</td>
                    <td id="popupJumlahHalaman">'.$buku['jumlahHalaman'].'</td></tr>
                <tr><td>Berat</td>
                    <td id="popupBerat">'.$buku['beratBuku'].' gr</td></tr>
                <tr><td>JenisCover</td>
                    <td id="popupJenisCover">'.$buku['jenisCover'].'</td></tr>
                <tr><td>Dimensi</td>
                    <td id="popupDimensi">'.$buku['panjang'].' x '.$buku['lebar'].' cm </td></tr>
                <tr><td>Text</td>
                    <td id="popupText">'.$buku['NamaPenerbit'].'</td></tr>
                <tr><td>Stok</td>
                    <td id="popupStok">'.$buku['jumlahEksemplar'].'</td></tr>
                <tr><td>Tersedia</td>
                    <td id="popupTersedia">'.$buku['Available'].'</td></tr>
                <tr><td>Dipinjam</td>
                    <td id="popupDipinjam">'.$buku['Dipinjam'].'</td></tr>
                <tr><td>Genre</td>
                    <td id="popupGenre">'.$buku['NamaPenerbit'].'</td></tr>
                <tr><td>Rating</td>
                    <td id="popupRating">'.$buku['Rating'].'</td></tr>
                <tr><td>Rak</td>
                    <td id="popupRak">'.$buku['namaRak'].'</td></tr>
            </table>
            <div id="divSinopsis">
                <p>Sinopsis</p>
                <p id="popupSinopsis">'.$buku['sinopsis'].'</p>
            </div>
            <div id="tombolDown">
                <i class="fas fa-chevron-circle-down"></i>
                <p>Scroll</p>
            </div>
        </div>';
?>