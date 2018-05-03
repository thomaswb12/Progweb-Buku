<?php
    require "koneksi.php";

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
?>