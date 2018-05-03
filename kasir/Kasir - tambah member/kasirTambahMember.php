<?php
    include "../../functionPHP/member.php";
?>
<h1>Tambah Member</h1>
<form action="kasirTambahMember.php" method="post">
    <div id="kiri">
        <label>ID Member</label><br/>
        <i class="fas fa-id-card-alt simbol"></i>
        <input type="text" id="idMember" class="disable" name="idMember" disabled="disabled" value="<?php
            getLastIdMember();
        ?>"/><br/><br/><br/>

        <label>Nama Member</label><br/>
        <i class="fas fa-user-plus simbol"></i>
        <input type="text" id="namaMember" name="namaMember"/><br/>

        <label>No. Identitas</label><br/>
        <i class="fas fa-id-card simbol"></i>
        <input type="text" id="nomorIdentitas" name="noIdentitas"/><br/>

        <label>Gender</label><br/>
        <i class="fas fa-transgender simbol"></i>
        <select name="gender">
            <option>Perempuan</option>
            <option>Laki-laki</option>
        </select><br/>

        <label>Tanggal Lahir</label><br/>
        <i class="fas fa-birthday-cake simbol"></i>
        <input type="text" id="tanggalLahir" name="tanggalLahir"/><br/>
    </div>
    <div id="kanan">
        <label>E-mail</label><br/>
        <i class="fas fa-envelope simbol"></i>
        <input type="text" id="email" name="email"/><br/>

        <label>No. Telp.</label><br/>
        <i class="fas fa-phone simbol"></i>
        <input type="text" id="noTelp" name="noTelp"/><br/>

        <label>Alamat</label><br/>
        <i class="fas fa-home simbol"></i>
        <div>
        <textarea type="text" id="alamat" name="alamat"></textarea><br/>
        </div>
    </div>
        <input class="tombol tebal" type="submit" id="tombolOk" name="tombolOk" value="OK">
    </div>
</form>

<?php
    if(!empty($_POST["tombolOk"])){
        $id=$_POST["idMember"];
        $nama=$_POST["namaMember"];
        $noIdentitas=$_POST["namaMember"];
        $gender=$_POST["gender"];
        $lahir=$_POST["tanggalLahir"];
        $email=$_POST["email"];
        $noTelp=$_POST["noTelp"];
        $alamat=$_POST["alamat"];
        if($nama==""||$noIdentitas==""||$lahir==""||$email==""||$noTelp==""||$alamat==""){
            ?>
            <script>
                alert("Data belum lengkap!");
            </script>
            <?php
        }
    }
?>