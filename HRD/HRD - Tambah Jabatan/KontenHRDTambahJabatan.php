<?php
    session_start();
?>

<script>
    //belum kupindah ke HRDDefault.js
    $(document).ready(function(){
        $("#gaji").on("input",function(){
            var coba = $("#gaji").val().toString().replace('Rp. ','').replace(/\./g, '');
            $.ajax({
                type : 'post',
                data : {'function': 1, 'isiInput':coba},
                url: '../functionPHP/HRD.php',
                success: function(response){
                    //alert(response);
                    $("#gaji").val(response);
                }
            });
        });
    });
</script>
<h1>Tambah Jabatan</h1><br/>
<form action="../functionPHP/KontenHRDTambahJabatan.php" method="post">
    <div id="inputan">
        <label>ID Jabatan</label>
        <input type="text" id="idJabatan" name="idJabatan"/>
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
        <!-- tombol save -->
        <input type="button" id="tombolSave" name="tombokSave" class="tombol" value="SAVE"/>
    </div> 
</form>