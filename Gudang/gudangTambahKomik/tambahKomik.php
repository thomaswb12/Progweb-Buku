

<div id="judul">
    <h1>Tambah Komik</h1>
</div>
<form method="POST" action="../functionPHP/tambahKomik.php">
    <div id="kiri">
        <label>ID Komik</label><br/>
        <input type="text" id="idKomik" name="idKomik" disabled="disabled"/><br/>

        <label>Judul</label><br/>
        <input type="text" id="judul" name="judul"/><br/>

        <label>Genre</label><br/>
        <input type="text" id="genre" name="genre"/><br/>

        <label>Rating</label><br/>
        <select id="rating" name="rating">
            <option value="" selected disabled hidden>Choose here</option>
            <option>Anak-anak</option>
            <option>Remaja</option>
            <option>Dewasa</option>
            <option>Semua Umur</option>
        </select><br/>

        <label>Special Edition</label><br/>
        <select id="special" name="special">
            <option value="" selected disabled hidden>Choose here</option>
            <option>Ya</option>
            <option>Tidak</option>
        </select><br/>

        <label>Gambar</label><br/>
        <input type="file" id="gambar" name="gambar"/><br/>

        <label>Sinopsis</label><br/>
        <textarea type="text" id="sinopsis" name="sinopsis"></textarea><br/>
    </div>

    <div id="kanan">
        <label>Penulis</label><br/>
        <input type="text" id="penulis" name="penulis"/><br/>

        <label>Penerbit</label><br/>
        <input type="text" id="penerbit" name="penerbit"/><br/>

        <label>Tanggal Terbit</label><br/>
        <input type="date" id="tanggalTerbit" name="tanggalTerbit"/><br/>

        <label>Jumlah Halaman</label><br/>
        <input type="text" id="jumlahHalaman" name="jumlahHalaman"/><br/>

        <label>Berat Komik</label><br/>
        <input type="text" id="beratBuku" name="beratBuku"/><br/>

        <label>Jenis Cover</label><br/>
        <select id="jenisCover" name="jenisCover">
            <option value="" selected disabled hidden>Choose here</option>
            <option>Soft</option>
            <option>Hard</option>
        </select><br/>

        <label>Panjang</label><br/>
        <input type="text" id="panjang" name="panjang"/><br/>

        <label>Lebar</label><br/>
        <input type="text" id="lebar" name="lebar"/><br/>
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
            alert("Gagal ditambahkan: Komik ini sudah ada!");
        </script>
        <?php
    }

    //kalau berhasil didaftarkan menjadi member
    if(isset($_SESSION["berhasil"])){
        unset($_SESSION["berhasil"]);
        ?>
        <script type="text/javascript">
            alert("Komik berhasil ditambahkan :)");
        </script>
        <?php
    }
?>