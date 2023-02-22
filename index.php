<?php 
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con);

// Sjekker om poengsummen er blitt opptattert"
if (isset($_POST["score"])) {
  // henter den opptattert scoren
  $score = intval($_POST["score"]);

  // lagrer score i databasen med $user_data sånn at det blir lagret i din bruker
  $query = "UPDATE users SET cookies = ? WHERE id = ?";
  $stmt = $con->prepare($query);
  $stmt->bind_param("ii", $score, $user_data["id"]);
  $stmt->execute();
}

?>
<!DOCTYPE html>
<html>
<head>
  <title> Score: <?php echo $user_data['cookies']; ?></title>
  <link rel="stylesheet" href="/javascript-clicker-game/css/cookie-index.css">
  <script src="/javascript-clicker-game/javascript/cookies-index.js"></script>
</head>
<body>
<h1>Amalie Skram Clicker</h1>
 <div class ="div-grid"> 
  <div class="clicker"> 
   <p>Score: <span id ="score"><?php echo $user_data['cookies']; ?></span></p>  
   <img src="/javascript-clicker-game/images/clicker.png" height="270px" width="300px" onclick="addToScore();"> 
   <script>var score = <?php echo $user_data['cookies']; ?>;</script>
  </div>
  <div class="upgrade">
     <h1>Upgrade Clicks</h1> 
     <button onclick="UpgradeOne(100)"> -100 </button>
    </div>
  </div>
 </div> 
 <div class="logout">
  <a href="logout.php">Logout</a>
 </div> 
 </body>
</html>
