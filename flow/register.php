<?php

require_once 'dbConn.php';

$dbhost = 'localhost';
$dbuser  = 'root';
$dbpass = '';
$dbname = 'flow';


$errors   = array(); 
    
    
function signup($username, $password_1, $password_2){

    $connection = DBConn();
    
    global $connection, $errors, $username;

    $username    =  $_POST['username'];
    $password_1  =  $_POST['password'];
    $password_2  =  $_POST['confirm_password'];

    
    if (empty($username)) { 
        array_push($errors, "Username is required"); 
    }
    if (empty($password_1)) { 
        array_push($errors, "Password is required"); 
    }
    if ($password_1 != $password_2) {
        array_push($errors, "The two passwords entered are not the same");
    }

    if (count($errors) == 0) {
        $password = md5($password_1);

        $query = "INSERT INTO Users(user_type, username, password) "."VALUES('$user_type','$username', '$password')";

        $result = mysqli_query($connection, $query);
        if ($result) {
            header('location: index.html');
        } else {
            echo "Could not insert record! " . mysqli_error($connection);
        }
    

    }
    if (isset($_POST['user_type'])) {
        $user_type = $_POST['user_type'];
        $query = "INSERT INTO Users (user_type, username, password) "
        ."VALUES('$user_type','$username', '$password')";
        mysqli_query($connection, $query);
        $_SESSION['success']  = "New user successfully created!!";
        header('location: index.html');
    }else{
        $query = "INSERT INTO Users (username,user_type, password)" ." VALUES('$username', 'user', '$password')";
        mysqli_query($connection, $query);

        // get id of the created user
        $logged_in_user_id = mysqli_insert_id($connection);

        $_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
        $_SESSION['success']  = "You are now logged in";
        header('location: index.html');				
    }

}

function show_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}

function getUserById($id){
	global $connection;
	$query = "SELECT * FROM Users WHERE id=" . $id;
	$result = mysqli_query($connection, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

