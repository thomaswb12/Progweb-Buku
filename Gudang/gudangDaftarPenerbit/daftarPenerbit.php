<div id="judul">
    <h1>Daftar Penerbit</h1>

    <div id="sorting">
        <label id="labelSortBy" class="blue font15">Sort by :</label>
        <br/>
        <select id="selectSortBy" class="font15">
            <option>ID</option>
            <option>Nama Penerbit</option>
        </select>
    </div>

    <div id="searching">
        <label id="labelSearchBy" class="blue font15">Search by :</label>
        <br/>
        <select id="selectSearchBy" class="font15">
            <option>ID</option>
            <option>Nama Penerbit</option>
        </select>
        <div id="searchBox">
            <input type="text"  placeholder="Search" class="font15" id="inputSearchBy" name="inputSearchBy" onkeyup="searchPenerbit()"/>
            <i class="fa fa-search blue font15"  onclick="searchPenerbit()"></i>
        </div>
    </div>
</div>
<div id="daftar" class="font15">
</div>
<!-- keperluan popup-->
<div id="blur" onclick="pencetBlur()">
</div>
<div id="popup"></div>