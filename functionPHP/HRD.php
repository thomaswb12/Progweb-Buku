<?php
    include "curency.php";
    include "koneksi.php";

    $callFunction = $_POST['function'];
    switch($callFunction){
        case 1 : echo toRp($_POST['isiInput']); break;
        case 2 : tampilkanJabatan($_POST['data']); break;
        case 3 : loadKaryawan();break;
        case 4 : loadDetail($_POST['data']);break;
        case 6 : ajaxTampilGambar($_FILES['foto']);break;
        case 7 : tampilkanIdJabatan($_POST['data']); break;
    }

    function tampilinGambar($tamp){
        echo is_array($tamp);
    }
    
    function loadDetail($data){
        global $conn;
        $sql = "SELECT * FROM karyawan, jabatankaryawan where karyawan.idJabatan = jabatankaryawan.idJabatan and karyawan.idKaryawan = '$data';";
        if($result = $conn->query($sql)){
            if ($result->num_rows == 1) {
                while($row = $result->fetch_assoc()) {
                    echo '  <div class="detailKaryawan">
                            <div class="kiri">
                                <div id="inputan">
                                    <label>ID</label>
                                    <input type="text" id="idKaryawan" class="disable" value="'.$row['idKaryawan'].'" disable="disabled"/>
                                    <br/><br/><br/>
                                    <label>Nama</label>
                                    <input type="text" id="namaKaryawan" value="'.$row['nama'].'"/>
                                    <br/><br/><br/>
                                    <label>Jabatan</label>
                                    <select id="selectJabatan">';
                                       $query = "SELECT * FROM jabatankaryawan";
                                       $hasil = $conn->query($query);
                                       while($baris = $hasil->fetch_assoc()){
                                            if($baris['namaJabatan'] == $row['namaJabatan'])
                                                echo '<option value="'.$baris['idJabatan'].'" selected="selected">'.$baris['namaJabatan'].'</option>';
                                            else   
                                                echo '<option value="'.$baris['idJabatan'].'">'.$baris['namaJabatan'].'</option>'; 
                                       }
                    echo           '</select>
                                    <br/><br/><br/>
                                    <label>Email</label>
                                    <input type="email" id="email" value="'.$row['email'].'"/>
                                    <br/><br/><br/>
                                    <label>No. Telp</label>
                                    <input type="text" id="telepon" value="'.$row['noTelp'].'">
                                    <br/><br/><br/>
                                    <div id="divAl"><label>Alamat</label></div>
                                    <textarea id="alamat" name="alamat">'.$row['Alamat'].'</textarea>
                                    <br/><br/><br/><br/><hr><br>
                                    <label>Password</label>
                                    <input type="password" id="pass1" name="pass1" oninput="cekPassword()"/>
                                    <br/><br/>
                                    <label>Re-Input Password</label>
                                    <input type="password" id="pass2" name="pass2" oninput="cekPassword()"/>
                                    <br/>
                                    <p id="warningPass" style="display:none;color:red;">*password tidak sama</p>
                                    <br/><br/><br/>
                                </div>  
                            </div>
                            <div class="kanan">
                            <label>Photo Profile</label>
                                <input type="file" id="gambar" name="gambar"/><br/>
                                <span class="peraturan"><i>Format : PNG, JPG, JPEG.</i></span><br><br>
                                <img id="foto200px" class="photo" src="../'.$row['foto'].'"/><br><br><br>
                                <input type="button" id="tombolCancel" name="tombokCancel" class="tombol" value="CANCEL" onclick="aside1()"/>
                                <input type="button" id="tombolSave" name="tombokSave" class="tombol" value="SAVE" onclick="pilihan(5)"/>
                            </div>
                        </div>';
                }
            }
            else{
                echo "testii";
            }
        }
        $conn->close();
    }


    function loadKaryawan(){
        global $conn;
        $sql = "SELECT * FROM karyawan, jabatankaryawan where karyawan.idJabatan = jabatankaryawan.idJabatan;";
        if($result = $conn->query($sql)){
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="infoKaryawan">
                            <img class="photo" src="../'.$row['foto'].'"/>
                            <table>
                                <tr>
                                    <td class="attr"><p class="label">ID</p></td>
                                    <td>:</td>
                                    <td><p class="isi">'.$row['idKaryawan'].'</p></td>
                                </tr>
                                <tr>
                                    <td class="attr"><p class="label">Nama</p></td>
                                    <td>:</td>
                                    <td><p class="isi">'.$row['nama'].'</p></td>
                                </tr>
                                <tr>
                                    <td class="attr"><p class="label">Jabatan</p></td>
                                    <td>:</td>
                                    <td><p class="isi">'.$row['namaJabatan'].'</p></td>
                                </tr>
                                <tr>
                                    <td colspan="3"><a href="#" class="more" onclick="viewKaryawan('."'".$row['idKaryawan']."'".')">Details >></a></td>
                                </tr>
                            </table>
                        </div>';
                }
            }else{
                echo "";
            }
        }
        $conn->close();
    }

    function tampilkanJabatan($data){
        global $conn;
        $sql = "SELECT * FROM jabatankaryawan WHERE idJabatan='$data'";
        $result=mysqli_query($conn,$sql);
        $jabatan;
        while($row=mysqli_fetch_assoc($result)){
            $jabatan=$row;
        }
        ?>
        <script>
        //kalau dipindah ke HRDDefault.js malah gaisa
        $(document).ready(function(){
            var awal=$("#gaji").val();
            $("#gaji").on("input",function(){
                var coba = $("#gaji").val().toString().replace('Rp. ','').replace(/\./g, '');
                if(coba=="") $("#gaji").val("");
                else if(!$.isNumeric(coba)){
                    $("#gaji").val(awal);
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
        <?php
        echo '<label>ID Jabatan</label>
        <input type="text" id="idJabatan" name="idJabatan" value='.(($data!=-1)?'"'.$jabatan['idJabatan'].'"':'""').' class="disable" disabled="disabled"/>
        <input type="text" name="idJabatanCadangan" value='.(($data!=-1)?'"'.$jabatan['idJabatan'].'"':'""').' style="display:none;"/>
        <br/><br/>
        <label>Nama Jabatan</label>
        <input type="text" id="namaJabatan" name="namaJabatan" value='.(($data!=-1)?'"'.$jabatan['namaJabatan'].'"':'""').'/>
        <br/><br/>
        <label>Gaji</label>
        <input type="text" id="gaji" name="gaji" value='.(($data!=-1)?'"'.toRp($jabatan['gaji']).'"':'""').'/>
        <br/><br/>
        <div id="divKet"><label>Keterangan</label></div>
        <textarea id="keterangan" name="keterangan">'.(($data!=-1)?''.$jabatan['keterangan'].'':'').'</textarea>
        <br/><br/>';
    }

    function tampilkanIdJabatan($data){
        global $conn;
        $sql = "SELECT idKaryawan FROM karyawan WHERE idJabatan='$data' ORDER BY idKaryawan DESC LIMIT 1";
        $result=mysqli_query($conn,$sql);
        $jabatan;
        while($row=mysqli_fetch_assoc($result)){
            $jabatan=$row['idKaryawan'];
        }
        $idJab=substr($jabatan,0,4);
        $idKar=substr($jabatan,4)+1;
        $numlength = strlen((string)$idKar);
        $newId="";
        for($i=0;$i<4-$numlength;$i++){
            $newId=$newId."0";
        }  
        $jabatan="$idJab"."$newId"."$idKar";
        echo $jabatan;
    }
?>