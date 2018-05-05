<?php
     include "member.php";
     if(isset($_POST['kata'])&&isset($_POST['dari'])&&isset($_POST['sorting']))
        $hasil = getAllMemberWith($_POST['kata'],$_POST['dari'],$_POST['sorting']);
        //$hasil = getBukuWith($_POST['kata'],$_POST['dari'],$_POST['sorting']);
     else
        $hasil = getAllMember();
    $i=1;
    foreach($hasil as $member){
        echo    '<tr onclick="pencetTR($(this))">
                    <td class="nomor">'.$i.'</td>
                    <td class="idMember">'.$member['id'].'</td>
                    <td class="namaMember">'.$member['nama'].'</td>
                    <td class="email">'.$member['email'].'</td>
                    <td class="gender">'.$member['gender'].'</td>
                    <td class="noIdentitas">'.$member['idIdentitas'].'</td>
                    <td class="alamat">'.$member['alamat'].'</td>
                    <td class="tanggalLahir">'.$member['birtday'].'</td>
                </tr>';
        $i++;                    
    }
?>