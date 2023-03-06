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
if (isset($_POST["amount10"])) {
  // henter den oppdaterte amount10-verdien
  $amount10 = intval($_POST["amount10"]);

  // lagrer amount10 i databasen med $user_data sånn at det blir lagret i din bruker
  $query = "UPDATE users SET amount10 = ? WHERE id = ?";
  $stmt = $con->prepare($query);
  $stmt->bind_param("ii", $amount10, $user_data["id"]);
  $stmt->execute();
}
if (isset($_POST["amount100"])) {
  // henter den oppdaterte amount100-verdien
  $amount100 = intval($_POST["amount100"]);

  // lagrer amount100 i databasen med $user_data sånn at det blir lagret i din bruker
  $query = "UPDATE users SET amount100 = ? WHERE id = ?";
  $stmt = $con->prepare($query);
  $stmt->bind_param("ii", $amount100, $user_data["id"]);
  $stmt->execute();
}
if (isset($_POST["amount1000"])) {
  // henter den oppdaterte amount100-verdien
  $amount1000 = intval($_POST["amount1000"]);

  // lagrer amount100 i databasen med $user_data sånn at det blir lagret i din bruker
  $query = "UPDATE users SET amount1000 = ? WHERE id = ?";
  $stmt = $con->prepare($query);
  $stmt->bind_param("ii", $amount1000, $user_data["id"]);
  $stmt->execute();
}
?>

<!DOCTYPE html>
<html>
<head>
  <title> Score: <?php echo $user_data['cookies']; ?></title>
  <link rel="stylesheet" href="/javascript-clicker-game/css/cookie_index.css">
  <script src="/javascript-clicker-game/javascript/cookies-index.js"></script>
</head>
<body>
<h1>Amalie Skram Clicker</h1>
<div class ="div-grid"> 
  <div class="clicker"> 
   <h2>Score: <span id ="score"><?php echo $user_data['cookies']; ?></span></h2> 
   <p class="SPC">SPC: <span id="spc-verdi"> </p>
   <img src="/javascript-clicker-game/images/clicker.png" height="270px" width="300px" onclick="addToScore();"> 
   <script>
   // Det går ikke å bruke i php echo i cookies-index.js av enn eller annnen grunn derfor er det her og ikke i cookies-index.js filen
   var score = <?php echo $user_data['cookies']; ?>;
   var amount1 = <?php echo $user_data['amount1']; ?>;
   var amount10 = <?php echo $user_data['amount10']; ?>;
   var amount100 = <?php echo $user_data['amount100']; ?>;
   var amount1000 = <?php echo $user_data['amount1000']; ?>;
   var spc = 1 + amount1 + (amount10 * 10) + (amount100 * 100) + (amount1000 * 1000);
   
   document.getElementById("spc-verdi").textContent = spc;
   
   function updateSPCValue() {
      var newSPC = 1 + amount1 + (amount10 * 10)  + (amount100 * 100) + (amount1000 * 1000);
      if (newSPC !== spc) {
         spc = newSPC;
         document.getElementById("spc-verdi").textContent = spc;
      }
   }
   
   setInterval(updateSPCValue, 10); //Opptattering vært 10 ms
</script>

  </div>
   <div class="upgrade">
     <h2>Upgrade Clicks</h2> 
        <div class="U1">
         <button onclick="Upgrade1();">  +1 (<span id ="amount1"><?php echo $user_data['amount1']; ?></span>)</button>
        </div>
        <div class="U10">
         <button onclick="Upgrade10();">  +10 (<span id ="amount10"><?php echo $user_data['amount10']; ?></span>)</button>
        </div>
        <div class="U100">
         <button onclick="Upgrade100();">  +100 (<span id ="amount100"><?php echo $user_data['amount100']; ?></span>)</button>        
        </div>
        <div class="U1000">
         <button onclick="Upgrade1000();">  +1000 (<span id ="amount1000"><?php echo $user_data['amount1000']; ?></span>)</button>
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
