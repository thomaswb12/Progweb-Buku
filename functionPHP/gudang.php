<?php
    require "koneksi.php";
    $callFunction = $_POST['function'];
    
    session_start();
    switch($callFunction){
        case 1: echo buatID();break;
    }

    function buatID(){
        global $conn;
        $sql = "select * from buku";
        if($result = $conn->query($sql)){
            $tamp = ($result->num_rows)+1;
            $ukuran = strlen($tamp);
            $string = "";
            for($i=0;$i<8-$ukuran;$i++){
                if($i<=1){
                    $string .="D";
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
        return $tamp;
        $conn->close();
    }

?>