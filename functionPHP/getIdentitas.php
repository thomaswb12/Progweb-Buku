<?php 
    require("koneksi.php");
    $sql =  " SELECT * FROM karyawan where idKaryawan = '".$_SESSION['id']."' and pass = '".hash('sha256',$_SESSION['pass'])."'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        while($row = $result->fetch_assoc()) {
            $_SESSION['idJabatan'] = $row["idJabatan"];
            $_SESSION['nama'] = $row['nama'];
        }
    } 
    else {
        $_SESSION['error'] = 1;
        header("location:index.php");
    }

    $conn->close();
?>