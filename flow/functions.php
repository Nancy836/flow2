<?php 

session_start();

require_once ('dbConn.php');
require_once ('register.php');


$username = "";
$errors   = array(); 


if (isset($_POST['signup_btn'])) {
	signup($username, $password_1, $password_2);
}

function register($username, $password_1, $password_2){

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

		$query = "INSERT INTO Users (user_type, username, password) "
			."VALUES('$user_type','$username', '$password')";

		$result = mysqli_query($connection, $query);
		if ($result) {
			header('location: home.php');
		} else {
			echo "Could not insert record! " . mysqli_error($connection);
		}
	

		if (isset($_POST['user_type'])) {
			$user_type = $_POST['user_type'];
			if (empty($username)) { 
				array_push($errors, "Username is required"); 
			}
			if (empty($password)) { 
				array_push($errors, "Password is required"); 
			}
			$query = "INSERT INTO Users (user_type, username, password) "
			."VALUES('$user_type','$username', '$password')";
			mysqli_query($connection, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: home.php');
		}else{
			$query = "INSERT INTO Users (username,user_type, password)" ." VALUES('$username', 'user', '$password')";
			mysqli_query($connection, $query);

			// get id of the created user
			$logged_in_user_id = mysqli_insert_id($connection);

			$_SESSION['user'] = getUserById($logged_in_user_id); // put logged in user in session
			$_SESSION['success']  = "You are now logged in";
			header('location: index.php');				
		}
	}
}


// escape string
function e($val){
	global $connection;
	return mysqli_real_escape_string($connection, trim($val));
}


function isLoggedIn()
{
	if (isset($_SESSION['user'])) {
		return true;
	}else{
		return false;
	}
}
// log user out if logout button clicked
if (isset($_GET['logout'])) {
	session_destroy();
	unset($_SESSION['user']);
	header("location: login.php");
}

// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	login();
}

// LOGIN USER
function login(){
	global $connection, $username, $errors;

	// grap form values
	$username = e($_POST['username']);
	$password = e($_POST['password']);

	// make sure form is filled properly
	if (empty($username)) {
		array_push($errors, "Username is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	// attempt login if no errors on form
	if (count($errors) == 0) {
		$password = md5($password);

		$query = "SELECT * FROM Users WHERE username='$username' AND password='$password' LIMIT 1";
		$results = mysqli_query($connection, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			// check if user is admin or user
			$logged_in_user = mysqli_fetch_assoc($results);
			if ($logged_in_user['user_type'] == 'admin') {

				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";
				header('location: admin/home.php');		  
			}else{
				$_SESSION['user'] = $logged_in_user;
				$_SESSION['success']  = "You are now logged in";

				header('location: index.php');
			}
		}else {
			array_push($errors, "Wrong username/password combination");
		}
	}
}

function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}
