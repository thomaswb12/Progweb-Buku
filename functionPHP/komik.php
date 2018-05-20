<?php
    require "koneksi.php";

    //ambil id terakhir yg terdaftar di tabel (utk generate id berikutnya) --> dipakai di kasir - tambah member
    function getLastIdKomik(){
        global $conn;
        $sql = "SELECT idBuku FROM buku ORDER BY idBuku DESC LIMIT 1";
        $result=mysqli_query($conn,$sql);
        $id;
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['idBuku'];
        }
        $id=substr($id,6);
        $id+=1;
        $numlength = strlen((string)$id);
        $newId="";
        for($i=0;$i<6-$numlength;$i++){
            $newId=$newId."0";
        }        
        return "DD".$newId.$id;
    }
?>