<?php
    include "../../functionPHP/member.php";
    session_start();
?>

<h1>Daftar Member</h1>
<div id="sorting">
    <label id="labelSortBy" class="blue font15">Sort by :</label>
    <br/>
    <select id="selectSortBy" class="font15">
        <option value = 1>ID Member</option>
        <option value = 2>Nama</option>
        <option value = 3>Email</option>
    </select>
</div>
<div id="searching">
    <label id="labelSearchBy" class="blue font15">Search by :</label>
    <br/>
    <select id="selectSearchBy" class="font15">
        <option value = 1>ID member</option>
        <option value = 2>Nama member</option>
        <option value = 3>Email</option>
    </select>
    <div id="searchBox">
        <input type="text"  placeholder="Search" class="font15" id="memberInputSearchBy" name="memberInputSearchBy"/>
        <i class="fa fa-search blue font15 klik" onclick="searchDaftarMember()"></i>
    </div>
</div>
<!--bagian daftar member-->
<div id="tabel">
    <table>
        <thead>
            <th class="nomor">No</th>
            <th class="idMember">ID Member</th>
            <th class="namaMember">Nama Member</th>
            <th class="email">Email</th>
            <th class="gender">Gender</th>
            <th class="noIdentitas">No Identitas</th>
            <th class="alamat">Alamat</th>
            <th class="tanggalLahir">Tanggal Lahir</th>
            <th class="telepon">No Telp.</th>
        </thead>
        <tbody>
            
        </tbody>
    </table>
</div>

<!-- utk pop up message -->
<div id="blur" onclick="pencetBlur()">
</div>
<form action="../functionPHP/editMember.php" method="post">
<div id="popup">
    <i class="fas fa-times simbolX" onclick="pencetBlur()"></i>
    <br/><br/>
    <div id="parentIsiPopup">
        <div id="isiPopup">
            <div class="popupSatuan">
                <div class="divSimbolPopup"><i class="fas fa-id-card-alt simbolPopup"></i></div>
                <div class="atribut"><label>ID Member </label></div>
                <input class="value" id="popupIdMember" name="popupIdMember" value="" disabled/>
                <input class="value" id="popupIdMemberDummy" name="popupIdMemberDummy" value="" style="display:none;"/>
                <br/>
            </div>
            <div class="popupSatuan">
                <div class="divSimbolPopup"><i class="fas fa-user simbolPopup"></i></div>
                <div class="atribut"><label>Nama</label></div>
                <input class="value" id="popupNamaMember" name="popupNamaMember" value=""/>
                <br/>
            </div>
            <div class="popupSatuan">
                <div class="divSimbolPopup"><i class="fas fa-id-card simbolPopup"></i></div>
                <div class="atribut"><label>No Identitas</label></div>
                <input class="value" id="popupNoIdentitas" name="popupNoIdentitas" value=""/>
                <br/>
            </div>
            <div class="popupSatuan">
                <div class="divSimbolPopup"><i class="fas fa-phone simbolPopup"></i></div>
                <div class="atribut"><label>No Telp.</label></div>
                <input class="value" id="popupTelepon" name="popupTelepon" value=""/>
            </div>
            <div class="popupSatuan">
                <div class="divSimbolPopup"><i class="fas fa-transgender simbolPopup"></i></div>
                <div class="atribut"><label>Gender</label></div>
                <select name="popupGender" class="value" id="popupGender">
                    <option value=1>Perempuan</option>
                    <option value=2>Laki-laki</option>
                </select>
                <br/>
            </div>
            <div class="popupSatuan">
                <div class="divSimbolPopup"><i class="fas fa-envelope simbolPopup"></i></div>
                <div class="atribut"><label>Email</label></div>
                <input type="email" class="value" id="popupEmail" name="popupEmail" value=""/>
                <br/>
            </div>
            <div class="popupSatuan">
                <div class="divSimbolPopup"><i class="fas fa-birthday-cake simbolPopup"></i></div>
                <div class="atribut"><label>Tanggal Lahir</label></div>
                <input type="date" class="value" id="popupTanggalLahir" name="popupTanggalLahir" value=""/>
                <br/>
            </div>
            <div class="popupSatuan">
                <div class="divSimbolPopup"><i class="fas fa-home simbolPopup"></i></div>
                <div class="atribut"><label>Alamat</label></div>
                <input class="value" id="popupAlamat" name="popupAlamat" value=""/>
            </div>
            <br>
        </div>
    </div>
    <input type="submit" class="tombol" id="tombolDetailMember" name="tombolDetailMember" value="EDIT">
</div>
</form>

<?php
    //kalau data yang diisi belum lengkap
    if(isset($_SESSION["belumLengkap"])){
        unset($_SESSION["belumLengkap"]);
        ?>
        <script type="text/javascript">
            alert("Gagal diedit: Data belum lengkap!");
        </script>
        <?php
    }
    
    //berhasil diubah
    if(isset($_SESSION["berhasil"])){
        unset($_SESSION["berhasil"]);
        ?>
        <script type="text/javascript">
            alert("Berhasil diedit :)");
        </script>
        <?php
    }

    //tidak ada data yang berubah
    if(isset($_SESSION["tidakBerubah"])){
        unset($_SESSION["tidakBerubah"]);
        ?>
        <script type="text/javascript">
            alert("Tidak ada data yang berubah");
        </script>
        <?php
    }
?>