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
    </select>
</div>
<div id="searching">
    <label id="labelSearchBy" class="blue font15">Search by :</label>
    <br/>
    <select id="selectSearchBy" class="font15">
        <option>ID member</option>
        <option>Nama member</option>
        <option>Email</option>
    </select>
    <div id="searchBox">
        <input type="text"  placeholder="Search" class="font15" id="inputSearchBy" name="inputSearchBy"/>
        <i class="fa fa-search blue font15"></i>
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
            <?php
                tampilMemberDalamTabel();
            ?>
        </tbody>
    </table>
</div>

<!-- utk pop up message -->

<div id="blur" onclick="pencetBlur()">
</div>
<div id="popup">
    <i class="fas fa-times simbolX" onclick="pencetBlur()"></i>
    <br/><br/>
    <table>
        <tr>
            <td><i class="fas fa-id-card-alt simbolPopup"></i><td>
            <td class="atribut">ID Member</td>
            <td class="value" id="popupIdMember">: </td>
        </tr>
        <tr>
            <td><i class="fas fa-user simbolPopup"></i><td>
            <td class="atribut">Nama</td>
            <td class="value" id="popupNamaMember">: </td>
        </tr>
        <tr>
            <td><i class="fas fa-id-card simbolPopup"></i><td>
            <td class="atribut">No Identitas</td>
            <td class="value" id="popupNoIdentitas">: </td>
        </tr>
        <tr>
            <td><i class="fas fa-transgender simbolPopup"></i><td>
            <td class="atribut">Gender</td>
            <td class="value" id="popupGender">: </td>
        </tr>  
        <tr>
            <td><i class="fas fa-envelope simbolPopup"></i><td>
            <td class="atribut">Email</td>
            <td class="value" id="popupEmail">: </td>
        </tr>      
    </table>
</div>