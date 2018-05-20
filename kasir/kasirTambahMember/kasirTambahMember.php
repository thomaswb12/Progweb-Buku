<?php
    include "../../functionPHP/member.php";
    session_start();
?>
<script>
    function ceknumeric(coba){
        if(!$.isNumeric(coba.val())){
            coba.val("");
            alert("Input harus berupa angka");
        }
    }
</script>

<h1>Tambah Member</h1>
<form action="../functionPHP/tambahMember.php" method="post">
    <div id="kiri">
        <label>ID Member</label><br/>
        <i class="fas fa-id-card-alt simbol"></i>
        <input type="text" id="idMember" class="disable" name="idMember" disabled="disabled" value="<?php
            echo getLastIdMember();
        ?>"/><br/><br/><br/>

        <label>Nama Member</label><br/>
        <i class="fas fa-user-plus simbol"></i>
        <input type="text" id="namaMember" name="namaMember"/><br/>

        <label>No. Identitas</label><br/>
        <i class="fas fa-id-card simbol"></i>
        <input type="text" id="nomorIdentitas" name="noIdentitas" oninput="ceknumeric($(this))"/><br/>

        <label>Gender</label><br/>
        <i class="fas fa-transgender simbol"></i>
        <select name="gender">
            <option>Perempuan</option>
            <option>Laki-laki</option>
        </select><br/>

        <label>Tanggal Lahir</label><br/>
        <i class="fas fa-birthday-cake simbol"></i>
        <input type="date" id="tanggalLahir" name="tanggalLahir"/><br/>
    </div>
    <div id="kanan">
        <label>E-mail</label><br/>
        <i class="fas fa-envelope simbol"></i>
        <input type="email" id="email" name="email"/><br/>

        <label>No. Telp.</label><br/>
        <i class="fas fa-phone simbol"></i>
        <input type="text" id="noTelp" name="noTelp" oninput="ceknumeric($(this))"/><br/>

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
    //kalau data yang diisi belum lengkap
    if(isset($_SESSION["belumLengkap"])){
        unset($_SESSION["belumLengkap"]);
        ?>
        <script type="text/javascript">
            alert("Gagal ditambahkan: Data belum lengkap!");
        </script>
        <?php
    }

    //kalau orang itu sudah jadi member
    if(isset($_SESSION["sudahJadiMember"])){
        unset($_SESSION["sudahJadiMember"]);
        ?>
        <script type="text/javascript">
            alert("Gagal ditambahkan: Customer ini sudah menjadi member!");
        </script>
        <?php
    }

    //kalau berhasil didaftarkan menjadi member
    if(isset($_SESSION["berhasil"])){
        unset($_SESSION["berhasil"]);
        ?>
        <script type="text/javascript">
            alert("Member berhasil ditambahkan :)");
        </script>
        <?php
    }
?>