<?php
    require "koneksi.php"; 

    $sql = "INSERT INTO dummytransaksi (idBuku, idEksBuku, harga, tanggalPinjam, tanggalKembali,tanggalAturanKembali,denda,idTransaksi)
    VALUES ('John', 'Doe', 'john@example.com');";

    if ($conn->query($sql) === TRUE) {
        $sql1 = "SELECT * FROM dummytransaksi";
    
        if($result = $conn->query($sql1)){
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                   echo '<td class="idBuku">'.$row[''].'</td>
                    <td class="judulBuku">'.$row[''].'</td>
                    <td class="tanggalPengembalian">'.$row[''].'</td>
                    <td class="hargaSewa">Rp '.$row[''].'</td>
                    <td class="peringatan"><i class="fas fa-trash-alt"></i></td>';
                }
            } else {
                echo "0 results";
            }
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }



    $conn->close();

?>