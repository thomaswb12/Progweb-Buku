<?php
    include "pengarang.php";
    session_start();
    $idPengarang = $_POST['idPengarang'];
    $_SESSION['idPengarang'] = $idPengarang;
    $value = getPengarang($idPengarang);

echo '<style type="text/css">
    article div#konten{
        overflow-y: hidden;
    }
</style>
<div id="judul">
    <h1>Edit Pengarang</h1>
</div>
<form method="POST" action="../functionPHP/editPengarang2.php" enctype="multipart/form-data">
    <div id="kiri">
        <label>ID Pengarang</label><br/>
        <input type="text" id="idPengarang" name="idPengarang" class="disable" disabled="disabled" value="'.$idPengarang.'" /><br/>

        <label>Gambar</label><br/>
        <input type="file" id="gambar" name="gambar"/><br/>
    </div>

    <div id="kanan">
        <label>Nama Pengarang</label><br/>
        <input type="text" id="namaPengarang" name="namaPengarang" value="'.$value['namaPenulis'].'"/><br/> 

        <label>Asal</label><br/>
        <input type="text" id="asal" name="asal" value="'.$value['asal'].'"/><br/> 
    </div>
    <input type="submit" id="tombol" name="tombolOk" value="SAVE">
    <input type="button" id="tombol" name="tombol" value="CANCEL" onclick="aside5()">
</form>';

    //kalau data yang diisi belum lengkap
    if(isset($_SESSION["belumLengkap"])){
        unset($_SESSION["belumLengkap"]);
        ?>
        <script type="text/javascript">
            alert("Gagal ditambahkan: Data belum lengkap!");
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