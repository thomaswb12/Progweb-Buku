<?php
     include "member.php";
     if(isset($_POST['keyword'])&&isset($_POST['searchby'])&&isset($_POST['sortby']))
        $hasil = getAllMemberWith($_POST['keyword'],$_POST['searchby'],$_POST['sortby']);
        //$hasil = getBukuWith($_POST['keyword'],$_POST['searchby'],$_POST['sortby']);
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
                    <td class="telepon">'.$member['noTelp'].'</td>
                </tr>';
        $i++;                    
    }
?>