<div id="judul">
    <h1>Daftar Komik</h1>
    <div id="simple">
        <a href="#" onclick="advanced()" >Advanced Search</a>
        <a>|</a>
        <a>Simple Search</a>
        <div id="sorting">
            <label id="labelSortBy" class="blue font15">Sort by :</label>
            <br/>
            <select id="selectSortBy" class="font15">
                <option value = 1>Terbaru</option>
                <option value = 2>Terpopuler</option>
                <option value = 3>Stok terbanyak</option>
            </select>
            <i class="fa fa-search blue font15 klik" onclick="search()"></i>
        </div>

        <div id="searching">
            <label id="labelSearchBy" class="blue font15">Search by :</label>
            <br/>
            <select id="selectSearchBy" class="font15">
                <option value= 1>Judul</option>
                <option value= 2>Pengarang</option>
                <option value= 3>Penerbit</option>
            </select>
            <div id="searchBox">
                <input type="text" placeholder="Search" class="font15" id="inputSearchBy" name="inputSearchBy"/>
            </div>
        </div>
    </div>
    
    <div id="advanced" style="display:none">
        <a>Advanced Search</a>
        <a>|</a>
        <a href="#" onclick="simple()" >Simple Search</a><br><br>
        <label>Judul</label>
        <input type="text" id="jdl"></input><br><br>
        <label>Penulis</label>
        <input type="text" id="pnl"></input><br><br>
        <label>Penerbit</label>
        <input type="text" id="pnb"></input><br><br>
        <label>Genre</label>
        <input type="text" id="gnr"></input><br>
        <input onclick="search1()" type="button" id="submit" value="SEARCH"></input>
    </div>
</div>
<div id="daftarKomik" class="font15">
</div>
<!-- keperluan popup-->
<div id="blur" onclick="pencetBlur()">
</div>
<div id="popup"></div>