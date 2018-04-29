<h1>Edit Karyawan</h1>
            
<div id="dataKaryawan" class="font15">
     <div class="detailKaryawan">
        <div class="kiri">
            <div id="inputan">
                <label>ID</label>
                <input type="text" id="idKaryawan" name="idKaryawan"/>
                <br/><br/>
                <label>Nama</label>
                <input type="text" id="namaKaryawan" name="namaKaryawan"/>
                <br/><br/>
                <label>Jabatan</label>
                <select id="selectJabatan" class="font15">
                    <option>Kasir</option>
                    <option>Gudang</option>
                </select>
                <br/><br/>
                <label>Email</label>
                <input type="text" id="email" name="email"/>
                <br/><br/>
                <label>No. Telp</label>
                <input type="text" id="telepon" name="telepon"/>
                <br/><br/>
                <div id="divAl"><label>Alamat</label></div>
                <textarea id="alamat" name="alamat"></textarea>
                <br/><br/><hr><br>
                <label>Password</label>
                <input type="password" id="pass1" name="pass1"/>
                <br/><br/>
                <label>Re-Input Password</label>
                <input type="password" id="pass2" name="pass2"/>
                <br/><br/><br/><br/>
            </div>  
        </div>
        <div class="kanan">
            <label>Photo</label>
            <input type="file" id="gambar" name="gambar"/><br/>
            <span class="peraturan"><i>Format : PNG, JPG, JPEG.</i></span><br><br>
            <img class="photo" src="HRD - Daftar Karyawan/profile_pic.jpg"/><br><br><br>
            <!-- tombol save -->
            <input type="button" id="tombolSave" name="tombokSave" class="tombol" value="SAVE" onclick="aside27()"/>
        </div>
    </div>
</div>