<?php include('functions.php')?>
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
            <form action= "login.php" method = "post">
                <?php echo show_error(); ?>

                <h2 class = "form-title">Login</h2>
                <br>
                <p> Don't yet have an account? <a href = "signup.php" style = "color: #404040">Sign up</a></p>  
                <br>
                <div class = "input"> 
                    <label> Username </label>
                    <input type = "text" name = "Username" class = "text-input" >
                </div>
                <div class = "input">
                    <label> Password</label>
                    <input type = "password" name = "password" class = "text-input"  >
                </div>
                <br>
                <div class = "input">
                    <button type = "submit" name = "login-btn" class = "button" >Login</button>
                </div>
                
                   
    
            </form>

        </div>
      
    </main>

    

</body>
</html>