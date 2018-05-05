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
        <input type="text"  placeholder="Search" class="font15" id="inputSearchBy" name="inputSearchBy"/>
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
        </thead>
        <tbody>
            
        </tbody>
    </table>
</div>

<!-- utk pop up message -->

<div id="blur" onclick="pencetBlur()">
</div>
<div id="popup">
    <i class="fas fa-times simbolX" onclick="pencetBlur()"></i>
    <br/><br/>
    <div id="isiPopup">
        <div class="popupSatuan">
            <div class="divSimbolPopup"><i class="fas fa-id-card-alt simbolPopup"></i></div>
            <div class="atribut"><label>ID Member </label></div>
            <input class="value" id="popupIdMember" value=""/>
            <br/>
        </div>
        <div class="popupSatuan">
            <div class="divSimbolPopup"><i class="fas fa-user simbolPopup"></i></div>
            <label class="atribut">Nama</label>
            <input class="value" id="popupNamaMember" value=""/>
            <br/>
        </div>
        <div class="popupSatuan">
            <div class="divSimbolPopup"><i class="fas fa-id-card simbolPopup"></i></div>
            <label class="atribut">No Identitas</label>
            <input class="value" id="popupNoIdentitas" value=""/>
            <br/>
        </div>
        <div class="popupSatuan">
            <div class="divSimbolPopup"><i class="fas fa-transgender simbolPopup"></i></div>
            <label class="atribut">Gender</label>
            <input class="value" id="popupGender" value=""/>
            <br/>
        </div>
        <div class="popupSatuan">
            <div class="divSimbolPopup"><i class="fas fa-envelope simbolPopup"></i></div>
            <label class="atribut">Email</label>
            <input class="value" id="popupEmail" value=""/>
            <br/>
        </div>
        <div class="popupSatuan">
            <div class="divSimbolPopup"><i class="fas fa-birthday-cake simbolPopup"></i></div>
            <label class="atribut">Tanggal Lahir</label>
            <input class="value" id="popupTanggalLahir" value=""/>
            <br/>
        </div>
        <div class="popupSatuan">
            <div class="divSimbolPopup"><i class="fas fa-home simbolPopup"></i></div>
            <label class="atribut">Alamat</label>
            <input class="value" id="popupAlamat" value=""/>
        </div>
    </div>
</div>