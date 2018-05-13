<?php
    include "curency.php";
    include "koneksi.php";

    $callFunction = $_POST['function'];
    switch($callFunction){
        case 1 : echo toRp($_POST['isiInput']); break;
        case 2 : tampilkanJabatan($_POST['data']); break;
        case 3 : loadKaryawan();break;
        case 4 : loadDetail($_POST['data']);break;
    }

    
    function loadDetail($data){
        global $conn;
        $sql = "";
        $conn->close();
        echo $data;
    }


    function loadKaryawan(){
        global $conn;
        $sql = "SELECT * FROM karyawan, jabatankaryawan where karyawan.idJabatan = jabatankaryawan.idJabatan;";
        if($result = $conn->query($sql)){
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo '<div class="infoKaryawan">
                            <img class="photo" src="hrdDaftarKaryawan/profile_pic.jpg"/>
                            <table>
                                <tr>
                                    <td><p class="label">ID</p></td>
                                    <td>:</td>
                                    <td><p class="isi">'.$row['idKaryawan'].'</p></td>
                                </tr>
                                <tr>
                                    <td><p class="label">Nama</p></td>
                                    <td>:</td>
                                    <td><p class="isi">'.$row['nama'].'</p></td>
                                </tr>
                                <tr>
                                    <td><p class="label">Jabatan</p></td>
                                    <td>:</td>
                                    <td><p class="isi">'.$row['namaJabatan'].'</p></td>
                                </tr>
                                <tr>
                                    <td><a href="#" class="more" onclick="viewKaryawan('."'".$row['idKaryawan']."'".')">Details >></a></td>
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
?>