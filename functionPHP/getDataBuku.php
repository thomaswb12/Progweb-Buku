<?php
    //if(isset($_SESSION['id']) || $_SESSION['control'] != 1){
        require "koneksi.php";


        function getBuku(){
            global $conn;
            $sql =  " SELECT * FROM buku order by tanggalTerbit DESC";
            if($result = $conn->query($sql)){
                while($rows = $result->fetch_assoc()){
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

        function getBukuWith($kata,$dari,$sort){
            global $conn;
            switch($dari){
                case 1 : $dari = "judulBuku"; break;
                case 2 : $dari = "namaPenulis";break;
                case 3 : $dari = "NamaPenerbit";break;
            }
            switch($sort){
                case 1 : $sort = "tanggalTerbit"; break;
                case 2 : $sort = "Dipinjam";break;
                case 3 : $sort = "jumlahEksemplar";break;
            }
            
            $data=array();
            //$sql =  " SELECT * FROM buku, where $dari like '$kata%' order by $sort DESC";
            $sql =  "SELECT b.*,p.namaPenulis,pe.NamaPenerbit FROM `buku` as b,penulis as p, penerbit as pe WHERE $dari like '$kata%' AND p.idPenulis = b.idPenulis AND pe.idPenerbit = b.idPenerbit  order by $sort DESC";
            if($result = $conn->query($sql)){
                while($rows = $result->fetch_assoc()){
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

        function getDetailBuku($temp){
            global $conn;
            $data=array();
            $sql =  "SELECT b.*,p.namaPenulis,pe.NamaPenerbit,r.namaRak FROM `buku` as b,penulis as p, penerbit as pe, rak as r WHERE `idBuku` = '$temp' AND p.idPenulis = b.idPenulis AND pe.idPenerbit = b.idPenerbit AND r.idRak = b.idRak ";
            if($result = $conn->query($sql)){
                while($rows = $result->fetch_assoc()){
                    $data = $rows;
                }
                $conn->close();
                return $data;
            }
            else{
                $conn->close();
                echo "gagal";
            }
            
        }

        //hitung selisih tanggal buku terbit dg tanggal sekarang
        function getSelisihHari($tanggalTerbit){
            $ts1=strtotime($tanggalTerbit);
            $ts2=strtotime(date("Y-m-d"));
            $seconds_diff = ($ts2 - $ts1)/86400;
            return $seconds_diff;
        }

        //hitung harga buku
        function getHargaBuku($tanggalTerbit,$specialEdition){
            $selisih=getSelisihHari($tanggalTerbit);
            if($selisih<30) $harga=6000;        //komik baru (>1bulan) harganya 6rb
            else $harga=3000;                   //komik lama harganya 3rb
            if($specialEdition=="Ya") $harga+=2000;     //kalau special edition, harga lebih mahal 2ribu
            return $harga;
        }

        //hitung lama pinjam buku
        function getLamaPinjam($tanggalTerbit){
            $selisih=getSelisihHari($tanggalTerbit);
            if($selisih<30) $lamapinjam=3;      //komik baru (>1bulan) boleh dipinjam cuma 3 hari
            else $lamapinjam=7;                 //komik lama boleh dipinjam 7 hari
            return $lamapinjam;
        }
?>