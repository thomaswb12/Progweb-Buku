<?php
    session_start();
    include "penerbit.php";
    require "koneksi.php";
    //$value = getPenerbit($_POST['idPenerbit']);
    $sql = "SELECT * FROM penerbit WHERE `idPenerbit` = '".$_POST['idPenerbit']."'";
    $result = mysqli_query($conn,$sql);
    $value = mysqli_fetch_assoc($result);
    echo '<i id="tombolClose" class="klik fas fa-times simbolX" onclick="pencetBlur()"></i>
        <br/><br/>
        <div id="popupScroll" style="overflow-y:unset">
            <p id="popupJudul">'.$value['NamaPenerbit'].'<button style="float:right;height:50px;width:120px;" onclick="deletePenerbit('."'".$value['idPenerbit']."'".')">DELETE</button>'.'<button style="float:right;height:50px;width:120px;" onclick="editPenerbit('."'".$value['idPenerbit']."'".')">EDIT</button></p>
            <div id="divImg">';
                echo '<img class="komik" src="'.$value['foto'].'"/>';
            echo '</div>
            <table>
                <tr><td>ID Penerbit</td>
                    <td id="popupIdBuku">'.$value['idPenerbit'].'</td></tr>
                <tr><td>Nama Penerbit</td>
                    <td id="popupPenulis">'.$value['NamaPenerbit'].'</td></tr>
                <tr><td>Email</td>
                    <td id="popupPenerbit">'.$value['email'].'</td></tr>
                <tr><td>No Telepon</td>
                    <td id="popupTanggalTerbit">'.$value['noTelp'].'</td></tr>
                <tr><td>Alamat</td>
                    <td id="popupJumlahHalaman">'.$value['alamat'].'</td></tr>
            </table>
        </div>';
?>