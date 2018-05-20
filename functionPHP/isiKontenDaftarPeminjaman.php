
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
     if(sizeof($hasil)==0){
         echo '<p style="text-align:center;">Tidak ada hasil pencarian</p>';
     }
     else{
        echo '<table>
                <thead>
                    <th class="tanggalPengembalian">Tanggal Aturan Pengembalian</th>
                    <th class="idMember">ID Member</th>
                    <th class="namaMember">Nama Member</th>
                    <th class="peringatan"></th>
                </thead>
                <tbody id="daftarPeminjaman">';
        foreach($hasil as $pinjam){
            $tanggalPinjam = tanggal($pinjam['tanggalAturanKembali']);
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
        echo '        </tbody>
        </table>';
    }
?>