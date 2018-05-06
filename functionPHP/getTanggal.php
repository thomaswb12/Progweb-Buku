<?php
    $hari="";
    $bulan="";
    
    //atur hari bahasa indonesia
    if(date("D")=='Mon') $hari="Senin";
    else if(date("D")=='Tue') $hari="Selasa";
    else if(date("D")=='Wed') $hari="Rabu";
    else if(date("D")=='Thu') $hari="Kamis";
    else if(date("D")=='Fri') $hari="Jum'at";
    else if(date("D")=='Sat') $hari="Sabtu";
    else if(date("D")=='Sun') $hari="Minggu";

    //atur bulan bahasa indonesia
    if(date("m")=='01') $bulan="Januari";
    else if(date("m")=='02') $bulan="Februari";
    else if(date("m")=='03') $bulan="Maret";
    else if(date("m")=='04') $bulan="April";
    else if(date("m")=='05') $bulan="Mei";
    else if(date("m")=='06') $bulan="Juni";
    else if(date("m")=='07') $bulan="Juli";
    else if(date("m")=='08') $bulan="Agustus";
    else if(date("m")=='09') $bulan="September";
    else if(date("m")=='10') $bulan="Oktober";
    else if(date("m")=='11') $bulan="November";
    else if(date("m")=='12') $bulan="Desember";

    echo $hari.', '.date("d")." ".$bulan." ".date("Y");
?>