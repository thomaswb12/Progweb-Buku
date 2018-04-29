<h1>Daftar Jabatan</h1>

<div id="sorting">
    <label id="labelSortBy" class="blue font15">Order by :</label><br/>
    <select id="selectSortBy" class="font15">
        <option>ID Jabatan</option>
        <option>Nama Jabatan</option>
        <option>Gaji tertinggi</option>
        <option>Gaji terendah</option>
    </select>
</div>

<div id="searching">
    <label id="labelSearchBy" class="blue font15">Search by :</label><br/>
    <select id="selectSearchBy" class="font15">
        <option>Nama Jabatan</option>
        <option>ID Jabatan</option>
    </select>
    <div id="searchBox">
        <input type="text"  placeholder="Search" class="font15" id="inputSearchBy" name="inputSearchBy"/>
        <i class="fa fa-search blue font15"></i>
    </div>
</div>
            
    <div id="daftarJabatan">
        <!-- ini jabatan ke-1 -->
        <div class="daftarSatuan">
            <h3 class="judulJabatan">Gudang</h3>
            <div class="kiri">
                <label>ID Jabatan</label>
                <input type="text" class="idJabatan" name="idJabatan" value="0001"/><br/>
                <label>Nama Jabatan</label>
                <input type="text" class="namaJabatan" name="namaJabatan" value="Gudang"/><br/>
                <label>Gaji</label>
                <input type="text" class="gaji" name="gaji" value="Rp 9.000.000"/><br/>
            </div>
            <div class="kanan">
                <div>
                    <label>Keterangan</label>
                </div>
                <textarea class="keterangan" name="keterangan">Gudang bekerja untuk mengurusi stok komik, mengurusi bagian informasi tentang masing-masing komik, serta mengurusi urusan dengan penerbit komik tersebut</textarea>
                <br/><br/>
                <div class="bagianTombol">
                    <input type="button" class="tombol" id="tombolSave" name="tombolSave" value="SAVE"/>
                    <input type="button" class="tombol" id="tombolDelete" name="tombolDelete" value="DELETE"/>
                </div>
            </div>
            <hr/>
        </div>

        <!-- ini jabatan ke-2 -->
        <div class="daftarSatuan">
            <h3 class="judulJabatan">Kasir</h3>
            <div class="kiri">
                <label>ID Jabatan</label>
                <input type="text" class="idJabatan" name="idJabatan" value="0002"/><br/>
                <label>Nama Jabatan</label>
                <input type="text" class="namaJabatan" name="namaJabatan" value="Kasir"/><br/>
                <label>Gaji</label>
                <input type="text" class="gaji" name="gaji" value="Rp 2.000.000"/><br/>
            </div>
            <div class="kanan">
                <div>
                    <label>Keterangan</label>
                </div>
                <textarea class="keterangan" name="keterangan">Kasir bekerja bagian transaksi dengan customer</textarea>
                <br/><br/>
                <div class="bagianTombol">
                    <input type="button" class="tombol" id="tombolSave" name="tombolSave" value="SAVE"/>
                    <input type="button" class="tombol" id="tombolDelete" name="tombolDelete" value="DELETE"/>
                </div>
            </div>
            <hr/>
        </div>
    </div>