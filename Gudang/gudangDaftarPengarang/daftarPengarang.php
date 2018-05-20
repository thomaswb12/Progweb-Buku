<div id="judul">
    <h1>Daftar Pengarang</h1>

    <div id="sorting">
        <label id="labelSortBy" class="blue font15">Sort by :</label>
        <br/>
        <select id="selectSortBy" class="font15">
            <option value="1">ID</option>
            <option value="2">Nama Pengarang</option>
            <option value="3">Email</option>
            <option value="4">No. Telp</option>
            <option value="5">Alamat</option>
        </select>
    </div>

    <div id="searching">
        <label id="labelSearchBy" class="blue font15">Search by :</label>
        <br/>
        <select id="selectSearchBy" class="font15">
            <option value="1">ID</option>
            <option value="2">Nama Pengarang</option>
            <option value="3">Email</option>
            <option value="4">No. Telp</option>
            <option value="5">Alamat</option>
        </select>
        <div id="searchBox">
            <input type="text"  placeholder="Search" class="font15" id="inputSearchBy" name="inputSearchBy"/>
            <i class="fa fa-search blue font15" onclick="searchPengarang()"></i>
        </div>
    </div>
</div>
<div id="daftar" class="font15">
</div>