<?php 
session_start();

include("connection.php");
include("functions.php");
$user_data = check_login($con);

// Sjekker om poengsummen er blitt oppdatert
if (isset($_POST["score"])) {
  // henter den oppdaterte scoren
  $score = intval($_POST["score"]);

  // lagrer score i databasen med $user_data sånn at det blir lagret i din bruker
  $query = "UPDATE users SET cookies = ? WHERE id = ?";
  $stmt = $con->prepare($query);
  $stmt->bind_param("ii", $score, $user_data["id"]);
  $stmt->execute();
}
if (isset($_POST["amount1"])) {
  // henter den oppdaterte amount1-verdien
  $amount1 = intval($_POST["amount1"]);

  // lagrer amount1 i databasen med $user_data sånn at det blir lagret i din bruker
  $query = "UPDATE users SET amount1 = ? WHERE id = ?";
  $stmt = $con->prepare($query);
  $stmt->bind_param("ii", $amount1, $user_data["id"]);
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
   <h2>Score: <span id ="score"><?php echo $user_data['cookies']; ?></span></h2> 
   <img src="/javascript-clicker-game/images/clicker.png" height="270px" width="300px" onclick="addToScore();"> 
   <script>
   var score = <?php echo $user_data['cookies']; ?>;
   var amount1 = <?php echo $user_data['amount1']; ?>;
   </script>
  </div>
   <div class="upgrade">
     <h2>Upgrade Clicks</h2> 
     <div class="div-grid-u">
        <div>
         <button onclick="Upgrade1();">  +1 (<span id ="amount1"><?php echo $user_data['amount1']; ?></span>)</button>
        </div>
        <div>
         <button onclick="UpgradeOne();">  +1 (<span id ="amount1"><?php echo $user_data['amount1']; ?></span>)</button>
        </div>
        <div>
         <button onclick="UpgradeOne();">  +1 (<span id ="amount1"><?php echo $user_data['amount1']; ?></span>)</button>
        </div>
     </div>
   </div>
  </div>
 </div> 
 <div class="logout">
  <a href="logout.php">Logout</a>
 </div> 
 </body>
</html>
