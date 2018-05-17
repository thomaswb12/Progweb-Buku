<?php   
    require "koneksi.php";
    include "curency.php";
    $idMember = $_POST['keyword']; 

    //untuk menampilkan detail informasi mengenai member tersebut
    $sql="SELECT member.* from member where member.id='$idMember'";
    $result = $conn->query($sql);
    if($result = $conn->query($sql)){
        while($rows = $result->fetch_assoc()){     
            echo '  <div id="isiPopup">
                    <h2 style="text-align:center">Detail Peminjaman</h2>
                    <table id="tablePopup">
                        <tr>
                            <td class="divSimbolPopup"><i class="fas fa-id-card-alt simbolPopup"></i></td>
                            <td class="atribut">ID Member</td>
                            <td class="value">: '.$rows['id'].'</td>
                        </tr>
                        <tr>
                            <td class="divSimbolPopup"><i class="fas fa-user simbolPopup"></i></td>
                            <td class="atribut">Nama</td>
                            <td class="value">: '.$rows['nama'].'</td>
                        </tr>
                        <tr>
                            <td class="divSimbolPopup"><i class="fas fa-home simbolPopup"></i></td>
                            <td class="atribut">Alamat</td>
                            <td class="value">: '.$rows['alamat'].'</td>
                        </tr>
                        <tr>
                            <td class="divSimbolPopup"><i class="fas fa-phone simbolPopup"></i></td>
                            <td class="atribut">No Telp.</td>
                            <td class="value">: '.$rows['noTelp'].'</td>
                        </tr>
                        <tr>
                            <td class="divSimbolPopup"><i class="fas fa-envelope simbolPopup"></i></td>
                            <td class="atribut">Email</td>
                            <td class="value">: '.$rows['email'].'</td>
                        </tr>
                        <tr>
                            <td class="divSimbolPopup"><i class="fas fa-book simbolPopup"></i></td>
                            <td colspan="2">Daftar komik yang masih dipinjam :</td>
                        </tr>
                    </table>';
        }
    }
    else{
        echo "gagal";
    }

    //untuk menampilkan daftar komik yang sedang dipinjam
    $query="SELECT member.nama, detailtransaksi.tanggalAturanKembali, detailtransaksi.tanggalPinjam, detailtransaksi.idEksBuku, buku.judulBuku from detailtransaksi, member, transaksi, eksbuku, buku where member.id='$idMember' AND member.id=transaksi.idMember AND transaksi.idTransaksi=detailtransaksi.idTransaksi AND detailtransaksi.idEksBuku=eksbuku.idEksBuku AND eksbuku.Status='Dipinjam' AND eksbuku.idBuku=buku.idBuku ORDER BY transaksi.tanggalTransaksi DESC";
    $hasil=mysqli_query($conn,$query);
    if($hasil = $conn->query($query)){
        $data=array();
        $index=0;
        while($rows = $hasil->fetch_assoc()){
            //kalau sudah ada ideks buku yang sama gausah tampilin
            $cek=0;
            $indexCek=0;
            if(!empty($data)){
                foreach($data as $dataCek){
                    if($data[$indexCek]['idEksBuku']==$rows['idEksBuku']){
                        $cek=1;
                        break;
                    }
                    $indexCek++;
                }
            }
            if($cek==0){
                $data[$index] = $rows;
                $index++;
            }
        }
        //urut berdasar tanggal aturan kembali
        //urut dari yang peling TELAT
        function date_compare($a, $b){
            $t1 = strtotime($a['tanggalAturanKembali']);
            $t2 = strtotime($b['tanggalAturanKembali']);
            return $t1 - $t2;
        }    
        usort($data, 'date_compare');
        $conn->close();
    }
    else{
        $conn->close();
        echo "gagal";
    }
    echo '  <div id="divTablePopupDaftar">
                <table id="tablePopupDaftar">
                    <tr>
                        <th>ID Eks. Buku</th>
                        <th>Judul Buku</th>
                        <th>Tanggal Pinjam</th>
                        <th>Tanggal Aturan Pengembalian</th>
                        <th class="peringatan">Peringatan</th>
                    </tr>
            ';
    foreach($data as $daftar){
        echo '  <tr>
                    <td>'.$daftar['idEksBuku'].'</td>
                    <td>'.$daftar['judulBuku'].'</td>
                    <td>'.$daftar['tanggalPinjam'].'</td>
                    <td>'.$daftar['tanggalAturanKembali'].'</td>
                    <td class="peringatan"> </td>
                </tr>';
    }
    echo '      </table>
            </div>
        </div>';
?>