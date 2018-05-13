<?php
    require "koneksi.php";
    include "curency.php";

    //hitung selisih tanggal kembali - tanggal aturan kembali
    //ex: hariTelat("2018-02-01","2018-01-31");
    function hariTelat($tanggalKembali, $tanggalAturanKembali){
        $ts1=strtotime($tanggalAturanKembali);
        $ts2=strtotime($tanggalKembali);
        $seconds_diff = ($ts2 - $ts1)/86400;
        if($seconds_diff<0) return 0;
        else return $seconds_diff;
    }

    //hitung denda
    //ex: denda("2018-02-01","2018-01-31");
    function denda($tanggalKembali, $tanggalAturanKembali){
        $telat = hariTelat($tanggalKembali, $tanggalAturanKembali);
        $denda = $telat * 500;
        return $denda;
    }

    //hitung denda dalam string bentuk rupiah
    //ex: dendaDalamRp("2018-02-01","2018-01-31");
    function dendaDalamRp($tanggalKembali, $tanggalAturanKembali){
        $denda = denda($tanggalKembali, $tanggalAturanKembali);
        return toRp($denda);
    }
?>