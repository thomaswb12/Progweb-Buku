<?php
    include "curency.php";
    $callFunction = $_POST['function'];
    switch($callFunction){
        case 1 : echo toRp($_POST['isiInput']); break;
    }
    
?>