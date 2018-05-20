<?php
     include "getDataBuku.php";
     $buku = getBukuWith1($_POST['jdl'],$_POST['pnl'],$_POST['pnb'],$_POST['gnr']);
     foreach($buku as $value){
         //cek available atau tidak
        if($value['Available']>0){
            $status='available';
            $warna='green';
        }
        else{
            $status='unavailable';
            $warna='red';
        }
        //cek apakah special edition dan favorit
        $special='';
        $favorit='';
        if($value['specialEdition']=="Ya"){
            $special='specialEdition';
        }
        if($value['Dipinjam']>200){
            $favorit='favorit';
        }
        echo   '<div class="infoKomik '.$favorit.' '.$special.'" onclick="munculPopup('."'".$value['idBuku']."'".')">';
                   if($_POST['status']==1) echo '<img class="komik" src="../../'.$value['Location'].'"/>';
                   else echo '<img class="komik" src="../'.$value['Location'].'"/>';
        echo   '<h4 class="judul">'.$value['judulBuku'].'</h4>
                    <p>Stok : <span class="stok">'.$value['jumlahEksemplar'].'</span></p>
                    <p style="float:left;">Tersedia : <span class="tersedia">'.$value['jumlahEksemplar'].'</span></p>
                    <p class="status" style="color:'.$warna.'">'.$status.'</p>
             </div>';
     }
?>