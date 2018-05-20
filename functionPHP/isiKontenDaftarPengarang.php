<?php
    include "pengarang.php";
    
    if(isset($_POST['keyword'])&&isset($_POST['searchby'])&&isset($_POST['sortby']))
        $hasil = getAllPengarangWith($_POST['keyword'],$_POST['searchby'],$_POST['sortby']);
        //$hasil = getBukuWith($_POST['keyword'],$_POST['searchby'],$_POST['sortby']);
    else
        $hasil = getAllPengarang();
    $i=1;
    foreach($hasil as $pengarang){
        echo '<div class="info">';
        echo '<img class="foto" src="'.$pengarang['foto'].'"/>';
        echo '<p class="ID">ID : '.$pengarang['idPenulis'].'</p>
            <p class="Penerbit">Penerbit : '.$pengarang['namaPenulis'].'</p>
            <p>Asal : '.$pengarang['asal'].'</p>
             </div>';
        $i++;
    }
?>