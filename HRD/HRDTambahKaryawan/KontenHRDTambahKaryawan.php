<h1>Tambah Karyawan</h1>            
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
                    <select id="selectJabatan" class="font15" onchange="isiIdJabatan(this.value)">
                        <option value=-1>---Jabatan---</option>
                        <?php
                            include "../../functionPHP/koneksi.php";
                            $q="SELECT * FROM jabatankaryawan";
                            $result=mysqli_query($conn,$q);
                            while($row=mysqli_fetch_assoc($result)){
                                echo "<option value=".$row['idJabatan'].">".$row['namaJabatan']."</option>";
                            }
                        ?>
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
                <label>Photo Profile</label>
                <input type="file" id="gambar" name="gambar"/><br/>
                <span class="peraturan"><i>Format : PNG, JPG, JPEG.</i></span><br><br>
                <img class="photo" src="HRD - Daftar Karyawan/profile_pic.jpg"/><br><br><br>
                <!-- tombol save -->
                <input type="button" id="tombolSave" name="tombokSave" class="tombol" value="SAVE" onclick="aside2()"/>
            </div>
        </div>
    </div>