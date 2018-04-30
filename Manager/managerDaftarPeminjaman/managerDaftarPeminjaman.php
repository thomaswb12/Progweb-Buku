<h1>Daftar Peminjaman</h1>
<div id="searching">
    <label id="labelSearchBy" class="blue font15">Search by :</label>
    <br/>
    <select id="selectSearchBy" class="font15">
        <option>ID member</option>
        <option>Nama member</option>
    </select>
    <div id="searchBox">
        <input type="text"  placeholder="Search" class="font15" id="inputSearchBy" name="inputSearchBy"/>
        <i class="fa fa-search blue font15"></i>
    </div>
</div>
<!--bagian daftar peminjaman-->
<div id="tabel">
    <table>
        <thead>
            <th class="tanggalPengembalian">Tanggal Pengembalian</th>
            <th class="idMember">ID Member</th>
            <th class="namaMember">Nama Member</th>
            <th class="peringatan"></th>
        </thead>
        <tbody>
        
            <tr onclick="aside2()">
                <td>2343</td>
                <td>idid</td>
                <td>nama coba</td>
                <td class="peringatan"><i class="fas fa-exclamation-triangle" style="color:red"></i></td>
            </tr>
            <tr onclick="aside2()">
                <td>2343</td>
                <td>idid2</td>
                <td>nama coba2</td>
                <td class="peringatan"><i class="fas fa-exclamation-triangle" style="color:red"></i></td>
            </tr>
            <tr onclick="aside2()">
                <td>234e</td>
                <td>idid3</td>
                <td>nama coba3</td>
                <td class="peringatan"></td>
            </tr>
        </tbody>
    </table>
</div>