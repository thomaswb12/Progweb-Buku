<?php
    include "penerbit.php";
    
    if(isset($_POST['keyword'])&&isset($_POST['searchby'])&&isset($_POST['sortby']))
        $hasil = getAllPenerbitWith($_POST['keyword'],$_POST['searchby'],$_POST['sortby']);
        //$hasil = getBukuWith($_POST['keyword'],$_POST['searchby'],$_POST['sortby']);
    else
        $hasil = getAllPenerbit();
    $i=1;
    foreach($hasil as $penerbit){
        echo '<div class="info">';
        echo '<img class="foto" src="'.$penerbit['foto'].'"/>';
        echo '<p class="ID">ID : '.$penerbit['idPenerbit'].'</p>
                <p class="Penerbit">Penerbit : '.$penerbit['NamaPenerbit'].'</p>
             </div>';
        $i++;                    
    }
?>