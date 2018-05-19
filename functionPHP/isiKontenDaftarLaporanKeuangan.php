<?php
     include "manager.php";
     require "koneksi.php";
     include "curency.php";

     if(isset($_POST['awal'])&&isset($_POST['akhir'])){
        $hasil = getAllKeuanganWith($_POST['awal'],$_POST['akhir']);
     }
     else{
        $hasil = getAllKeuangan();
     }
    $total=0;
    foreach($hasil as $data){
        $total+=$data["total"];
        $tanggal = tanggal(substr($data["tanggalTransaksi"],0,10));
        $jam = substr($data["tanggalTransaksi"],10);
        echo    '<tr>
                    <td class="tanggalTransaksi">'.$tanggal.' '.$jam.'</td>
                    <td class="idTransaksi">'.$data["idTransaksi"].'</td>
                    <td class="idMember">'.$data["id"].'</td>
                    <td class="idKaryawan">'.$data["idKaryawan"].'</td>
                    <td class="idBuku">'.$data["idEksBuku"].'</td>
                    <td class="harga">'.toRp($data["harga"]).'</td>
                    <td class="denda">'.toRp($data["denda"]).'</td>
                    <td class="subTotal">'.toRp($data["total"]).'</td>
                </tr>';
    }
    echo ' <tr>
            <td colspan="7">TOTAL</td>
            <td id="total">'.toRp($total).'</td>
        </tr>';
?>