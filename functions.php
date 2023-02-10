<?php

function check_login($con)
{

	if(isset($_SESSION['user_id']))
	{
      //skjekker om SESSION(Altså du som er innpå nettside) har en user_id som er lagret i databasen siden vær gang du lager en ny bruker så får vi utdelt et tilfeldig user_id som er unikt til den brukern
		$id = $_SESSION['user_id'];
		$query = "select * from users where user_id = '$id' limit 1";

		$result = mysqli_query($con,$query);
		if($result && mysqli_num_rows($result) > 0)
		{

			$user_data = mysqli_fetch_assoc($result);
			return $user_data;
		}
	}

	//Sender deg til login.php om du ikke har en valid user_id, siden filen ser om du har en user_id eller ikke.
	header("Location: login.php");
	die;

}

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 

		$text .= rand(0,9);
	}

	return $text;
}