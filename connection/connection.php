<?php

function connection(){

    $host = "localhost";
    $user = "root";
    $password = "1234";
    $database = "message_me";

    $con = new mysqli($host, $user, $password, $database);

    if($con->connect_error){
        echo $con->connect_error;
    }else{
        return $con;
    }

}

?>