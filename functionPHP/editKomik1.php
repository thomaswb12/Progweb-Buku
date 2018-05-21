<?php
    session_start();
    include "getDataBuku.php";
    $id = $_POST['idKomik'];
    $_SESSION['idKomik'] = $id;
    $buku = getDetailBuku($id);
echo 
'<div id="judul">
    <h1>Edit Komik</h1>
</div>
<form method="POST" action="../functionPHP/editKomik2.php" enctype="multipart/form-data">
	<div id="kiri">
		<label>ID Komik</label><br/>
		<input type="text" id="idKomik" name="idKomik" class="disable" disabled="disabled" value="'.$id.'"/><br/>

		<label>Gambar</label><br/>
		<input type="file" id="gambar" name="gambar" value="../../'.$buku['Location'].'"/><br/>

		<label>Judul</label><br/>
		<input type="text" id="judul" name="judul" value="'.$buku['judulBuku'].'"/><br/>

		<label>Genre</label><br/>';
		$a = '';
		$b = '';
		$c = '';
		$d = '';
		$e = '';
		$f = '';
		$g = '';
		/*if($buku['genre'] == 'Action'){
			$a = 'selected';
		}
		else if($buku['genre'] == 'Romance'){
			$b = 'selected';
		}
		else if($buku['genre'] == 'Fantasi'){
			$c = 'selected';
		}
		else if($buku['genre'] == 'Comedy'){
			$d = 'selected';
		}
		else if($buku['genre'] == 'Thriller'){
			$e = 'selected';
		}
		else if($buku['genre'] == 'Horor'){
			$f = 'selected';
		}
		else if($buku['genre'] == 'Sci-fi'){
			$g = 'selected';
		}*/
		echo '<select id="genre" name="genre">
		<option value="" selected disabled hidden>Choose here</option>
		<option value="1" '.$a.'>Action</option>
		<option value="2" '.$b.'>Romance</option>
		<option value="3" '.$c.'>Fantasi</option>
		<option value="4" '.$d.'>Comedy</option>
		<option value="5" '.$e.'>Thriller</option>
		<option value="6" '.$f.'>Horor</option>
		<option value="7" '.$g.'>Sci-fi</option>
		</select><br/>

		<label>Rating</label><br/>';
		if($buku['Rating'] == 'Anak-anak'){
			$a = 'selected';
		}
		else if($buku['Rating'] == 'Remaja'){
			$b = 'selected';
		}
		else if($buku['Rating'] == 'Dewasa'){
			$c = 'selected';
		}
		else if($buku['Rating'] == 'Semua Umur'){
			$d = 'selected';
		}
		echo '<select id="rating" name="rating">
			<option value="1" '.$a.'>Anak-anak</option>
			<option value="2" '.$b.'>Remaja</option>
			<option value="3" '.$c.'>Dewasa</option>
			<option value="4" '.$d.'>Semua Umur</option>
		</select><br/>

		<label>Special Edition</label><br/>

		<select id="specialEdition" name="specialEdition">';
		if($buku['specialEdition'] == 'Ya'){
			$a = 'selected';
		}
		else $b = 'selected';
		echo '<option value="1" '.$a.'>Ya</option>
			<option value="2" '.$b.'>Tidak</option>
		</select><br/>

		<label>Sinopsis</label><br/>
		<textarea type="text" id="sinopsis" name="sinopsis">'.$buku['sinopsis'].'</textarea><br/>
	</div>

	<div id="kanan">
		<label>ID Pengarang</label><br/>
		<input type="text" id="idPengarang" name="idPengarang" class="disable" disabled="disabled" value="'.$buku['idPenulis'].'"/><br/>

		<label>ID Penerbit</label><br/>
		<input type="text" id="idPenerbit" name="idPenerbit" class="disable" disabled="disabled" value="'.$buku['idPenerbit'].'"/><br/>

		<label>Tanggal Terbit</label><br/>
		<input type="date" id="tanggalTerbit" name="tanggalTerbit" value="'.$buku['tanggalTerbit'].'"/><br/>

		<label>Jumlah Halaman</label><br/>
		<input type="text" id="jumlahHalaman" name="jumlahHalaman" value="'.$buku['jumlahHalaman'].'"/><br/>

		<label>Berat Komik</label><br/>
		<input type="text" id="beratKomik" name="beratKomik" value="'.$buku['beratBuku'].'"/><br/>

		<label>Jenis Cover</label><br/>
		<select id="jenisCover" name="jenisCover">';
		if($buku['jenisCover'] == 'Soft'){
			$a = 'selected';
		}
		else if($buku['jenisCover'] == 'Hard'){
			$b = 'selected';
		}
		echo '<option value="1" '.$b.'>Soft</option>
		<option value="2" '.$b.'>Hard</option>
		</select><br/>

		<label>Panjang</label><br/>
		<input type="text" id="panjang" name="panjang" value="'.$buku['panjang'].'"/><br/>

		<label>Lebar</label><br/>
		<input type="text" id="lebar" name="lebar" value="'.$buku['lebar'].'"/><br/>
	</div>
	<input type="submit" id="tombol" name="tombolOk" value="SAVE">
	<input type="button" id="tombol" name="tombol" value="CANCEL" onclick="aside1()">
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