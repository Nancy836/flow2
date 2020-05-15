<?php
    
//create a function to connect to the database
function DBConnect($dbhost, $dbuser, $dbpass, $dbname) {
    $connection = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

    if (!$connection) {
        die("Connection to DB could not be made! " . mysqli_connect_error());
    }

    return $connection;
}

function disconnectDb($mysqli)
{
    $mysqli->close();
}

?>


