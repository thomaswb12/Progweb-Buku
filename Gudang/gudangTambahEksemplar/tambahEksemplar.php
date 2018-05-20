<?php
    session_start();
?>
<style type="text/css">
    article div#konten{
        overflow-y: hidden;
    }
</style>
<title>Gudang - Tambah Pengarang</title>
<div id="judul">
    <h1>Tambah Eksemplar</h1>
</div>
<form action="../functionPHP/tambahEksemplar.php" method="POST">
    <div id="kiri">
        <label>ID Komik</label><br/>
        <input type="text" id="idKomik" name="idKomik" onkeyup="getIdEksemplar()"/><i id="error"> ERROR</i><br/> 

        <label>ID Eksemplar</label><br/>
        <input type="text" id="idEksemplar" class="disable" name="idEksemplar" disabled="disabled"/><br/>
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

    else if(isset($_SESSION["berhasil"])){
        unset($_SESSION["berhasil"]);
        ?>
        <script type="text/javascript">
            alert("Eksemplar berhasil ditambahkan :)");
        </script>
        <?php
    }

    else if(isset($_SESSION["komik"])){
        unset($_SESSION["komik"]);
        ?>
        <script type="text/javascript">
            alert("Komik tidak ada!");
        </script>
        <?php
    }
?>