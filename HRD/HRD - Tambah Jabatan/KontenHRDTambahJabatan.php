<?php
    session_start();
?>

<script>
    //kalau dipindah ke HRDDefault.js malah gaisa
    $(document).ready(function(){
        $("#tambahGaji").on("input",function(){
            var coba = $("#tambahGaji").val().toString().replace('Rp. ','').replace(/\./g, '');
            if(coba=="") $("#tambahGaji").val("");
            else if(!$.isNumeric(coba)){
                $("#tambahGaji").val("");
                alert("Input harus berupa angka");
            }
            else{
                $.ajax({
                    type : 'post',
                    data : {'function': 1, 'isiInput':coba},
                    url: '../functionPHP/HRD.php',
                    success: function(response){
                        //alert(response);
                        $("#tambahGaji").val(response);
                    }
                });
            } 
        });
    });
</script>

<h1>Tambah Jabatan</h1><br/>
<form action="../functionPHP/tambahJabatan.php" method="post">
    <div id="inputan">
        <label>ID Jabatan</label>
        <input type="text" id="idJabatan" name="idJabatan"/>
        <div id="aturanIdJabatan">
            <p><b>Aturan penamaan ID Jabatan:</b></p>
            <p>Terdiri dari 4 huruf yang berupa unsur dari nama jabatannya</p>
            <p>Contoh : Manager -> MNGR</p>
        </div>
        <br/><br/>
        <label>Nama Jabatan</label>
        <input type="text" id="namaJabatan" name="namaJabatan"/>
        <br/><br/>
        <label>Gaji</label>
        <input type="text" id="tambahGaji" name="tambahGaji"/>
        <br/><br/>
        <div id="divKet"><label>Keterangan</label></div>
        <textarea id="keterangan" name="keterangan"></textarea>
        <br/><br/>
        <!-- tombol save -->
        <input type="submit" id="tombolSave" name="tombolSave" class="tombol" value="SAVE"/>
    </div> 
</form>

<?php
    //kalau pass berbeda
    if(isset($_SESSION["beda"])){
        unset($_SESSION["beda"]);
        ?>
        <script type="text/javascript">
            alert("Gagal ditambahkan: Password tidak sama!");
        </script>
        <?php
    }

    //kalau data yang diisi belum lengkap
    if(isset($_SESSION["belumLengkap"])){
        unset($_SESSION["belumLengkap"]);
        ?>
        <script type="text/javascript">
            alert("Gagal ditambahkan: Data belum lengkap!");
        </script>
        <?php
    }

    //kalau id jabatan sudah ada di database
    if(isset($_SESSION["idSudahAda"])){
        unset($_SESSION["idSudahAda"]);
        ?>
        <script type="text/javascript">
            alert("Gagal ditambahkan: ID ini sudah pernah dibuat!");
        </script>
        <?php
    }

    //kalau nama jabatan sudah ada di database
    if(isset($_SESSION["namaSudahAda"])){
        unset($_SESSION["namaSudahAda"]);
        ?>
        <script type="text/javascript">
            alert("Gagal ditambahkan: Nama jabatan ini sudah ada!");
        </script>
        <?php
    }

    //kalau berhasil didaftarkan menjadi member
    if(isset($_SESSION["berhasil"])){
        unset($_SESSION["berhasil"]);
        ?>
        <script type="text/javascript">
            alert("Jabatan berhasil ditambahkan :)");
        </script>
        <?php
    }
?>