<h1>Daftar Member</h1>
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
            <tr onclick="pencetTR($(this))">
                <td class="nomor">1</td>
                <td class="idMember">1234567890</td>
                <td class="namaMember">Namanya siapa yaaa</td>
                <td class="email">email@gmail.com</td>
                <td class="gender">Perempuan</td>
                <td class="noIdentitas">12345632862312</td>
            </tr>
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