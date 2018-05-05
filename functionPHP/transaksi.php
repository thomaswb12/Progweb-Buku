<?php
    require "koneksi.php";
    $callFunction = $_POST['function'];

    switch($callFunction){
        case 1: echo buatIdTransaksi();break;
        case 2 : $a = $_POST['id']; searchNama($a);break;
        case 3 : $a = $_POST['id'];cariBuku($a);break;
    }

    function buatIdTransaksi(){
        global $conn;
        $sql = "select * from transaksi";
        if($result = $conn->query($sql)){
            $tamp = ($result->num_rows)+1;
            $ukuran = strlen($tamp);
            $string = "";
            for($i=0;$i<8-$ukuran;$i++){
                if($i==0){
                    $string .="T";
                }
                else if($i == (8-$ukuran)-1){
                    $string.="$tamp";
                }
                else{
                    $string.="0";
                }
            }
            $conn->close();
            return $string; 
        }
        return "";
        $conn->close();
    }

    function searchNama($a){
        global $conn;
        $sql = "SELECT nama FROM member WHERE id like '$a'";
        if($result = $conn->query($sql)){
            if ($result->num_rows == 1) {
                while($row = $result->fetch_assoc()) {
                    echo $row['nama'];
                }
            }
            else{
                echo "ga ada";
            }
        }
        else{
            echo "ga ada";
        }
        $conn->close();
    }

    function cariBuku($a){
        global $conn;
        $sql = "SELECT * FROM eksbuku WHERE idEksBuku = '$a'";
        if($result = $conn->query($sql)){
            if ($result->num_rows == 1) {
                while($row = $result->fetch_assoc()) {
                    echo "ada";
                }
            }
            else{
                echo "ga ada";
            }
        }
        else{
            echo "ga ada";
        }
        $conn->close();
    }

?>