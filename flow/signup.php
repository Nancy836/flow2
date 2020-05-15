<?php 
include('includes/register.php');

if (isset($_POST['signup-btn'])) {
    $username    = $_POST['username'];
	$password_1  = $_POST['password'];
	$password_2  = $_POST['confirm_password'];
	signup($username,$password_1,$password_2);
}?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,500i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href = "FLOW.css"/>
    <title>Sign up</title>

</head>
<body>

    <header>
        <div class = "logo-container">
            <h1 class ="logo"><i>Flow</i></h1> 
            <h4 class = "subtext"><i>Breathe Life into Your Thoughts</i></h4>

        </div>
        <nav>
            <ul class = "nav-links">
                <li><a class = "nav-link" href = "./index.html">Home</a></li>
                <li><a class = "nav-link" href = "./poetry/">Poems</a></li>
                <li><a class = "nav-link" href = "./signup.php">Sign up</a></li>
                <li><a class = "nav-link" href = "./login.php">Login</a></li>
                <li><input type="text" placeholder="Search.."></li>
            </ul>

        </nav>

    
    </header>

    <main>
        <div class = "member-content">
            <form action= "signup.php" method = "post">
                <h2 class = "form-title">Sign up to become a member</h2>
                <br>
                <p> Are you already a member? <a href = "login.php" style = "color: #404040">Login</a></p>  
                <br>
                <div class = "input"> 
                    <label> Username </label>
                    <input type = "text" name = "username" value = "" class = "text-input" required >
                </div>
                <div class = "input">
                    <label> Password</label>
                    <input type = "password" name = "password" value = "" class = "text-input" required>
                </div>
                <div class = "input">
                    <label> Confirm Password</label>
                    <input type = "password" name = "confirm_password" value = "" class = "text-input" required>
                </div>
                <br>
                <div class = "input">
                    <button type = "submit" name = "signup-btn" class = "button" >Sign up</button>
                </div>
                
                   
    
            </form>

        </div>
      
    </main>

    

</body>
</html>
