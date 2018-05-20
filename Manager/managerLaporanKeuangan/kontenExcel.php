<?php
    $servername = "localhost";
    $username = "progweb";
    $password = "ceria";
    $dbname = "progweb";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    $data=array();

    //dari bulan ini --> 1 bulan
    $bulan=date('m');

    //ambil data dari transaksi peminjaman -->masukkan ke array $data[]
    $sql="SELECT transaksi.tanggalTransaksi, transaksi.idTransaksi,member.id, karyawan.idKaryawan, eksbuku.idEksBuku, detailtransaksi.harga, detailtransaksi.denda, detailtransaksi.harga+detailtransaksi.denda AS total FROM transaksi, member, karyawan, eksbuku, detailtransaksi WHERE transaksi.idMember=member.id AND transaksi.idKaryawan=karyawan.idKaryawan AND transaksi.idTransaksi=detailtransaksi.idTransaksi AND detailtransaksi.idEksBuku=eksbuku.idEksBuku AND MONTH(transaksi.tanggalTransaksi)=$bulan";
    $result=mysqli_query($conn,$sql);
    if($result = $conn->query($sql)){
        while($rows = $result->fetch_assoc()){
            $data[]=$rows;
        }
    }
    //ambil data dari transaksi pengembalian -->masukkan ke array $data[]
    $sql="SELECT pengembalian.tanggalTransaksi, pengembalian.idTransaksi,member.id, karyawan.idKaryawan, eksbuku.idEksBuku, 0 as harga, detailpengembalian.denda, detailpengembalian.denda AS total FROM pengembalian, member, karyawan, eksbuku, detailpengembalian WHERE pengembalian.idMember=member.id AND pengembalian.idKaryawan=karyawan.idKaryawan AND pengembalian.idTransaksi=detailpengembalian.idTransaksi AND detailpengembalian.idEksBuku=eksbuku.idEksBuku AND MONTH(pengembalian.tanggalTransaksi)=$bulan";
    $result=mysqli_query($conn,$sql);
    while($rows = $result->fetch_assoc()){
        $data[]=$rows;
    }
    //urutkan berdasar tanggal transaksi
    function date_compare($a, $b){
        $t1 = strtotime($a['tanggalTransaksi']);
        $t2 = strtotime($b['tanggalTransaksi']);
        return $t1 - $t2;
    }    
    usort($data, 'date_compare');
    $conn->close();

    $bulan=date('m');
    if($bulan =='01') $bulan="Januari";
    else if($bulan =='02') $bulan="Februari";
    else if($bulan =='03') $bulan="Maret";
    else if($bulan =='04') $bulan="April";
    else if($bulan =='05') $bulan="Mei";
    else if($bulan =='06') $bulan="Juni";
    else if($bulan =='07') $bulan="Juli";
    else if($bulan =='08') $bulan="Agustus";
    else if($bulan =='09') $bulan="September";
    else if($bulan =='10') $bulan="Oktober";
    else if($bulan =='11') $bulan="November";
    else if($bulan =='12') $bulan="Desember";

    function toRp($temp){
        $hasil_rupiah = "Rp. " . number_format($temp,0,',','.');
        return $hasil_rupiah;
    }

    function tanggal($temp){
        //atur bulan bahasa indonesia
        $tahun =  substr($temp,0,4);
        $bulan = substr($temp,5,2);
        $hari =  substr($temp,8,2);

        if($bulan =='01') $bulan="Januari";
        else if($bulan =='02') $bulan="Februari";
        else if($bulan =='03') $bulan="Maret";
        else if($bulan =='04') $bulan="April";
        else if($bulan =='05') $bulan="Mei";
        else if($bulan =='06') $bulan="Juni";
        else if($bulan =='07') $bulan="Juli";
        else if($bulan =='08') $bulan="Agustus";
        else if($bulan =='09') $bulan="September";
        else if($bulan =='10') $bulan="Oktober";
        else if($bulan =='11') $bulan="November";
        else if($bulan =='12') $bulan="Desember";
        return "$hari $bulan $tahun";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        th,td{ /*semua data didalam tabel*/
            text-align: center;
            border: 2px solid black; 
        }
        table{  /*tabelnya*/
            width: 98%;
            margin: auto;
            border-collapse: collapse;
        }
        h1{
            text-align: center;
        }
    </style>
</head>
<body>
    <h1>Laporan Keuangan Bulan <?php echo $bulan ?></h1>

    <!--bagian tabel laporan keuangan-->
    <div id="tabel">
        <table style="border-collapse: collapse;">
            <thead>
                <th class="tanggalTransaksi">Tgl Transaksi</th>
                <th class="idTransaksi">ID Transaksi</th>
                <th class="idMember">ID Member</th>
                <th class="idKaryawan">ID Karyawan</th>
                <th class="idBuku">ID Buku</th>
                <th class="harga">Harga</th>
                <th class="denda">Denda</th>
                <th class="subTotal">Sub Total</th>
            </thead>
            <tbody>            
            <?php
                $total=0;
                foreach($data as $data){
                    $total+=$data["total"];
                    $tanggal = tanggal(substr($data["tanggalTransaksi"],0,10));
                    $jam = substr($data["tanggalTransaksi"],10);
                    echo    '<tr>
                                <td class="tanggalTransaksi">'.$tanggal.' '.$jam.'</td>
                                <td class="idTransaksi">'.$data["idTransaksi"].'</td>
                                <td class="idMember">'.$data["id"].'</td>
                                <td class="idKaryawan">'.$data["idKaryawan"].'</td>
                                <td class="idBuku">'.$data["idEksBuku"].'</td>
                                <td class="harga">'.toRp($data["harga"]).'</td>
                                <td class="denda">'.toRp($data["denda"]).'</td>
                                <td class="subTotal">'.toRp($data["total"]).'</td>
                            </tr>';
                }
                echo ' <tr>
                        <td colspan="7">TOTAL</td>
                        <td id="total">'.toRp($total).'</td>
                    </tr>';
            ?>
            </tbody>
        </table>
    </div>
</body>
</html>