<?php

function DBConn(){
    $dbhost = 'localhost';
    $dbuser  = 'root';
    $dbpass = '';
    $dbname = 'flow';

    $connection = mysqli_connect($dbhost,$dbuser,$dbpass, $dbname);


    if (!$connection){
        die("Could not connect ....".mysqli_connect_error());

    }
    else{
        echo "Connected";
    }

    return $connection;

}


