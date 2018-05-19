<h1>Laporan Keuangan</h1>
<div id="periode">
    <label id="periodeLabel" class="blue font15">Periode :</label>
    <input type="date" class="font15" id="periodeAwal" name="periodeAwal"/>
    <p class="blue">s/d</p>
    <input type="date" class="font15" id="periodeAkhir" name="periodeAkhir"/>
    <input type="button" id="OK" class="tombol" value="OK" onclick="searchDaftarLaporanKeuangan()"/>
</div>
<!--bagian tabel laporan keuangan-->
<div id="tabel">
    <table>
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
            
            <tr>
                <td colspan="7">TOTAL</td>
                <td id="total">Rp 3000</td>
            </tr>
        </tbody>
    </table>
</div>
<input type="button" id="print" name="print" class="tombol" value="PRINT"/>


<?php
/*
    require "../../functionPHP/koneksi.php";
    $sql="SELECT transaksi.idTransaksi, transaksi.tanggalTransaksi from transaksi";
    $result=mysqli_query($conn,$sql);
    if($result = $conn->query($sql)){
        $data=array();
        while($rows = $result->fetch_assoc()){
            $data[]=$rows;
        }
    }
    $sql="SELECT pengembalian.idTransaksi, pengembalian.tanggalTransaksi from pengembalian";
    $result=mysqli_query($conn,$sql);
    while($rows = $result->fetch_assoc()){
        $data[]=$rows;
    }
    function date_compare($a, $b){
        $t1 = strtotime($a['tanggalTransaksi']);
        $t2 = strtotime($b['tanggalTransaksi']);
        return $t1 - $t2;
    }    
    usort($data, 'date_compare');
    foreach($data as $apa){
        echo $apa["idTransaksi"]."  ".$apa["tanggalTransaksi"]."<br/>";
    }
    */
?>