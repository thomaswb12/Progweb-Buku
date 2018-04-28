<h1>Pengembalian</h1>
<div>
    <form action="">
        <div id="atasTabel">
            <i class="fas fa-user simbol" id="simbolOrang"></i>
            <div>
                <label>ID Member</label><br>
                <input id="inputID" oninput="searchNama()" type="text"><br>
                <label>Nama</label><br>
                <input id="namaMember" class="disable" type="text" disabled="disabled">
            </div>
        </div>
    </form>
</div>
<div id="tabelDaftar">
    <table>
        <thead>
            <th class="tandaTable"></th>
            <th class="idBuku">ID Buku</th>
            <th class="judulBuku">Judul Buku</th>
            <th class="tanggalPinjam">Tanggal Pinjam</th>
            <th class="tanggalPengembalian">Tanggal Pengembalian</th>
            <th class="telat">Telat</th>
            <th class="denda">Denda</th>
        </thead>
        <tbody>
            <tr onclick="pencetTRPengembalian($(this))">
                <td class="tandaTable"></td>
                <td class="idBuku">1234567788</td>
                <td class="judulBuku">Naruto</td>
                <td class="tanggalPinjam">01/01/2018</td>
                <td class="tanggalPengembalian">09/01/2018</td>
                <td class="telat">-</td>
                <td class="denda">Rp 0</td>
            </tr>
            <tr onclick="pencetTRPengembalian($(this))">
                <td class="tandaTable"></td>
                <td class="idBuku">1234567788</td>
                <td class="judulBuku">Naruto</td>
                <td class="tanggalPinjam">01/01/2018</td>
                <td class="tanggalPengembalian">05/01/2018</td>
                <td class="telat">1 hari</td>
                <td class="denda">Rp 500</td>
            </tr>
            <tr onclick="pencetTRPengembalian($(this))">
                <td class="tandaTable"></td>
                <td class="idBuku">1234567788</td>
                <td class="judulBuku">Naruto</td>
                <td class="tanggalPinjam">01/01/2018</td>
                <td class="tanggalPengembalian">09/01/2018</td>
                <td class="telat">-</td>
                <td class="denda">Rp 0</td>
            </tr>
        </tbody>
        <tfoot>
            <tr class="tebal">
                <td class="tandaTable"></td>
                <td colspan="5">Total</td>
                <td>Rp 500</td>
            </tr>
        </tfoot>
    </table>
</div>
<div id="divTombol">
    <input class="tombol" id="print" name="print" type="button" value="Print Nota">
</div>