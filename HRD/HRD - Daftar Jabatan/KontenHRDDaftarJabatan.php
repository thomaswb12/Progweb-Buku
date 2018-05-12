<?php
    session_start();
?>

<script>
    //kalau dipindah ke HRDDefault.js malah gaisa
    $(document).ready(function(){
        $("#gaji").on("input",function(){
            var coba = $("#gaji").val().toString().replace('Rp. ','').replace(/\./g, '');
            if(coba=="") $("#gaji").val("");
            else if(!$.isNumeric(coba)){
                $("#gaji").val("");
                alert("Input harus berupa angka");
            }
            else{
                $.ajax({
                    type : 'post',
                    data : {'function': 1, 'isiInput':coba},
                    url: '../functionPHP/HRD.php',
                    success: function(response){
                        //alert(response);
                        $("#gaji").val(response);
                    }
                });
            } 
        });
    });
</script>

<h1>Edit Jabatan</h1><br/>
<div id="sorting">
    <label id="labelSortBy" class="blue font15">Search Jabatan :</label><br/>
    <select id="selectSortBy selectJabatan" class="font15" onchange="pilihJabatan(this.value)">
        <option value=-1>---Jabatan---</option>
        <?php
            include "../../functionPHP/koneksi.php";
            $q="SELECT * FROM jabatankaryawan";
            $result=mysqli_query($conn,$q);
            while($row=mysqli_fetch_assoc($result)){
                echo "<option value=".$row['idJabatan'].">".$row['namaJabatan']."</option>";
            }
        ?>
    </select>
</div>
<form action="../functionPHP/editJabatan.php" method="post">
    <div id="inputan">
        <div id="isi">
            <label>ID Jabatan</label>
            <input type="text" id="idJabatan" name="idJabatan" class="disable" disabled="disabled"/>
            <input type="text" name="idJabatanCadangan" style="display:none;"/>
            <br/><br/>
            <label>Nama Jabatan</label>
            <input type="text" id="namaJabatan" name="namaJabatan"/>
            <br/><br/>
            <label>Gaji</label>
            <input type="text" id="gaji" name="gaji"/>
            <br/><br/>
            <div id="divKet"><label>Keterangan</label></div>
            <textarea id="keterangan" name="keterangan"></textarea>
            <br/><br/>
        </div>
        <!-- tombol save -->
        <div id="divTombol">
            <input type="submit" id="tombolSave" name="tombolSave" class="tombol" value="SAVE"/>
            <input type="submit" id="tombolDelete" name="tombolDelete" class="tombol" value="DELETE"/>
        </div>
    </div> 
</form>

<?php
    //kalau belum pilih jabatan sudah ada di database
    if(isset($_SESSION["belumPilih"])){
        unset($_SESSION["belumPilih"]);
        ?>
        <script type="text/javascript">
            alert("Pilih jabatan yang ingin diedit terlebih dahulu melalui menu dropdown");
        </script>
        <?php
    }

    //kalau data yang diisi belum lengkap
    if(isset($_SESSION["belumLengkap"])){
        unset($_SESSION["belumLengkap"]);
        ?>
        <script type="text/javascript">
            alert("Gagal diedit: Data tidak lengkap!");
        </script>
        <?php
    }

    //berhasil diubah
    if(isset($_SESSION["berhasil"])){
        unset($_SESSION["berhasil"]);
        ?>
        <script type="text/javascript">
            alert("Berhasil diedit :)");
        </script>
        <?php
    }

    //tidak ada data yang berubah
    if(isset($_SESSION["tidakBerubah"])){
        unset($_SESSION["tidakBerubah"]);
        ?>
        <script type="text/javascript">
            alert("Tidak ada data yang berubah");
        </script>
        <?php
    }
?>