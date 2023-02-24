function addToScore() {
  score += amount1 + 1;
  document.getElementById('score').innerHTML = score;
  //Sender den opptattert scoren til php scriptet
  var xhr = new XMLHttpRequest();
  xhr.open("POST", location.href, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      console.log("Score updated successfully" , score);
    }
  } 
  xhr.send("score=" + score);
}

function Upgrade1() {
  if (score >= 100) {
   score -= 100 ;
   amount1 += 1
   document.getElementById('score').innerHTML = score;
   document.getElementById('amount1').innerHTML = amount1;
   //Sender den oppdaterte scoren og amount1 til php scriptet
   var xhr = new XMLHttpRequest();
   xhr.open("POST", location.href, true);
   xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   xhr.onreadystatechange = function() {
     if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
       console.log("You got another upgrade", amount1);
     }
   } 
   xhr.send("score=" + score + "&amount1=" + amount1);
   return price
  }
 }
