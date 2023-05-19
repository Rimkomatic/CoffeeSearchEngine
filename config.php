<?php

    ob_start();

    try{

        $con=new PDO("mysql:dbname=coffee;host=localhost","root","");
        $con->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_WARNING);
        $con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING ); 
        $con->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 

    }catch(PDOException  $e)
    {
        echo "connection failed ". $e->getMessage();
    }


?>