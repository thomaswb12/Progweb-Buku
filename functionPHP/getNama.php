<?php
    include "koneksi.php";
    $a = $_POST['id'];
    $sql = "SELECT nama FROM member WHERE id like '$a'";
    if($result = $conn->query($sql)){
        if ($result->num_rows > 0) {
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
?>