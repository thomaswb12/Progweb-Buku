<h1 onclick="pencet()" class="enter">Peminjaman</h1>
<div class="position">
    <div id="pinggirKiri" class="floatKiri">
        <i class="fas fa-user simbol" id="simbolOrang"></i>
        <div class="floatKanan margin" id="divInputKiri">
            <label for="">ID Member</label>
            <br>
            <input id="inputID" oninput="searchNama()" type="text"><br>
            <label>Nama</label><br>
            <input id="namaMember" class="disable" type="text" disabled="disabled">
        </div>
    </div>
    <div id="pinggirKanan">
        <div id="divSimbolBuku"><i class="fas fa-book simbol" id="simbolBuku"></i></div>
        <div id="divIdDanPlus">
            <div id="divInputIdBuku">
                <label>ID Eks Buku</label><br>
                <input oninput="cariBuku()" class="margin" type="text" name="inputIdBuku" id="inputIdEksBuku">
            </div>
            <div id="divSimbolPlus"><i onclick="tambahPeminjaman()" class="klik fas fa-plus-circle simbol" id="simbolPlus"></i></div>
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
            <tbody>
                <tr>
                    <td class="idBuku">1234</td>
                    <td class="judulBuku">Naruto ketemu monika sujanto asdas</td>
                    <td class="tanggalPengembalian">08/12/2018</td>
                    <td class="hargaSewa">Rp 10000</td>
                    <td class="peringatan"><i class="fas fa-trash-alt"></i></td>
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
        <input class="tombol" id="cancel" name="cancel" type="button" value="Cancel">
    </div>
    <script src="Kasir - peminjaman/Kasir - peminjaman.js"></script>
</div>