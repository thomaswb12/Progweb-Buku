<h1>Laporan Keuangan</h1>
<div id="periode">
    <label id="periodeLabel" class="blue font15">Periode :</label>
    <input type="text"  placeholder="dd/mm/yyyy" class="font15" id="periodeAwal" name="periodeAwal"/>
    <p class="blue">s/d</p>
    <input type="text"  placeholder="dd/mm/yyyy" class="font15" id="periodeAkhir" name="periodeAkhir"/>
    <input type="button" id="OK" class="tombol" value="OK"/>
</div>
<!--bagian tabel laporan keuangan-->
<div id="tabel">
    <table>
        <thead>
            <th class="idTransaksi">ID Transaksi</th>
            <th class="tanggalTransaksi">Tgl Transaksi</th>
            <th class="idMember">ID Member</th>
            <th class="idKaryawan">ID Karyawan</th>
            <th class="idBuku">ID Buku</th>
            <th class="harga">Harga</th>
            <th class="denda">Denda</th>
            <th class="subTotal">Sub Total</th>
        </thead>
        <tbody>
            <tr>
                <td class="idTransaksi">1</td>
                <td class="tanggalTransaksi">01/01/2018</td>
                <td class="idMember">123</td>
                <td class="idKaryawan">456</td>
                <td class="idBuku">AB123</td>
                <td class="harga">Rp 3000</td>
                <td class="denda">Rp 0</td>
                <td class="subTotal">Rp 3000</td>
            </tr>
            <tr>
                <td colspan="7">TOTAL</td>
                <td id="total">Rp 3000</td>
            </tr>
        </tbody>
    </table>
</div>
<input type="button" id="print" name="print" class="tombol" value="PRINT"/>