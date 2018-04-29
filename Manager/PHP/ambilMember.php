<?php 
    function getMember(){
        global $conn;
        $sql =  " SELECT * FROM member WHERE statusPeminjaman = 'pinjam'";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($rows = $result->fetch_assoc()){
                //$data[] = array('judulBuku'=>$rows['judulBuku'],'Dipinjam'=>$rows['Dipinjam']);
            }
            return 1;
        }
        else{
            echo "gagal";
            return 0;
        } 
        
    }
?>