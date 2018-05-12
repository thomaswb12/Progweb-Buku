<?php
    include "penerbit.php";

    $hasil = getAllPenerbit();
    $i=1;
    foreach($hasil as $penerbit){
        echo '<div class="info">';
        echo '<img class="foto" src="logo.jpg"/>';
        echo '<p class="ID">ID : '.$penerbit['idPenerbit'].'</p>
                <p class="Penerbit">Penerbit : '.$penerbit['NamaPenerbit'].'</p>
                <p class="noTelp">No. Telp : </p>
                <p class="email">Email : </p>
                <p class="alamat">Alamat : </p>
             </div>';
        $i++;                    
    }
?>