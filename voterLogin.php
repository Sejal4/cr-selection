    
    <!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://fonts.googleapis.com/css?family=Secular+One" rel="stylesheet"> 
<link rel="stylesheet" type="text/css" href="master.css">
<style>
            body{
               background-color: #27ace854;
			
            }
            input{
                width: 250px;
                padding: 10px;
                margin: 5px;
                border-radius: 10px;
            }
            hr{
                align: center;
                width: 500px;
            }
        </style>
<?php 
if(!isset($_SESSION)) 
{ 
  session_start(); 
} 
 ?>
    <center>
<h1>Class Representative Selection System</h1>

<h4>Class Representative Selection Portal</h4>
</center>
<p>
<center>
</head>
<body>

<h2>Voter Login Form</h2>

<form action="loginSubmit.php" method="post">

 <div class="parent">
  <div class="container">
    <label for="uname"><b>Username</b></label>
    <input type="text" placeholder="Enter StudentID" name="uname" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="psw" required>
        
	 <p><mark><?php if(isset($_GET['error'])){ echo $_GET['error']; } ?></mark> </p>
    <button type="submit" >Login</button>
   <a href="index.php">New User? Register </a>
  </div>
  </div>


</form>