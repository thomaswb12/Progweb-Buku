<?php

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

    function tanggal($temp){
        //atur bulan bahasa indonesia
        $tahun =  substr($temp,0,4);
        $bulan = substr($temp,5,2);
        $hari =  substr($temp,8,2);

        if($bulan =='01') $bulan="Januari";
        else if($bulan =='02') $bulan="Februari";
        else if($bulan =='03') $bulan="Maret";
        else if($bulan =='04') $bulan="April";
        else if($bulan =='05') $bulan="Mei";
        else if($bulan =='06') $bulan="Juni";
        else if($bulan =='07') $bulan="Juli";
        else if($bulan =='08') $bulan="Agustus";
        else if($bulan =='09') $bulan="September";
        else if($bulan =='10') $bulan="Oktober";
        else if($bulan =='11') $bulan="November";
        else if($bulan =='12') $bulan="Desember";
        return "$hari, $bulan $tahun";
    }

?>