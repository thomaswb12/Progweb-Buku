<h1>Pengembalian</h1>
<div id="bungkus" style=" margin:auto; width : 95%; height:100%;">
    <div>
        <form action="">
            <div id="atasTabel">
                <div id="kiri">
                    <i class="fas fa-user simbol" id="simbolOrang"></i>
                    <div>
                        <label>ID Member</label><br>
                        <input id="inputID" oninput="transaksi(11)" type="text"><br>
                        <label>Nama</label><br>
                        <input id="namaMember" class="disable" type="text" disabled="disabled">
                    </div>
                </div>
                <div id="kanan">
                    <div id="divSimbolTransaksi"><i class="fas fa-sticky-note simbol" id="simbolTransaksi"></i></div>
                    <div id="divIdTransaksi">
                        <label>ID Transaksi</label><br>
                        <input id="idTransaksiPengembalian" name="idTransaksiPengembalian" class="disable" type="text" disabled="disabled">
                    </div>
                </div>
            </div>
        </form>
    </div>
    <br>
    <div id="tabelDaftar">
        <table>
            <thead>
                <th class="tandaTable"></th>
                <th class="idTransaksiPeminjaman">ID Peminjaman</th>
                <th class="idBuku">ID Eksemplar Buku</th>
                <th class="judulBuku">Judul Buku</th>
                <th class="tanggalPinjam">Tanggal Pinjam</th>
                <th class="tanggalPengembalian">Tanggal Pengembalian</th>
                <th class="telat">Telat</th>
                <th class="denda">Denda</th>
            </thead>
            <tbody>
            </tbody>
            <tfoot>
                <tr class="tebal">
                    <td class="tandaTable"></td>
                    <td colspan="6">Total</td>
                    <td id="totalDenda">Rp 0</td>
                </tr>
            </tfoot>
        </table>
    </div>
    <div id="divTombol">
        <input class="tombol"  onclick="transaksi(15)" id="print" name="print" type="button" value="Print Nota">
    </div>
</div>