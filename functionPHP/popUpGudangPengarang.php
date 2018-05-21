<?php
    session_start();
    include "penerbit.php";
    require "koneksi.php";
    //$value = getPenerbit($_POST['idPenerbit']);
    $sql = "SELECT * FROM penulis WHERE `idPenulis` = '".$_POST['idPengarang']."'";
    $result = mysqli_query($conn,$sql);
    $value = mysqli_fetch_assoc($result);
    echo '<i id="tombolClose" class="klik fas fa-times simbolX" onclick="pencetBlur()"></i>
        <br/><br/>
        <div id="popupScroll" style="overflow-y:unset">
            <p id="popupJudul">'.$value['namaPenulis'].'<button style="float:right;height:50px;width:120px;" onclick="deletePenerbit('."'".$value['idPenulis']."'".')">DELETE</button>'.'<button style="float:right;height:50px;width:120px;" onclick="editPengarang('."'".$value['idPenulis']."'".')">EDIT</button></p>
            <div id="divImg">';
                echo '<img class="komik" src="'.$value['foto'].'"/>';
            echo '</div>
            <table>
                <tr><td>ID Penerbit</td>
                    <td id="popupIdBuku">'.$value['idPenulis'].'</td></tr>
                <tr><td>Nama Penerbit</td>
                    <td id="popupPenulis">'.$value['namaPenulis'].'</td></tr>
                <tr><td>Asal</td>
                    <td id="popupPenerbit">'.$value['asal'].'</td></tr>
            </table>
        </div>';
?>