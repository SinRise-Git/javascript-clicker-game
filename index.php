
<?php 
session_start();

	include("connection.php");
	include("functions.php");
	$user_data = check_login($con);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Nettside-Logget-Inn
   </title>
	<link rel="stylesheet" href="javascript-clicker-game/css/index.css">
</head>
<body>
	<h1>Du klarte og logge inn ;-)</h1>
	<br>
	Velkommen, <?php echo $user_data['user_name']; ?>
   <div class="logout">
    <a href="logout.php">Logout</a>
   </div>
</body>
</html>