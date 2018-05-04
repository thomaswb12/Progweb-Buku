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
        <div class="divSimbolPopup"><i class="fas fa-id-card-alt simbolPopup"></i></div>
        <p class="atribut">ID Member </p>
        <p class="value" id="popupIdMember">: </p>
        <br/>
        <div class="divSimbolPopup"><i class="fas fa-user simbolPopup"></i></div>
        <label class="atribut">Nama</label>
        <p class="value" id="popupNamaMember">: </p>
        <br/>
        <div class="divSimbolPopup"><i class="fas fa-id-card simbolPopup"></i></div>
        <label class="atribut">No Identitas</label>
        <p class="value" id="popupNoIdentitas">: </p>
        <br/>
        <div class="divSimbolPopup"><i class="fas fa-transgender simbolPopup"></i></div>
        <label class="atribut">Gender</label>
        <p class="value" id="popupGender">: </p>
        <br/>
        <div class="divSimbolPopup"><i class="fas fa-envelope simbolPopup"></i></div>
        <label class="atribut">Email</label>
        <p class="value" id="popupEmail">: </p>
    </div>
</div>