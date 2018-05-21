<?php
    include "../../functionPHP/komik.php";
    include "../../functionPHP/koneksi.php";
    session_start();
?>
<div id="judul">
    <h1>Tambah Komik</h1>
</div>
<form method="POST" action="../functionPHP/tambahKomik.php" enctype="multipart/form-data">
    <div id="kiri">
        <label>ID Komik</label><br/>
        <input type="text" id="idKomik" name="idKomik" class="disable" disabled="disabled" value="<?php echo getLastIdKomik(); ?>"/><br/>

        <label>Gambar</label><br/>
        <input type="file" id="gambar" name="gambar"/><br/>

        <label>Judul</label><br/>
        <input type="text" id="judul" name="judul"/><br/>

        <label>Genre</label><br/>
        <?php
            $sql =  "SELECT * from genre";
            if($result = $conn->query($sql)){
                while($rows = $result->fetch_assoc()){
                    echo '<input type="checkbox" name="listgenre[]" value="'.$rows['idGenre'].'" style="width:5px;"/><label>'.$rows['namaGenre'].'</label><br/>';
                }
            }
        ?>

        <label>Rating</label><br/>
        <select id="rating" name="rating">
            <option value="" selected disabled hidden>Choose here</option>
            <option value="1">Anak-anak</option>
            <option value="2">Remaja</option>
            <option value="3">Dewasa</option>
            <option value="4">Semua Umur</option>
        </select><br/>

        <label>Special Edition</label><br/>
        <select id="specialEdition" name="specialEdition">
            <option value="" selected disabled hidden>Choose here</option>
            <option value="1">Ya</option>
            <option value="2">Tidak</option>
        </select><br/>

        <label>Sinopsis</label><br/>
        <textarea type="text" id="sinopsis" name="sinopsis"></textarea><br/>
    </div>

    <div id="kanan">
        <label>Pengarang</label><br/>
        <select id="idPengarang" name="idPengarang">
            <?php
                $sql =  "SELECT * from penulis";
                if($result = $conn->query($sql)){
                    while($rows = $result->fetch_assoc()){
                        echo '<option value="'.$rows['idPenulis'].'">'.$rows['namaPenulis'].'</option>';
                    }
                }
            ?>
        </select><br/>

        <label>Penerbit</label><br/>
        <select id="idPenerbit" name="idPenerbit">
            <?php
                $sql =  "SELECT * from penerbit";
                if($result = $conn->query($sql)){
                    while($rows = $result->fetch_assoc()){
                        echo '<option value="'.$rows['idPenerbit'].'">'.$rows['NamaPenerbit'].'</option>';
                    }
                }
            ?>
        <select><br/>

        <label>Tanggal Terbit</label><br/>
        <input type="date" id="tanggalTerbit" name="tanggalTerbit"/><br/>

        <label>Jumlah Halaman</label><br/>
        <input type="text" id="jumlahHalaman" name="jumlahHalaman"/><br/>

        <label>Berat Komik</label><br/>
        <input type="text" id="beratKomik" name="beratKomik"/><br/>

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
    else if(isset($_SESSION["sudahAda"])){
        unset($_SESSION["sudahAda"]);
        ?>
        <script type="text/javascript">
            alert("Gagal ditambahkan: Komik ini sudah ada!");
        </script>
        <?php
    }

    //kalau berhasil didaftarkan menjadi member
    else if(isset($_SESSION["berhasil"])){
        unset($_SESSION["berhasil"]);
        ?>
        <script type="text/javascript">
            alert("Komik berhasil ditambahkan :)");
        </script>
        <?php
    }

    else if(isset($_SESSION["penerbit"])){
        unset($_SESSION["penerbit"]);
        ?>
        <script type="text/javascript">
            alert("Penerbit tidak ada!");
        </script>
        <?php
    }

    else if(isset($_SESSION["pengarang"])){
        unset($_SESSION["pengarang"]);
        ?>
        <script type="text/javascript">
            alert("Pengarang tidak ada!");
        </script>
        <?php
    }
?>