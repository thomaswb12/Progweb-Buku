<?php
    if(isset($_SESSION['id']) || $_SESSION['control'] != 1){
        require("koneksi.php");


        function getBuku(){
            global $conn;
            $sql =  " SELECT * FROM buku";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($rows = $result->fetch_assoc()){
                    $data[] = $rows;
                }
            }
            else{
                echo "gagal";
            } 
            $conn->close();
            return $data;
        }
        function jumlahEksemplar(){
            global $conn;
            $sql =  "SELECT * FROM";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                while($rows = $result->fetch_assoc()){
                    $data[] = array('judulBuku'=>$rows['judulBuku'],'Dipinjam'=>$rows['Dipinjam']);
                    
                }
            }
            else{
                echo "gagal";
            } 
            $conn->close();
            return $data;
        }
    }
    else{
        $_SESSION['error'] = 2;
        header("location:index.php");
    }
    
?>