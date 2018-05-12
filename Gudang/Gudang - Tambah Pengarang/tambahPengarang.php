<?php
    include "../../functionPHP/pengarang.php";
    session_start();
?>
<div id="judul">
    <h1>Tambah Pengarang</h1>
</div>
<form method="POST" action="../functionPHP/tambahPengarang.php">
    <div id="kiri">
        <label>Gambar</label><br/>
        <input type="file" id="gambar" name="gambar"/><br/>

        <label>ID Pengarang</label><br/>
        <input type="text" id="idPengarang" name="idPengarang" disabled="disabled" value="<?php echo getLastIdPengarang(); ?>" /><br/>
    </div>

    <div id="kanan">
        <label>Nama Pengarang</label><br/>
        <input type="text" id="namaPengarang" name="namaPengarang"/><br/> 

        <label>Asal</label><br/>
        <input type="text" id="asal" name="asal"/><br/> 
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
            alert("Gagal ditambahkan: Pengarang sudah ada!");
        </script>
        <?php
    }

    //kalau berhasil didaftarkan menjadi member
    if(isset($_SESSION["berhasil"])){
        unset($_SESSION["berhasil"]);
        ?>
        <script type="text/javascript">
            alert("Pengarang berhasil ditambahkan :)");
        </script>
        <?php
    }
?>