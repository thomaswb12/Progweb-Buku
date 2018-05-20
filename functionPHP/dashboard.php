<?php
    session_start();
    include "koneksi.php";
    include "curency.php";

    function getTotalMember(){
        global $conn;
        $sql = "SELECT * FROM member";
        $result=mysqli_query($conn,$sql);
        return mysqli_affected_rows($conn);        
    }

    function getTotalBuku(){
        global $conn;
        $sql = "SELECT * FROM buku";
        $result=mysqli_query($conn,$sql);
        return mysqli_affected_rows($conn);        
    }

    function getTotalEksBuku(){
        global $conn;
        $sql = "SELECT * FROM eksbuku";
        $result=mysqli_query($conn,$sql);
        return mysqli_affected_rows($conn);        
    }
    
    function getTotalPeminjaman($val){
        global $conn;
        $hariini=date("Y-m-d");
        $bulan=date("m");
        if($val==1)
            $sql = "SELECT * FROM transaksi where tanggalTransaksi = '$hariini'";
        else $sql = "SELECT * FROM transaksi where MONTH(tanggalTransaksi) = '$bulan'";
        $result=mysqli_query($conn,$sql);
        return mysqli_affected_rows($conn);        
    }

    function getTotalPengembalian($val){
        global $conn;
        $hariini=date("Y-m-d");
        $bulan=date("m");
        if($val==1)
            $sql = "SELECT * FROM pengembalian where tanggalTransaksi = '$hariini'";
        else $sql = "SELECT * FROM pengembalian where MONTH(tanggalTransaksi) = '$bulan'";
        $result=mysqli_query($conn,$sql);
        return mysqli_affected_rows($conn);        
    }

    function getTotalUangPeminjaman($val){
        global $conn;
        $hariini=date("Y-m-d");
        $bulan=date("m");
        if($val==1)
            $sql = "SELECT SUM(total) as total FROM transaksi where tanggalTransaksi = '$hariini'";
        else $sql = "SELECT SUM(total) as total FROM transaksi where MONTH(tanggalTransaksi) = '$bulan'";
        $result=mysqli_query($conn,$sql);
        $total=0;
        while($rows = $result->fetch_assoc()) $total=$rows;
        return toRp($total['total']);
    }

    function getTotalUangPengembalian($val){
        global $conn;
        $hariini=date("Y-m-d");
        $bulan=date("m");
        if($val==1)
            $sql = "SELECT SUM(totalDenda) as total FROM pengembalian where tanggalTransaksi = '$hariini'";
        else $sql = "SELECT SUM(totalDenda) as total FROM pengembalian where MONTH(tanggalTransaksi) = '$bulan'";
        $result=mysqli_query($conn,$sql);
        $total=0;
        while($rows = $result->fetch_assoc()) $total=$rows;
        return toRp($total['total']);
    }

    function getTotalUang($val){
        global $conn;
        $hariini=date("Y-m-d");
        $bulan=date("m");
        if($val==1)
            $sql = "SELECT SUM(total) as total FROM transaksi where tanggalTransaksi = '$hariini'";
        else $sql = "SELECT SUM(total) as total FROM transaksi where MONTH(tanggalTransaksi) = '$bulan'";
        $result=mysqli_query($conn,$sql);
        $total=0;
        while($rows = $result->fetch_assoc()) $total=$rows;
        $jumlah=$total['total'];

        if($val==1)
            $sql = "SELECT SUM(totalDenda) as total FROM pengembalian where tanggalTransaksi = '$hariini'";
        else $sql = "SELECT SUM(totalDenda) as total FROM pengembalian where MONTH(tanggalTransaksi) = '$bulan'";
        $result=mysqli_query($conn,$sql);
        $total=0;
        while($rows = $result->fetch_assoc()) $total=$rows;
        $jumlah+=$total['total'];
        return toRp($jumlah);
    }
?>