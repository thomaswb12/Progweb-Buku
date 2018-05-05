<?php
    require "koneksi.php";
    $callFunction = $_POST['function'];

    switch($callFunction){
        case 1: echo buatIdTransaksi();break;
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

?>