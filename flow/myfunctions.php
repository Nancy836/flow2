<?php

require_once ('dbConn.php');
$dbhost = 'localhost';
    $dbuser  = 'root';
    $dbpass = '';
    $dbname = 'flow';


$errors   = array(); 

function Signup ($username,$password_1, $password_2 ){

    $connection = DBConn();

    global $connection, $errors, $username;

	$username    =  $_POST['username'];
	$password_1  =  $_POST['password'];
	$password_2  =  $_POST['confirm_password'];

	// form validation: ensure that the form is correctly filled
	if (empty($username)) { 
		array_push($errors, "Username is required"); 
	}
	if (empty($password_1)) { 
		array_push($errors, "Password is required"); 
	}
	if ($password_1 != $password_2) {
		array_push($errors, "The two passwords entered are not the same");
	}

	// register user if there are no errors in the form
	if (count($errors) == 0) {
        $password = md5($password_1);//encrypt the password before saving in the database
        
        $query = "INSERT INTO (username, password)". " VALUES ('$username','$password')";
        $result = mysqli_query($connection, $query);
        if($result){
            echo "Record Successfully added";

        }else{
            echo "Record connection failed";
        }
        echo 'The username and password is ' .$username. ' and  ' .$password. '<br/>';

    

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





?>