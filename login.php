<?php 
session_start();
$Invalid = ("");
	include("connection.php");
	include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//Sjekker om du er har trykket på login knappen
		$user_name = $_POST['user_name'];
		$password = $_POST['password'];
  
	
		if(!empty($user_name) && !empty($password) && !is_numeric($password) && !ctype_alpha($password))
		{
			//skjekker fra databasen om passordet og bruker navnet er lagret der
			//skjekker først om bruker navnet er riktig
			$query = "select * from users where user_name = '$user_name' limit 1";
			$result = mysqli_query($con, $query);

			if($result)
			{
				if($result && mysqli_num_rows($result) > 0)
				{

					$user_data = mysqli_fetch_assoc($result);
					
					if($user_data['password'] === $password)
					{
                        //sender deg til index.php om bruker navnet og passordet er riktig
						$_SESSION['user_id'] = $user_data['user_id'];
						header("Location: index.php");
						die;
					}

				}
			}
						
		}

		else{
			$Invalid = ("Feil passord eller bruker navn!");
		}
	
	
	
	}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="/javascript-clicker-game/css/login-page.css">
</head>
<body>
	<div id="box" class="box">
		<form method="post">
		    <div class ="login">Login</div>
			<div class="input">
			 <input id="text" type="text" name="user_name" placeholder="Brukernavn"><br><br>
			 <input id="text" type="password" name="password" placeholder="Passord"><br><br>
			</div>
			 <input class="button" id="button" type="submit" value="Login"><br><br>
			<a href="signup.php">Click to Sign Up</a><br><br>
			<p><?=$Invalid?></p>
		    </div>
		</form>
	</div>
	<div class="login-text">
</body>
</html>