<?php
    require "koneksi.php";

    //ambil semua daftar peminjaman di tabel transaksi
    function getAllPeminjaman(){
        global $conn;
        $sql="SELECT detailtransaksi.tanggalAturanKembali, member.id, member.nama, detailtransaksi.tanggalPinjam, detailtransaksi.idEksBuku from detailtransaksi, member, transaksi, eksbuku where member.id=transaksi.idMember AND transaksi.idTransaksi=detailtransaksi.idTransaksi AND detailtransaksi.idEksBuku=eksbuku.idEksBuku AND eksbuku.Status='Dipinjam' ORDER BY transaksi.tanggalTransaksi DESC";
        $result=mysqli_query($conn,$sql);
        if($result = $conn->query($sql)){
            $data=array();
            $index=0;
            while($rows = $result->fetch_assoc()){
                //kalau sudah ada ideks buku yang sama gausah tampilin
                $cek=0;
                $indexCek=0;
                if(!empty($data)){
                    foreach($data as $dataCek){
                        if($data[$indexCek]['idEksBuku']==$rows['idEksBuku']){
                            $cek=1;
                            break;
                        }
                        $indexCek++;
                    }
                }
                if($cek==0){
                    $data[$index] = $rows;
                    $index++;
                }
            }
            //urut berdasar tanggal aturan kembali
            //urut dari yang peling TELAT
            function date_compare($a, $b){
                $t1 = strtotime($a['tanggalAturanKembali']);
                $t2 = strtotime($b['tanggalAturanKembali']);
                return $t1 - $t2;
            }    
            usort($data, 'date_compare');

            //id member muncul 1 kali aja sesuai yg ter telat
            $tempArr = array_unique(array_column($data, 'id'));
            $data =array_intersect_key($data, $tempArr);

            $conn->close();
            return $data;
        }
        else{
            $conn->close();
            echo "gagal";
        }
    }

    //ambil daftar peminjaman yg di search
    function getAllPeminjamanWith($kata,$dari){
        global $conn;
        switch($dari){
            case 1 : $dari = "member.id";break;
            case 2 : $dari = "member.nama";break;
        }
        $sql="SELECT detailtransaksi.tanggalAturanKembali, member.id, member.nama, detailtransaksi.tanggalPinjam, detailtransaksi.idEksBuku from detailtransaksi, member, transaksi, eksbuku where $dari like '$kata%' and member.id=transaksi.idMember AND transaksi.idTransaksi=detailtransaksi.idTransaksi AND detailtransaksi.idEksBuku=eksbuku.idEksBuku AND eksbuku.Status='Dipinjam' ORDER BY transaksi.tanggalTransaksi DESC";
        $result = $conn->query($sql);
        if($result = $conn->query($sql)){
            $data=array();
            $index=0;
            while($rows = $result->fetch_assoc()){
                //kalau sudah ada ideks buku yang sama gausah tampilin
                $cek=0;
                $indexCek=0;
                if(!empty($data)){
                    foreach($data as $dataCek){
                        if($data[$indexCek]['idEksBuku']==$rows['idEksBuku']){
                            $cek=1;
                            break;
                        }
                        $indexCek++;
                    }
                }
                if($cek==0){
                    $data[$index] = $rows;
                    $index++;
                }
            }
            //urut berdasar tanggal aturan kembali
            //urut dari yang peling TELAT
            function date_compare($a, $b){
                $t1 = strtotime($a['tanggalAturanKembali']);
                $t2 = strtotime($b['tanggalAturanKembali']);
                return $t1 - $t2;
            }    
            usort($data, 'date_compare');

            //id member muncul 1 kali aja sesuai yg ter telat
            $tempArr = array_unique(array_column($data, 'id'));
            $data =array_intersect_key($data, $tempArr);

            $conn->close();
            return $data;
        }
        else{
            $conn->close();
            echo "gagal";
        }
    }

    //fungsi untuk mengambil laporan keuangan (default --> 1 bulan, bulan ini)
    function getAllKeuangan(){
        global $conn;
        $data=array();

        //dari bulan ini --> 1 bulan
        $bulan=date('m');

        //ambil data dari transaksi peminjaman -->masukkan ke array $data[]
        $sql="SELECT transaksi.tanggalTransaksi, transaksi.idTransaksi,member.id, karyawan.idKaryawan, eksbuku.idEksBuku, detailtransaksi.harga, 0 as denda, detailtransaksi.harga AS total FROM transaksi, member, karyawan, eksbuku, detailtransaksi WHERE transaksi.idMember=member.id AND transaksi.idKaryawan=karyawan.idKaryawan AND transaksi.idTransaksi=detailtransaksi.idTransaksi AND detailtransaksi.idEksBuku=eksbuku.idEksBuku AND MONTH(transaksi.tanggalTransaksi)=$bulan";
        $result=mysqli_query($conn,$sql);
        if($result = $conn->query($sql)){
            while($rows = $result->fetch_assoc()){
                $data[]=$rows;
            }
        }
        //ambil data dari transaksi pengembalian -->masukkan ke array $data[]
        $sql="SELECT pengembalian.tanggalTransaksi, pengembalian.idTransaksi,member.id, karyawan.idKaryawan, eksbuku.idEksBuku, 0 as harga, detailpengembalian.denda, detailpengembalian.denda AS total FROM pengembalian, member, karyawan, eksbuku, detailpengembalian WHERE pengembalian.idMember=member.id AND pengembalian.idKaryawan=karyawan.idKaryawan AND pengembalian.idTransaksi=detailpengembalian.idTransaksi AND detailpengembalian.idEksBuku=eksbuku.idEksBuku AND MONTH(pengembalian.tanggalTransaksi)=$bulan";
        $result=mysqli_query($conn,$sql);
        while($rows = $result->fetch_assoc()){
            $data[]=$rows;
        }
        //urutkan berdasar tanggal transaksi
        function date_compare($a, $b){
            $t1 = strtotime($a['tanggalTransaksi']);
            $t2 = strtotime($b['tanggalTransaksi']);
            return $t1 - $t2;
        }    
        usort($data, 'date_compare');
        $conn->close();
        return $data;
    }

    //fungsi untuk mengambil laporan keuangan dengan periode tertentu
    function getAllKeuanganWith($awal, $akhir){
        global $conn;
        $data=array();
        //ambil data dari transaksi peminjaman -->masukkan ke array $data[]
        $sql="SELECT transaksi.tanggalTransaksi, transaksi.idTransaksi,member.id, karyawan.idKaryawan, eksbuku.idEksBuku, detailtransaksi.harga, detailtransaksi.denda, detailtransaksi.harga+detailtransaksi.denda AS total FROM transaksi, member, karyawan, eksbuku, detailtransaksi WHERE transaksi.idMember=member.id AND transaksi.idKaryawan=karyawan.idKaryawan AND transaksi.idTransaksi=detailtransaksi.idTransaksi AND detailtransaksi.idEksBuku=eksbuku.idEksBuku AND transaksi.tanggalTransaksi between '$awal 00:00:00' and '$akhir 23:59:00' ";
        $result=mysqli_query($conn,$sql);
        if($result = $conn->query($sql)){
            while($rows = $result->fetch_assoc()){
                $data[]=$rows;
            }
        }
        //ambil data dari transaksi pengembalian -->masukkan ke array $data[]
        $sql="SELECT pengembalian.tanggalTransaksi, pengembalian.idTransaksi,member.id, karyawan.idKaryawan, eksbuku.idEksBuku, 0 as harga, detailpengembalian.denda, detailpengembalian.denda AS total FROM pengembalian, member, karyawan, eksbuku, detailpengembalian WHERE pengembalian.idMember=member.id AND pengembalian.idKaryawan=karyawan.idKaryawan AND pengembalian.idTransaksi=detailpengembalian.idTransaksi AND detailpengembalian.idEksBuku=eksbuku.idEksBuku AND pengembalian.tanggalTransaksi between '$awal 00:00:00' and '$akhir 23:59:00'";
        $result=mysqli_query($conn,$sql);
        while($rows = $result->fetch_assoc()){
            $data[]=$rows;
        }
        //urutkan berdasar tanggal transaksi
        function date_compare($a, $b){
            $t1 = strtotime($a['tanggalTransaksi']);
            $t2 = strtotime($b['tanggalTransaksi']);
            return $t1 - $t2;
        }    
        usort($data, 'date_compare');
        $conn->close();
        return $data;
    }
?>