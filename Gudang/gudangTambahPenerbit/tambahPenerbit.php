<?php
    include "../../functionPHP/penerbit.php";
    session_start();
?>
<style type="text/css">
    article div#konten{
        overflow-y: hidden;
    }
</style>
<div id="judul">
    <h1>Tambah Penerbit</h1>
</div>
<form method="POST" action="../functionPHP/tambahPenerbit.php" enctype="multipart/form-data">
    <div id="kiri">
        <label>ID Penerbit</label><br/>
        <input type="text" id="idPenerbit" name="idPenerbit" class="disable" disabled="disabled" value="<?php echo getLastIdPenerbit(); ?>" /><br/>

        <label>Gambar</label><br/>
        <input type="file" id="gambar" name="gambar"/><br/>

        <label>Nama Penerbit</label><br/>
        <input type="text" id="namaPenerbit" name="namaPenerbit"/><br/> 

        <label>Email</label><br/>
        <input type="text" id="email" name="email"/><br/>       
    </div>

    <div id="kanan">
        <label>No. Telp</label><br/>
        <input type="text" id="noTelp" name="noTelp"/><br/> 

        <label>Alamat</label><br/>
        <textarea type="text" id="alamat" name="alamat"></textarea><br/>
    </div>
    <input type="submit" id="tombol" name="tombolOk" value="SAVE">
    <input type="button" id="tombol" name="tombol" value="CANCEL">
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
    if(isset($_SESSION["sudahAda"])){
        unset($_SESSION["sudahAda"]);
        ?>
        <script type="text/javascript">
            alert("Gagal ditambahkan: Penerbit sudah ada!");
        </script>
        <?php
    }

    //kalau berhasil didaftarkan menjadi member
    if(isset($_SESSION["berhasil"])){
        unset($_SESSION["berhasil"]);
        ?>
        <script type="text/javascript">
            alert("Penerbit berhasil ditambahkan :)");
        </script>
        <?php
    }
?>