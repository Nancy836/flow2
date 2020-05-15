
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,500,500i&display=swap" rel="stylesheet">
    <link rel="stylesheet" href = "FLOW.css"/>
    <title>FLOW - Breathe Life into your Thoughts</title>

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
                <li><input type="text" placeholder="Search..."></li>
            </ul>
        </nav>

    
    </header>

    <main>
        <section class = "introduction">
    
            <div class = "cover">
                <img src = "Images/poem_cvr.jpeg" />
            </div>

            <div class = "intro-text">
                <h4>Poetry is what gets lost in translation - <i>Robert Frost</i></h4>
                <h4>...Share your words with the world...</h4>
            </div>

<?php

$email= $_POST['email']; 
  

$connection= mysqli_connect('localhost','root','','flow')  
or die("Unable to select database".mysqli_connect_error()); 


 
$query= "INSERT INTO newsletter_emails(email_address)"."VALUES ('$email')"; 
 
$result = mysqli_query ($connection, $query) ;
if ($result) {

    echo 'Thank you for subscribing to the Flow newsletter!';
    
 
} else {
    echo 'Error querying database';
}

 
mysqli_close($connection); 


 
?> 


