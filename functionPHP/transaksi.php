<?php
    require "koneksi.php";
    $callFunction = $_POST['function'];
    
    session_start();
    switch($callFunction){
        case 1: echo buatIdTransaksi();break;
        case 2 : $a = $_POST['id']; searchNama($a);break;
        case 3 : $a = $_POST['id'];cariBuku($a);break;
        case 4 : transaksi($_POST['idEksBuku'],$_POST['idMember'],$_POST['idTransaksi']);break;
        case 5 : buatTabel();break;
        case 6 : truncate();break;
        case 7 : hapus($_POST['id']);break;
        case 8 : insert($_POST['idMember'],$_POST['idEksBuku'],$_POST['idTransaksi'],$_SESSION['id']);break;
        case 9 : total();break;
    }

    function total(){
        include "curency.php";
        global $conn;
        $sql = "SELECT harga FROM dummydetailtransaksi";
        $tamp = 0;
        if($result = $conn->query($sql)){
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $tamp += $row['harga'];
                }
            }
        }
        echo toRp($tamp);
    }

    function insert($idMember,$idEksBuku,$idTransaksi,$idKaryaawan){
        $sql = "INSERT INTO transaksi (idTransaksi,tanggalTransaksi,idMember,idKaryawan,total) values ('$idTransaksi',date,'$idMember','idKaryaawan',0)";
    }

    function hapus($a){
        global $conn;
        $sql = "DELETE FROM dummydetailtransaksi where idEksBuku = '$a'";
        if($conn->query($sql)){
        }
        $conn->close();

    }

    function buatTabel(){
        global $conn;
        include "curency.php";
        $sql = "SELECT d.*,b.judulBuku FROM dummydetailtransaksi as d , eksbuku as e, buku as b where d.idEksBuku = e.idEksBuku and e.idBuku = b.idBuku";
        if($result = $conn->query($sql)){
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    echo '<tr>
                            <td class="idBuku">'.$row['idEksBuku'].'</td>
                            <td class="judulBuku">'.$row['judulBuku'].'</td>
                            <td class="tanggalPengembalian">'.tanggal($row['tanggalAturanKembali']).'</td>
                            <td class="hargaSewa">'.toRp($row['harga']).'</td>
                            <td class="peringatan"><i onclick="transaksiHapus(7,$(this))" i="'.$row['idEksBuku'].'" class="klik fas fa-trash-alt"></i></td>
                        </tr>';
                }
            }
        }
    }

    function transaksi($idEksBuku,$idMember,$idTransaksi){
        include "getDataBuku.php";
        $tgl="";
        $special="";
        $sql = "SELECT b.tanggalTerbit,b.specialEdition FROM buku as b, eksbuku as e where b.idBuku = e.idBuku and e.idEksBuku = '$idEksBuku'";
        if($result = $conn->query($sql)){
            if($result->num_rows==1){
                $row = $result->fetch_assoc();
                $tgl = $row['tanggalTerbit'];
                $special = $row['specialEdition'];
            }
        }
        $get_harga = getHargaBuku($tgl,$special);
        
        $sql = "INSERT INTO `dummydetailtransaksi` (`idEksBuku`, `harga`, `tanggalPinjam`, `tanggalAturanKembali`, `idTransaksi`) VALUES ('$idEksBuku',$get_harga,CURRENT_DATE(),date(CURRENT_DATE()+7),'$idTransaksi')";
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
        $sql = "SELECT e.idEksBuku FROM eksbuku as e WHERE e.idEksBuku = '$a' and e.Status = 'Tersedia'";
        if($result = $conn->query($sql)){
            if ($result->num_rows == 1) {
                $sql1 = "SELECT d.idEksBuku FROM dummydetailtransaksi as d WHERE d.idEksBuku = '$a'";
                $result1 = $conn->query($sql1);
                if($result1->num_rows == 0){
                    echo "ada";
                }
                else{
                    echo "ga ada";
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
        }
        $conn->close();
    }
?>