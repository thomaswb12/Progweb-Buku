<?php

    $a = toRp(1000000);
    echo $a ."<br>";
    $b = toNumber($a);
    echo $b;

    
    function toRp($temp){
        $hasil_rupiah = "Rp. " . number_format($temp,2,',','.');
        return $hasil_rupiah;
    }

    function toNumber($temp){
        $hasil_biasa = "";
        for($i=0;$i<strlen($temp);$i++){
            if($i>2 && $temp[$i]!='.'){
                if($temp[$i] == ',') break;
                $hasil_biasa .= $temp[$i];
            }
        }
        return (int)$hasil_biasa;
    }

?>