<?php
     include "getDataBuku.php";
     if(isset($_POST['kata'])&&isset($_POST['dari'])&&isset($_POST['sorting']))
        $buku = getBukuWith($_POST['kata'],$_POST['dari'],$_POST['sorting']);
     else
        $buku = getBuku();
     foreach($buku as $value){
         echo   '<div class="infoKomik favorit specialEdition" onclick="munculPopup('."'".$value['idBuku']."'".')">';
                   if($_POST['status']==1) echo '<img class="komik" src="../../'.$value['Location'].'"/>';
                   else echo '<img class="komik" src="../'.$value['Location'].'"/>';
         echo   '<h4 class="judul">'.$value['judulBuku'].'</h4>
                    <p>Stok : <span class="stok">'.$value['jumlahEksemplar'].'</span></p>
                    <p style="float:left;">Tersedia : <span class="tersedia">'.$value['jumlahEksemplar'].'</span></p>
                    <p class="status">'.(($value['Available']>0)?'available':'unavailable').'</p>
             </div>';
     }
?>