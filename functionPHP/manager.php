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
        return $data;
    }

    //ambil daftar peminjaman yg di search
    function getAllPeminjamanWith($kata,$dari){
        
    }
?>