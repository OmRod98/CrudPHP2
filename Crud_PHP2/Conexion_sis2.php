<?php
    $serverName = "localhost";
    $connectionInfo=array ("Database"=>"prueba_usuarios2", "UID"=>"usuario3", "PWD"=>"12345", "CharacterSet"=>"UTF-8");
    $con = sqlsrv_connect($serverName, $connectionInfo);


    if($con){
            echo " conexion  exitosa ";
    } else{
            echo " fallo  en  la conexion ";
    }



?>