<?php
    require "koneksi.php";

    //ambil id terakhir yg terdaftar di tabel (utk generate id berikutnya) --> dipakai di kasir - tambah member
    function getLastIdPengarang(){
        global $conn;
        $sql = "SELECT idPenulis FROM penulis ORDER BY idPenulis DESC LIMIT 1";
        $result=mysqli_query($conn,$sql);
        $id;
        while($row=mysqli_fetch_assoc($result)){
            $id=$row['idPenulis'];
        }
        $id=substr($id,6);
        $id+=1;
        $numlength = strlen((string)$id);
        $newId="";
        for($i=0;$i<6-$numlength;$i++){
            $newId=$newId."0";
        }        
        return "BB".$newId.$id;
    }

    function getPengarang($idPengarang){
        global $conn;
        $sql = "SELECT * FROM penulis WHERE `idPenulis` = '$idPengarang'";
        $result=mysqli_query($conn,$sql);
        $data=array();
        if($result = $conn->query($sql)){
            while($rows = $result->fetch_assoc()){
                $data = $rows;
            }
            return $data;
        }
    }

    //ambil semua di tabel member
    function getAllPengarang(){
        global $conn;
        $sql = "SELECT * FROM penulis ORDER BY idPenulis ASC";
        $result=mysqli_query($conn,$sql);
        $data=array();
        while($row=mysqli_fetch_assoc($result)){
            $data[]=$row;
        }
        return $data;
    }

    //ambil member yg di search / & sort
    function getAllPenegarangtWith($kata,$dari,$sort){
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
        $sql =  " SELECT * FROM penulis where $dari like '$kata%' order by $sort ASC";
        $result = $conn->query($sql);
        while($rows = $result->fetch_assoc()){
            $data[] = $rows;
        }
        $conn->close();
        return $data;
    }
?>