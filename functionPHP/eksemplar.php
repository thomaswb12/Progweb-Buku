<?php
    function getIdEks($idKomik){
        include "getDataBuku.php";

        $data = getDetailBuku($idKomik);
        foreach($data as $value){
            $jml = $value['jumlahEksemplar'];
        }
        $numlength = strlen((string)$jml);
        $newId="";
        for($i=0;$i<6-$numlength;$i++){
            $newId=$newId."0";
        }
        return $idKomik."KK".$newId.$jml;
    }
?>