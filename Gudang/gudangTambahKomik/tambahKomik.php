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
        <select id="genre" name="genre">
            <option value="" selected disabled hidden>Choose here</option>
            <option value="1">Action</option>
            <option value="2">Romance</option>
            <option value="3">Fantasi</option>
            <option value="4">Comedy</option>
            <option value="5">Thriller</option>
            <option value="6">Horor</option>
            <option value="7">Sci-fi</option>
        </select><br/>

        <label>Rating</label><br/>
        <select id="rating" name="rating">
            <option value="" selected disabled hidden>Choose here</option>
            <option value="1">Anak-anak</option>
            <option value="2">Remaja</option>
            <option value="3">Dewasa</option>
            <option value="4">Semua Umur</option>
        </select><br/>

        <label>Special Edition</label><br/>
        <select id="special" name="special">
            <option value="" selected disabled hidden>Choose here</option>
            <option value="1">Ya</option>
            <option value="2">Tidak</option>
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
            <option value="1">Soft</option>
            <option value="2">Hard</option>
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

    if(isset($_SESSION["penerbit"])){
        unset($_SESSION["penerbit"]);
        ?>
        <script type="text/javascript">
            alert("Penerbit tidak ada!");
        </script>
        <?php
    }
?>