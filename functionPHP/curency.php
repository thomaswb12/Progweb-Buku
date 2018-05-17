<?php

    function toRp($temp){
        $hasil_rupiah = "Rp. " . number_format($temp,0,',','.');
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
        return "$hari $bulan $tahun";
    }

    function toTanggal($temp){

        $list =  explode( ' ', $temp ) ;

        switch($list[1]){
            case "Januari"  :    $list[1]="01";break;
            case "Februari" :    $list[1]="01";break;
            case "Maret"    :    $list[1]="03";break;
            case "April"    :    $list[1]="04";break;
            case "Mei"      :    $list[1]="05";break;
            case "Juni"     :    $list[1]="06";break;
            case "Juli"     :    $list[1]="07";break;
            case "Agustus"  :    $list[1]="08";break;
            case "September":    $list[1]="09";break;
            case "Oktober"  :    $list[1]="10";break;
            case "November" :    $list[1]="11";break;
            case "Desember" :    $list[1]="12";break;
        }

        return "$list[2]-$list[1]-$list[0]";
    }

?>