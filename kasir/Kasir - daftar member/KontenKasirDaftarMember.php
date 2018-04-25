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
        </thead>
        <tbody>
            <tr onclick="pencot()">
                <td class="nomor">1</td>
                <td class="idMember">1234567890</td>
                <td class="namaMember">Namanya siapa</td>
                <td class="email">email@gmail.com</td>
            </tr>
        </tbody>
    </table>
</div>

<!-- utk pop up message -->

<div id="blur">
</div>
<div id="popup" > apapun
</div>
<script src="Kasir - daftar member/kasirdaftarmember.js"></script>