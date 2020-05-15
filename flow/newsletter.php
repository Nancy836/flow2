<?php 

$email= $_POST['email']; 
  

$dbc= mysqli_connect('localhost','root','','flow')  
or die("Unable to select database".mysqli_connect_error()); 
 
 
$query= "INSERT INTO newsletter_emails(email) VALUES ('$email')"; 
 
mysqli_query ($dbc, $query) 
or die ("Error querying database"); 
 
echo 'You have been successfully added.' . '<br>'; 
 
mysqli_close($dbc); 
 
?> 