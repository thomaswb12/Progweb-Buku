<?php
    session_start();
?>

<h1>Tambah Karyawan</h1> 
    <div id="dataKaryawan" class="font15">
         <div class="detailKaryawan">
            <form action="../functionPHP/tambahKaryawan.php" method="post">
            <div class="kiri">
                <div id="inputan">
                    <label>ID</label>
                  
                    <input type="text" id="idKaryawanDis" name="idKaryawanDis" class="disable" disabled/>
                    <input type="text" id="idKaryawan" name="idKaryawan" val="" style="display:none;"/>

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
                <img class="photo" src="hrdDaftarKaryawan/profile_pic.jpg"/><br><br><br>
                <!-- tombol save -->
                <input type="button" id="tombolSave" name="tombokSave" class="tombol" value="SAVE"/>
            </div>
            </form>
        </div>
    </div>

<?php
    //kalau pass beda
    if(isset($_SESSION["beda"])){
        unset($_SESSION["beda"]);
        ?>
        <script type="text/javascript">
            alert("Gagal: Password berbeda!");
        </script>
        <?php
    }

    //kalau data yang diisi belum lengkap
    if(isset($_SESSION["belumLengkap"])){
        unset($_SESSION["belumLengkap"]);
        ?>
        <script type="text/javascript">
            alert("Gagal: Data tidak lengkap!");
        </script>
        <?php
    }

    //berhasil diubah
    if(isset($_SESSION["berhasil"])){
        unset($_SESSION["berhasil"]);
        ?>
        <script type="text/javascript">
            alert("Berhasil ditambahkan!)");
        </script>
        <?php
    }
?>