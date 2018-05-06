<h1 onclick="pencet()" class="enter">Peminjaman</h1>
<div class="position">
    <div id="pinggirKiri" class="floatKiri">
        <i class="fas fa-user simbol" id="simbolOrang"></i>
        <div class="floatKanan margin" id="divInputKiri">
            <label for="">ID Member</label>
            <br>
            <input id="inputID" oninput="transaksi(2)" type="text"><br>
            <label>Nama</label><br>
            <input id="namaMember" class="disable" type="text" disabled="disabled">
        </div>
    </div>
    <div id="pinggirKanan">
        <div id="divSimbolTransaksi"><i class="fas fa-sticky-note simbol" id="simbolTransaksi"></i></div>
        <div id="divIdTransaksi">
            <label>ID Transaksi</label><br>
            <input id="idTransaksi" class="disable" type="text" disabled="disabled">
        </div>
        <br>
        <div id="divSimbolBuku"><i class="fas fa-book simbol" id="simbolBuku"></i></div>
        <div id="divIdDanPlus">
            <div id="divInputIdBuku">
                <label>ID Eks Buku</label><br>
                <input oninput="transaksi(3)" class="margin" type="text" name="inputIdBuku" id="inputIdEksBuku">
            </div>
            <div id="divSimbolPlus"><i onclick="transaksi(4)" class="klik fas fa-plus-circle simbol" id="simbolPlus"></i></div>
            <p id="tidakAdaEks" class="warning">Buku tidak ada</p>
        </div>
    </div>
</div>
<div id="bagianTabel">
    <div id="tabelDaftar">
        <table>
            <thead>
                <th class="idBuku">ID Eks Buku</th>
                <th class="judulBuku">Judul Buku</th>
                <th class="tanggalPengembalian">Tanggal Pengembalian</th>
                <th class="hargaSewa">Harga Sewa</th>
                <th class="peringatan"></th>
            </thead>
            <tbody id="bodytable">
                <tr style="color: 1px solid black;">
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">Diskon</td>
                    <td>Rp 0</td>
                </tr>
                <tr class="tebal">
                    <td colspan="3">Total</td>
                    <td>Rp 6.000</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div id="divTombol">
        <input class="tombol" id="print" name="print" type="button" value="Print Nota">
        <input class="tombol" onclick="transaksi(6)" id="cancel" name="cancel" type="button" value="Cancel">
    </div>
</div>