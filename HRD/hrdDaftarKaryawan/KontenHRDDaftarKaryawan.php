<h1>Daftar Karyawan</h1>

<div id="sorting">
    <label id="labelSortBy" class="blue font15">Order by :</label><br/>
        <select id="selectSortBy" class="font15">
            <option value="1">ID</option>
            <option value="2">Nama</option>
            <option value="3">Jabatan</option>
        </select>
        <i class="fa fa-search blue font15" onclick="search()"></i>
</div>

<div id="searching">
    <label id="labelSearchBy" class="blue font15">Search by :</label><br/>
        <select id="selectSearchBy" class="font15">
            <option value="1">ID Karyawan</option>
            <option value="2">Nama Karyawan</option>
         </select>
    <div id="searchBox">
        <input type="text"  placeholder="Search" class="font15" id="inputSearchBy" name="inputSearchBy"/>
    </div>
</div><br><br>

<div id="daftarKaryawan" class="font15">
</div>