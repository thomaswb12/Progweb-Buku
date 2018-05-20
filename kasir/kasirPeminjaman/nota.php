<?php
    $servername = "localhost";
    $username = "progweb";
    $password = "ceria";
    $dbname = "progweb";
    $conn = new mysqli($servername, $username, $password, $dbname);
    $sql="SELECT transaksi.idTransaksi FROM transaksi ORDER BY tanggalTransaksi DESC LIMIT 1 ";
    $result=mysqli_query($conn,$sql);
    $idTrans="";
    if($result = $conn->query($sql)){
        while($rows = $result->fetch_assoc()){
            $idTrans=$rows["idTransaksi"];
        }
    }

    $sql="SELECT transaksi.idTransaksi,transaksi.tanggalTransaksi,member.nama as namaMember, member.id as idMember, karyawan.nama as namaKaryawan, karyawan.idKaryawan, transaksi.total, detailtransaksi.idEksBuku, buku.judulBuku, detailtransaksi.harga FROM transaksi, detailtransaksi,member,karyawan, buku, eksbuku WHERE detailtransaksi.idTransaksi=transaksi.idTransaksi AND transaksi.idMember=member.id AND transaksi.idKaryawan=karyawan.idKaryawan AND detailtransaksi.idEksBuku=eksbuku.idEksBuku AND eksbuku.idBuku=buku.idBuku AND transaksi.idTransaksi='$idTrans'";
    $result=mysqli_query($conn,$sql);
    $data=array();
    if($result = $conn->query($sql)){
        while($rows = $result->fetch_assoc()){
            $data[]=$rows;
        }
    }
    $idMember=$data[0]["idMember"];
    $sql = "SELECT DATE_FORMAT(birtday, '%m-%d') as b FROM member where id = '$idMember'";
    $diskon = 0;
    if($result = $conn->query($sql)){
        if($result->num_rows == 1){
            while($row = $result->fetch_assoc()){
                if(date("m-d")==$row['b']){
                    $diskon = $data[0]["total"]*0.1;
                } 
            }
        }
    }
    $tagihan=$data[0]["total"]-$diskon;

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
        h1{
            text-align: center;
            margin: 0px;
        }
        .right{
            float: right;
        }
        html{
            width:100%;
        }
        body{
            width:40%;
            padding: 10px;
        }
        th,td{ /*semua data didalam tabel*/
            
        }
        table{  /*tabelnya*/
            width: 70%;
            margin: auto;
            border-collapse: collapse;
        }
        p{
            margin: 0px;
        }
    </style>
</head>
<body>
    <header>
        <h1>NOTA PEMINJAMAN KOMIK</h1>
        <h1>TEPOZ</h1>
        <br/>
        <br/>
    </header>
    <section>
        <?php
            $tanggal = tanggal(substr($data[0]["tanggalTransaksi"],0,10));
            $jam = substr($data[0]["tanggalTransaksi"],10);
        ?>
        <p class="right">No. : <?php echo $data[0]["idTransaksi"]; ?> </p>
        <p><?php echo $tanggal.' '.$jam; ?> </p>
        <p>Kasir: <?php echo $data[0]["namaKaryawan"].' ('.$data[0]["idKaryawan"].')'; ?> </p>
        <p>To. : <?php echo $data[0]["namaMember"].' ('.$data[0]["idMember"].')'; ?> </p>
        <p>Rincian: <p><br/><br/>
        <table>
            <tr style="border-bottom: 1px solid black; text-align: left;">
                <th>ID Eks. Buku</th>
                <th>Judul Buku</th>
                <th style="text-align: right;">Harga</th>
            </tr>

            <?php
                foreach($data as $hasil){
                    echo '  <tr style="border-bottom: 1px dashed black;">
                                <td style="text-align: center;">'.$hasil['idEksBuku'].'</td>
                                <td style="text-align: center;">'.$hasil['judulBuku'].'</td>
                                <td style="text-align: right;">'.toRp($hasil['harga']).'</td>
                            </tr>';
                }
                echo '  <tr>
                            <td colspan="2">SUBTOTAL</td>
                            <td style="text-align: right;">'.toRp($data[0]["total"]).'</td>
                        </tr>
                        <tr>
                            <td colspan="2">DISKON</td>
                            <td style="text-align: right;">'.toRp($diskon).'</td>
                        </tr>
                        <tr>
                            <td colspan="2">TOTAL</td>
                            <td style="text-align: right;">'.toRp($tagihan).'</td>
                        </tr>';
            ?>
        </table>
        <br/><br/><br/>
    </section>
    <footer>
    </footer>
</body>
</html>