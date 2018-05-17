
<?php
     include "manager.php";
     require "koneksi.php";
     include "curency.php";

     if(isset($_POST['keyword'])&&isset($_POST['searchby'])){
        $hasil = getAllPeminjamanWith($_POST['keyword'],$_POST['searchby']);
     }
     else{
        $hasil = getAllPeminjaman();
     }
    foreach($hasil as $pinjam){
        $tanggalPinjam = tanggal($pinjam['tanggalPinjam']);
        echo    '<tr onclick="tampilPopupDetailPeminjaman($(this))">
                    <td>'.$tanggalPinjam.'</td>
                    <td>'.$pinjam['id'].'</td>
                    <td>'.$pinjam['nama'].'</td>';
        //kalau sudah telat dan belum juga dikembalikan, tampilkan peringatan
        if(strtotime($pinjam['tanggalAturanKembali']) < strtotime('now')){
            echo        '<td class="peringatan"><i class="fas fa-exclamation-triangle" style="color:red"></i></td>
                </tr>';                
        }
        //kalau belum dikembalikan, tapi belum telat, ga ada peringatan
        else{
            echo        '<td class="peringatan"></td>
                </tr>';
        }
    }
?>