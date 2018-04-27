<?php
    include "../../../koneksi.php";
    $sql = "SELECT nama FROM member WHERE id = ".$_POST['id']."";
    if($result = $conn->query($sql)){
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo $row['nama'];
            }
        } 
        else {
            echo " ";
        }
    }

    
    /**/
    $conn->close();
?>