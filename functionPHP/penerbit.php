<?php
    require "koneksi.php";

    //ambil id terakhir yg terdaftar di tabel (utk generate id berikutnya) --> dipakai di kasir - tambah member
    function getLastIdPenerbit(){
        global $conn;
        $sql = "SELECT idPenerbit FROM penerbit ORDER BY idPenerbit DESC LIMIT 1";
        $result=mysqli_query($conn,$sql);
        $id;
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['idPenerbit'];
        }
        $id=substr($id,6);
        $id+=1;
        $numlength = strlen((string)$id);
        $newId="";
        for($i=0;$i<6-$numlength;$i++){
            $newId=$newId."0";
        }        
        return "AA".$newId.$id;
    }

    //ambil semua di tabel member
    function getAllPenerbit(){
        global $conn;
        $sql = "SELECT * FROM penerbit ORDER BY idPenerbit ASC";
        $result=mysqli_query($conn,$sql);
        $data=array();
        while($row=mysqli_fetch_assoc($result)){
            $data[]=$row;
        }
        return $data;
    }

    //ambil member yg di search / & sort
    function getAllPenerbitWith($kata,$dari,$sort){
        global $conn;
        switch($dari){
            case 1 : $dari = "id"; break;
            case 2 : $dari = "nama";break;
        }
        switch($sort){
            case 1 : $sort = "id"; break;
            case 2 : $sort = "nama";break;
        }
        $data=array();
        $sql =  " SELECT * FROM penerbit where $dari like '$kata%' order by $sort ASC";
        $result = $conn->query($sql);
        while($rows = $result->fetch_assoc()){
            $data[] = $rows;
        }
        $conn->close();
        return $data;
    }
?>