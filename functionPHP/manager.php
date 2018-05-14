<?php
    require "koneksi.php";

    //ambil semua daftar peminjaman di tabel transaksi
    function getAllPeminjaman(){
        global $conn;
        $sql = "SELECT * FROM transaksi ORDER BY id ASC";
        $result=mysqli_query($conn,$sql);
        $data=array();
        while($row=mysqli_fetch_assoc($result)){
            $data[]=$row;
        }
        $conn->close();
        return $data;
    }

    //ambil daftar peminjaman yg di search
    function getAllPeminjamanWith($kata,$dari){
        global $conn;
        switch($dari){
            case 1 : $dari = "id"; break;
            case 2 : $dari = "nama";break;
        }
        $data=array();
        $sql =  " SELECT * FROM member where $dari like '$kata%' order by $sort ASC";
        $result = $conn->query($sql);
        while($rows = $result->fetch_assoc()){
            $data[] = $rows;
        }
        $conn->close();
        return $data;
    }
?>