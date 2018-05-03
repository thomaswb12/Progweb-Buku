<?php
    //if(isset($_SESSION['id']) || $_SESSION['control'] != 1){
        require "koneksi.php";


        function getBuku(){
            global $conn;
            $sql =  " SELECT * FROM buku order by judulBuku";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($rows = $result->fetch_assoc()){
                    $data[] = $rows;
                }
                $conn->close();
                return $data;
            }
            else{
                echo "gagal";
                $conn->close();
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
                case 1 : $sort = "tanggalTiba"; break;
                case 2 : $sort = "Dipinjam";break;
                case 3 : $sort = "jumlahEksemplar";break;
            }

            $sql =  " SELECT * FROM buku where $dari like '$kata%' order by $sort DESC";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($rows = $result->fetch_assoc()){
                    $data[] = $rows;
                }
                $conn->close();
                return $data;
            }
            else{
                echo "gagal";
                $conn->close();
            } 
        }

        function getDetailBuku($temp){
            global $conn;
            $sql =  "SELECT b.*,p.namaPenulis,pe.NamaPenerbit,r.namaRak FROM `buku` as b,penulis as p, penerbit as pe, rak as r WHERE `idBuku` = '$temp' AND p.idPenulis = b.idPenulis AND pe.idPenerbit = b.idPenerbit AND r.idRak = b.idRak ";
            if($result = $conn->query($sql)){
                if ($result->num_rows == 1) {
                        $data = $result->fetch_assoc();
                    $conn->close();
                    return $data;
                }
                else{
                    $conn->close();
                    echo "gagal";
                } 
            }
            else{
                $conn->close();
                echo "gagal";
            }
            
        }
    //}
    /*else{
        $_SESSION['error'] = 2;
        header("location:index.php");
    }*/
    
?>