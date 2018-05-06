<?php
    require "koneksi.php";
    $callFunction = $_POST['function'];
    

    switch($callFunction){
        case 1: echo buatIdTransaksi();break;
        case 2 : $a = $_POST['id']; searchNama($a);break;
        case 3 : $a = $_POST['id'];cariBuku($a);break;
        case 4 : transaksi($_POST['idEksBuku'],$_POST['idMember'],$_POST['idTransaksi']);break;
        case 5 : buatTabel();break;
        case 6 : truncate();break;
    }

    function buatTabel(){
        global $conn;
        $sql = "SELECT d.*,b.judulBuku FROM dummydetailtransaksi as d , eksbuku as e, buku as b where d.idEksBuku = e.idEksBuku and e.idBuku = b.idBuku";
        if($result = $conn->query($sql)){
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $a = $row;
                    echo '<tr>
                            <td class="idBuku">'.$row['idEksBuku'].'</td>
                            <td class="judulBuku">'.$row['judulBuku'].'</td>
                            <td class="tanggalPengembalian">'.$row['tanggalAturanKembali'].'</td>
                            <td class="hargaSewa">'.$row['harga'].'</td>
                            <td class="peringatan"><i class="fas fa-trash-alt"></i></td>
                        </tr>';
                }
            }
        }
    }

    function transaksi($idEksBuku,$idMember,$idTransaksi){
        global $conn;
        $sql = "INSERT INTO `dummydetailtransaksi` (`idEksBuku`, `harga`, `tanggalPinjam`, `tanggalAturanKembali`, `idTransaksi`) VALUES ('$idEksBuku',0,CURRENT_DATE(),date(CURRENT_DATE()+7),'$idTransaksi')";
        if($conn->query($sql)){
            echo "berhasil";
        }
        else{
            echo "gagal";
        }
        $conn->close();
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
        return "gagal";
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
        $sql = "SELECT * FROM eksbuku WHERE idEksBuku = '$a' and eksbuku.Status = 'Tersedia' ";
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

    function truncate(){
        global $conn;
        $sql = "TRUNCATE table dummydetailtransaksi";
        if($conn->query($sql)){
            $conn->close();
        }
        $conn->close();
    }
?>