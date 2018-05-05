<?php
    include "koneksi.php";
    $a = $_POST['id'];
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
?>