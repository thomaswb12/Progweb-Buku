<h1 onclick="pencet()" class="enter">Peminjaman</h1>
<div class="position">
        <div id="pinggir" class="floatKiri marginDiv">
            <i class="fas fa-user floatKiri margin" style="display: block; float:left; font-size: 100px; color: rgba(94, 94, 94, 0.9)"></i>
            <div class="floatKanan margin">
                <label for="">ID Member</label>
                <br>
                <input id="inputID" oninput="searchNama()" class="inputBesar" type="text"><br>
                <label for="">Nama</label><br>
                <input id="namaMember" class="inputBesar disable" type="text" disabled="disabled">
            </div>
        </div>
        <div id="pinggirKanan" class="floatKanan margin right">
            <i class="fas fa-book margin floatKiri" style="font-size: 50px; display:block;margin: auto; color: rgba(94, 94, 94, 0.9)"></i>
            <input class="inputBesar margin" type="text" name="" id="">
            <input type="submit">
        </div>
</div>
<div class="enter">
    <table>
        <thead>
            <th id="th1">ID Buku</th>
            <th id="th2">Judul Buku</th>
            <th id="th3">Tanggal Pengembalian</th>
            <th id="th4">Harga Sewa</th>
        </thead>
        <tbody>
            <tr>
                <td>1234</td>
                <td>Naruto ketemu monika sujanto asdas</td>
                <td>08/12/2018</td>
                <td>10000</td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td colspan="3">Diskon</td>
                <td>0</td>
            </tr>
            <tr class="tebal">
                <td colspan="3">Total</td>
                <td>Rp 6.000</td>
            </tr>
        </tfoot>
    </table>
</div>
<div class="margin right enter" style="top: 10px">
    <input id="print" type="button" value="Print nota" class="floatKanan tebal margin tombol">
</div>
<script src="Kasir - peminjaman/Kasir - peminjaman.js"></script>


