
<h1>Daftar Peminjaman</h1>
<div id="searching">
    <label id="labelSearchBy" class="blue font15">Search by :</label>
    <br/>
    <select id="selectSearchBy" class="font15">
        <option value = 1>ID member</option>
        <option value = 2>Nama member</option>
    </select>
    <div id="searchBox">
        <input type="text"  placeholder="Search" class="font15" id="inputSearchBy" name="inputSearchBy"/>
        <i class="fa fa-search blue font15" onclick="searchDaftarPeminjaman()"></i>
    </div>
</div>
<!--bagian daftar peminjaman-->
<div id="tabel">
    
</div>


<!-- utk pop up message -->
<div id="blur" onclick="pencetBlur()">
</div>
<div id="popup">
    <i class="fas fa-times simbolX" onclick="pencetBlur()"></i>
    <br/><br/>
    <div id="parentIsiPopup">
        
    </div>
</div>