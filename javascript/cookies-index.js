function addToScore() {
  score += 1;
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

function UpgradeOne(amountRemove) {
 if (score >= 100) {
  score -= amountRemove;
  document.getElementById('score').innerHTML = score;
  //Sender den opptattert scoren til php scriptet
  var xhr = new XMLHttpRequest();
  xhr.open("POST", location.href, true);
  xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  xhr.onreadystatechange = function() {
    if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
      console.log("You got another upgrade");
    }
  } 
  xhr.send("score=" + score);
 }
}
