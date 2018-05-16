<?php
     include "manager.php";
     require "koneksi.php";

     if(isset($_POST['keyword'])&&isset($_POST['searchby'])){
        $hasil = getAllPeminjamanWith($_POST['keyword'],$_POST['searchby']);
     }
     else{
        $hasil = getAllPeminjaman();
     }
    foreach($hasil as $pinjam){
        echo    '<tr onclick="aside2()">
                    <td>'.$pinjam['tanggalAturanKembali'].'</td>
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