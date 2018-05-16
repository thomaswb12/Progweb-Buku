
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
    <table>
        <thead>
            <th class="tanggalPengembalian">Tanggal Aturan Pengembalian</th>
            <th class="idMember">ID Member</th>
            <th class="namaMember">Nama Member</th>
            <th class="peringatan"></th>
        </thead>
        <tbody id="daftarPeminjaman">
        
            
        </tbody>
    </table>
</div>


<!-- utk pop up message -->
<div id="blur" onclick="pencetBlur()">
</div>
<div id="popup">
    <i class="fas fa-times simbolX" onclick="pencetBlur()"></i>
    <br/><br/>
    <div id="parentIsiPopup">
        <div id="isiPopup">
            <div class="popupSatuan">
                <div class="divSimbolPopup"><i class="fas fa-id-card-alt simbolPopup"></i></div>
                <div class="atribut"><label>ID Member </label></div>
                <input class="value" id="popupIdMember" name="popupIdMember" value="" disabled/>
                <input class="value" id="popupIdMemberDummy" name="popupIdMemberDummy" value="" style="display:none;"/>
                <br/>
            </div>
            <div class="popupSatuan">
                <div class="divSimbolPopup"><i class="fas fa-user simbolPopup"></i></div>
                <div class="atribut"><label>Nama</label></div>
                <input class="value" id="popupNamaMember" name="popupNamaMember" value=""/>
                <br/>
            </div>
            <div class="popupSatuan">
                <div class="divSimbolPopup"><i class="fas fa-id-card simbolPopup"></i></div>
                <div class="atribut"><label>No Identitas</label></div>
                <input class="value" id="popupNoIdentitas" name="popupNoIdentitas" value=""/>
                <br/>
            </div>
            <div class="popupSatuan">
                <div class="divSimbolPopup"><i class="fas fa-phone simbolPopup"></i></div>
                <div class="atribut"><label>No Telp.</label></div>
                <input class="value" id="popupTelepon" name="popupTelepon" value=""/>
            </div>
            <div class="popupSatuan">
                <div class="divSimbolPopup"><i class="fas fa-transgender simbolPopup"></i></div>
                <div class="atribut"><label>Gender</label></div>
                <select name="popupGender" class="value" id="popupGender">
                    <option value=1>Perempuan</option>
                    <option value=2>Laki-laki</option>
                </select>
                <br/>
            </div>
            <div class="popupSatuan">
                <div class="divSimbolPopup"><i class="fas fa-envelope simbolPopup"></i></div>
                <div class="atribut"><label>Email</label></div>
                <input type="email" class="value" id="popupEmail" name="popupEmail" value=""/>
                <br/>
            </div>
            <div class="popupSatuan">
                <div class="divSimbolPopup"><i class="fas fa-birthday-cake simbolPopup"></i></div>
                <div class="atribut"><label>Tanggal Lahir</label></div>
                <input type="date" class="value" id="popupTanggalLahir" name="popupTanggalLahir" value=""/>
                <br/>
            </div>
            <div class="popupSatuan">
                <div class="divSimbolPopup"><i class="fas fa-home simbolPopup"></i></div>
                <div class="atribut"><label>Alamat</label></div>
                <input class="value" id="popupAlamat" name="popupAlamat" value=""/>
            </div>
            <br>
        </div>
    </div>
</div>