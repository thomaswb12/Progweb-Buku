<?php
        include "koneksi.php";

        $idKomik = $_POST['idKomik'];

        $sql = "SELECT * from buku where idBuku= '$idKomik'";
        $result = $conn->query($sql);
        if($result->num_rows==1){
            $sql1 = "SELECT * from eksbuku where idBuku= '$idKomik'";
            $result1 = $conn->query($sql1);
            $tamp = "KK";
            for($i=0;$i<6-strlen($result1->num_rows+1);$i++){
                $tamp .="0";
            }
            $tamp.=($result1->num_rows+1);
            $hasil = $idKomik. $tamp;
            $conn->close();
            echo $idKomik. $tamp;
        }
        else{
            echo "ga ada";
        }
?>