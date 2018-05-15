<?php
    require "koneksi.php";

    //ambil semua daftar peminjaman di tabel transaksi
    function getAllPeminjaman(){
        global $conn;
        $sql="SELECT detailtransaksi.tanggalAturanKembali, member.id, member.nama, detailtransaksi.tanggalPinjam, detailtransaksi.idEksBuku from detailtransaksi, member, transaksi, eksbuku where member.id=transaksi.idMember AND transaksi.idTransaksi=detailtransaksi.idTransaksi AND detailtransaksi.idEksBuku=eksbuku.idEksBuku AND eksbuku.Status='Dipinjam' ORDER BY transaksi.tanggalTransaksi DESC";
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
            case 1 : $dari = "member.id";break;
            case 2 : $dari = "member.nama";break;
        }
        $data=array();
        $sql="SELECT detailtransaksi.tanggalAturanKembali, member.id, member.nama, detailtransaksi.tanggalPinjam, detailtransaksi.idEksBuku from detailtransaksi, member, transaksi, eksbuku where $dari like '$kata%' and member.id=transaksi.idMember AND transaksi.idTransaksi=detailtransaksi.idTransaksi AND detailtransaksi.idEksBuku=eksbuku.idEksBuku AND eksbuku.Status='Dipinjam' ORDER BY transaksi.tanggalTransaksi DESC";
        $result = $conn->query($sql);
        if($result = $conn->query($sql)){
            while($rows = $result->fetch_assoc()){
                //kalau sudah ada ideks buku yang sama gausah tampilin
                //id member muncul 1 kali aja sesuai yg ter telat
                $data[] = $rows;
            }
            $conn->close();
            return $data;
        }
        else{
            $conn->close();
            echo "gagal";
        }
    }
?>