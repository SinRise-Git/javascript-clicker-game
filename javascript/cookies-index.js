let price1 = 100
let price10 = 1000
let price100 = 10000
let price1000 = 100000

function addToScore() {
  score += amount1 + (amount10 * 10) + (amount100* 100) + (amount1000 * 1000)+ 1;
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
   score -= price1;
   amount1 += 1
   document.getElementById('score').innerHTML = score;
   document.getElementById('amount1').innerHTML = amount1;
   }  
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
  }

 
function Upgrade10() {
  if (score >= 1000) {
   score -= price10;
   amount10 += 1
   document.getElementById('score').innerHTML = score;
   document.getElementById('amount10').innerHTML = amount10;
   //Sender den oppdaterte scoren og amount10 til php scriptet
   var xhr = new XMLHttpRequest();
   xhr.open("POST", location.href, true);
   xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   xhr.onreadystatechange = function() {
     if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
       console.log("You got another upgrade", amount10);
     }
   } 
   xhr.send("score=" + score + "&amount10=" + amount10);
  }
 }

 function Upgrade100() {
  if (score >= 10000) {
   score -= price100;
   amount100 += 1
   document.getElementById('score').innerHTML = score;
   document.getElementById('amount100').innerHTML = amount100;
   //Sender den oppdaterte scoren og amount100 til php scriptet
   var xhr = new XMLHttpRequest();
   xhr.open("POST", location.href, true);
   xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   xhr.onreadystatechange = function() {
     if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
       console.log("You got another upgrade", amount100);
     }
   } 
   xhr.send("score=" + score + "&amount100=" + amount100);
  }
 }

 function Upgrade1000() {
  if (score >= 100000) {
   score -= price1000;
   amount1000 += 1
   document.getElementById('score').innerHTML = score;
   document.getElementById('amount1000').innerHTML = amount1000;
   //Sender den oppdaterte scoren og amount100 til php scriptet
   var xhr = new XMLHttpRequest();
   xhr.open("POST", location.href, true);
   xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
   xhr.onreadystatechange = function() {
     if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
       console.log("You got another upgrade", amount1000);
     }
   } 
   xhr.send("score=" + score + "&amount1000=" + amount1000);
  }
 }

