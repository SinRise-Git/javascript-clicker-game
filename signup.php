<?php 
session_start();
$Invalid = ("");
	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{

		$user_name = $_POST['user_name'];
		$password = $_POST['password'];

		//hva som må til for at passoret skal bli godkjent
		if(!empty($user_name) && !empty($password) && !ctype_alpha($password) && !is_numeric($password) && strlen($user_name) && strlen($password) > 7) {  
			$query = "SELECT * FROM users WHERE user_name='$user_name'";
			$result = mysqli_query($con, $query);
			if (mysqli_num_rows($result) > 0) {
			  $Invalid = ("Dette brukernavnet er allerede i bruk!");
			} else {
			  //lagrere infoen i databasen og gir deg en unik user_id
			  $user_id = random_num(20);
			  $query = "insert into users (user_id,user_name,password) values ('$user_id','$user_name','$password')";
			  mysqli_query($con, $query);
			  //sender deg til login.php når du er ferdig og lage en ny bruker
			  header("Location: login.php");
			  die;
			}
		  }
		  elseif(strlen($user_name) && strlen($password) < 6) {
			$Invalid = ("For kort! Minst 7 tall eller bokstaver!");
		  }
		  elseif(is_numeric($password)) {
			$Invalid = ("Passoret kan ikke bare være tall eller bokstaver!");
		  }
		  elseif(ctype_alpha($password)) {
			$Invalid = ("Passoret kan ikke bare være tall eller bokstaver!");
		  }
		  else {
			$Invalid = ("Du må velge et brukernavn og passord!");
		  }
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Sign Up</title>
    <link rel="stylesheet" href="/javascript-clicker-game/css/login.css">
</head>
<body>
<div class= "continer-l">
 <div class= div-grid-s>
  <div id="box" class="box">
		<form method="post">
		    <div class ="login">Sign Up</div>
			<div class="input">
			 <input id="text" type="text" name="user_name" placeholder="Brukernavn"><br><br>
			 <input id="text" type="password" name="password" placeholder="Passord"> <br><br>
			</div>
			 <input class="button" id="button" type="submit" value="Sign Up"><br><br>
			<a href="login.php">Click to Login</a><br><br>
			<p><?=$Invalid?></p>
		</form>
   </div>
   <div class="login-text">
  </div>
 </div>
</div>
</body>
</html>