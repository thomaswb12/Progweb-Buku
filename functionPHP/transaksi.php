<?php
    require "koneksi.php";
    $callFunction = $_POST['function'];
    
    session_start();
    switch($callFunction){
        case 1: echo buatIdTransaksi(1);break;
        case 2 : $a = $_POST['id']; searchNama($a);break;
        case 3 : $a = $_POST['id'];cariBuku($a);break;
        case 4 : transaksi($_POST['idEksBuku'],$_POST['idMember'],$_POST['idTransaksi']);break;
        case 5 : buatTabel();break;
        case 6 : truncate(1);break;
        case 7 : hapus($_POST['id']);break;
        case 8 : insert($_POST['idMember'],$_POST['idEksBuku'],$_POST['idTransaksi'],$_SESSION['id'],$_POST['diskon'],$_POST['sub']);break;
        case 9 : total(1);break;
        case 10 : echo buatIdTransaksi(2); break;
        case 11 : buatTabelPengembalian($_POST['idMember']); break;
        case 12 : actionPengembalian($_POST['id'],$callFunction);break;
        case 13 : actionPengembalian($_POST['id'],$callFunction);break;
        case 14 : truncate(2);break;
        case 15 : insert1($_POST['idMember'],$_POST['idTransaksi'],$_SESSION['id']);break;
        case 16 : diskon($_POST['data'],1,$_POST['total']);break;
        case 17 : total1(1);break;
    }

    function diskon($data,$cek,$total){
        if($cek==1){
            include "curency.php";
        }
        $sql = "SELECT birtday FROM member where id = '$data'";
        global $conn;
        $tamp = 0;
        if($result = $conn->query($sql)){
            if($result->num_rows == 1){
                while($row = $result->fetch_assoc()){
                    if(date("Y-m-d")==$row['birtday']){
                        $tamp = (toNumber($total)*0.1);
                        //echo $row['birtday'];
                    } 
                }
            }
        }
        $conn->close();
        if($cek==1){
            //echo $row['birtday'];
            $returnObject = array(
                'diskon'=>toRp($tamp),
                'total'=>toRp(toNumber($total)-$tamp)
            );
        
            $JSON_Object = json_encode($returnObject);
            echo $JSON_Object;
           
        }
        else{
            return $tamp;
        }
    }

    function cekdummy1($idTransaksi){
        global $conn;
        $sql = "SELECT idTransaksi from dummydetailpengembalian where idTransaksi = '$idTransaksi';";
        if($result = $conn->query($sql)){
            return $result->num_rows;
        }
    }

    function insert1($idMember,$idTransaksi,$idKaryaawan){
        global $conn;
        $tamp = cekdummy1($idTransaksi);
        if($tamp==0){
            echo "apa yang mau di kembaliin";   
        }
        else{
            $total = total1(2);
            $sql = "INSERT INTO pengembalian (idTransaksi,tanggalTransaksi,idMember,idKaryawan,totalDenda) values ('$idTransaksi', now(),'$idMember','$idKaryaawan',$total);";
            $sql .= "INSERT INTO detailpengembalian SELECT * FROM dummydetailpengembalian;";
            $sql .= "TRUNCATE table dummydetailpengembalian;";
    
            
            if ($conn->multi_query($sql) === TRUE) {
                echo "berhasil";
            } 
            else {
                echo $sql;
            }
        }
        $conn->close();
    }

    function total1($cek){
        include "curency.php";
        global $conn;
        $sql = "SELECT denda FROM dummydetailpengembalian";
        $tamp = 0;
        if($result = $conn->query($sql)){
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    $tamp += $row['denda'];
                }
            }
        }
        if($cek==1){
            echo toRp($tamp);
        }
        else{
            return $tamp; 
        }
        $conn->close();
    }
    function actionPengembalian($data,$status){
        global $conn;
        include "curency.php";
        if($status==13){
            $id = $data['id'];
            $tglPinjam = $data['tglPinjam'];
            $tglKembali = $data['tglKembali'];
            $denda = $data['denda'];
            $idTrans = $data['idTrans'];
            $idTransaksi = $data['idTransaksi'];
            $sql = "INSERT INTO `dummydetailpengembalian` (idTransaksiPeminjaman,`idEksBuku`, `denda`, `tanggalPinjam`, `tanggalAturanKembali`, tanggalKembali,`idTransaksi`) VALUES ('$idTransaksi','$id',".toNumber($denda).",'".toTanggal($tglPinjam)."','".toTanggal($tglKembali)."',CURRENT_DATE(),'$idTrans')";
        }
        else{
            $id = $data['id'];
            $idTransaksi = $data['idTransaksi'];
            $sql = "DELETE FROM dummydetailpengembalian WHERE idEksBuku='$id' and idTransaksiPeminjaman='$idTransaksi'";
        }
        if ($conn->query($sql) === TRUE) {
            echo "successfully";
        } 
        else {
            echo "Error record: " . $conn->error;
        }
        $conn->close();
    }

    function buatTabelPengembalian($idMember){
        global $conn;
        include "telatDenda.php";
        $sql = "SELECT d.*,b.judulBuku FROM transaksi as t,detailtransaksi as d , eksbuku as e, buku as b where d.idEksBuku = e.idEksBuku and e.idBuku = b.idBuku and d.idTransaksi = t.idTransaksi and t.idMember = '$idMember' and d.tanggalKembali is NULL;";
        if($result = $conn->query($sql)){
            if($result->num_rows>0){
                while($row = $result->fetch_assoc()){
                    echo '<tr onclick="pencetTRPengembalian($(this))">
                            <td class="tandaTable"><i class="fas fa-check" style="color:grey"></i></td>
                            <td class="idTransaksiPeminjaman ganti">'.$row['idTransaksi'].'</td>
                            <td class="idBuku ganti">'.$row['idEksBuku'].'</td>
                            <td class="judulBuku ganti">'.$row['judulBuku'].'</td>
                            <td class="tanggalPinjam ganti">'.tanggal($row['tanggalPinjam']).' </td>
                            <td class="tanggalPengembalian ganti">'.tanggal($row['tanggalAturanKembali']).'</td>
                            <td class="telat ganti">'.hariTelat(date("Y-m-d"),$row['tanggalAturanKembali']).'</td>
                            <td class="denda ganti">'.dendaDalamRp(date("Y-m-d"),$row['tanggalAturanKembali']).'</td>
                        </tr>';
                }
            }
            else{
                echo ' ';
            }
        }
        $conn->close();
    }

    function total($cek){
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
        if($cek==1){
            echo toRp($tamp);
            $conn->close();
        }
    }

    function cekdummy($idTransaksi){
        global $conn;
        $sql = "SELECT idTransaksi from dummydetailtransaksi where idTransaksi = '$idTransaksi';";
        if($result = $conn->query($sql)){
            return $result->num_rows;
        }
    }

    function insert($idMember,$idEksBuku,$idTransaksi,$idKaryaawan,$diskon,$sub){
        include "curency.php";
        global $conn;
        $tamp = cekdummy($idTransaksi);
        if($tamp == 0){
            echo "Masih kosong";
        }
        else{
            $total = toNumber($sub);
            $diskon = toNumber($diskon);
            $tot = ($total-$diskon);
            $sql = "INSERT INTO transaksi (idTransaksi,tanggalTransaksi,idMember,idKaryawan,subTotal,diskon,total) values ('$idTransaksi', now(),'$idMember','$idKaryaawan',$total,$diskon,$tot);";
            $sql .= "INSERT INTO detailtransaksi SELECT * FROM dummydetailtransaksi;";
            $sql .= "TRUNCATE table dummydetailtransaksi;";
            
            if ($conn->multi_query($sql) === TRUE) {
                echo "berhasil";
            } 
            else {
                echo "gagal";
            }
        }
        $conn->close();
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
        $conn->close();
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

    function buatIdTransaksi($kode){
        global $conn;
        if($kode==1)
            $sql = "select * from transaksi";
        else
            $sql = "select * from pengembalian";

        if($result = $conn->query($sql)){
            $tamp = ($result->num_rows)+1;
            $ukuran = strlen($tamp);
            $string = "";
            for($i=0;$i<8-$ukuran;$i++){
                if($i==0){
                    if($kode == 1)$string .="T";
                    else $string .="P";
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

    function truncate($tamp){
        global $conn;
        if($tamp==1)$sql = "TRUNCATE table dummydetailtransaksi";
        else $sql = "TRUNCATE table dummydetailpengembalian";
        if($conn->query($sql)){
        }
        $conn->close();
    }
?>