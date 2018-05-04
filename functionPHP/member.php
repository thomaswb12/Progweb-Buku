<?php
    require "koneksi.php";

    //ambil id terakhir yg terdaftar di tabel (utk generate id berikutnya) --> dipakai di kasir - tambah member
    function getLastIdMember(){
        global $conn;
        $sql = "SELECT id FROM member ORDER BY id DESC LIMIT 1";
        $result=mysqli_query($conn,$sql);
        $id;
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['id'];
        }
        $id=substr($id,1,6);
        $id+=1;
        $numlength = strlen((string)$id);
        $newId="";
        for($i=0;$i<6-$numlength;$i++){
            $newId=$newId."0";
        }        
        return "M".$newId.$id;
    }

    //ambil semua di tabel member
    function getAllMember(){
        global $conn;
        $sql = "SELECT * FROM member ORDER BY id ASC";
        $result=mysqli_query($conn,$sql);
        $data=array();
        while($row=mysqli_fetch_assoc($result)){
            $data[]=$row;
        }
        return $data;
    }

    //ambil member yg di search / & sort
    function getAllMemberWith($kata,$dari,$sort){
        global $conn;
        switch($dari){
            case 1 : $dari = "id"; break;
            case 2 : $dari = "nama";break;
            case 3 : $dari = "email";break;
        }
        switch($sort){
            case 1 : $sort = "id"; break;
            case 2 : $sort = "nama";break;
            case 3 : $sort = "email";break;
        }

        $sql =  " SELECT * FROM member where $dari like '$kata%' order by $sort ASC";
        $result = $conn->query($sql);
        if ($result->num_rows > 0) {
            while($rows = $result->fetch_assoc()){
                $data[] = $rows;
            }
            $conn->close();
            return $data;
        }
        else{
            echo "gagal";
            $conn->close();
        } 
    }

    //tampilkan semua member di tabel --> dipakai di kasir daftar member
    function tampilMemberDalamTabel(){
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
                    </tr>';
            $i++;                    
        }
    }
?>