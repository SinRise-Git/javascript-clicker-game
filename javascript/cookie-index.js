let prices = [100, 1000, 10000, 100000];

function addToScore() {
  score += amount1 + (amount10*10) + (amount100*100) + (amount1000*1000)+ 1;
  document.getElementById('score').innerHTML = score;
  setInterval(function() {
    var title = score
    document.title = `Score: ${title}`;
  }, 1);
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

function creatFloatingNumbers(event) {
  //Finner positionen til musen
  const posX = event.clientX;
  const posY = event.clientY;

  //Lager et ny element for tallet
  const numberElem = document.createElement("div");
  numberElem.style.position = "absolute";
  numberElem.style.left = `${posX - 25}px`;
  numberElem.style.top = `${posY - 30}px`;
  numberElem.style.opacity = 1,75;
  numberElem.style.fontSize = "30px"
  document.body.appendChild(numberElem);

  //Setter verdien til tallet
  let value = spc;  
  
  //Sørger for at tallet beveger seg oppover og at opacityen blir mindre
  const interval = setInterval(() => {
    numberElem.textContent =`+${value}` ;
    numberElem.style.opacity -= 0.01;
    numberElem.style.top = `${parseInt(numberElem.style.top) - 2}px`;

    if (numberElem.style.opacity <= 0) {
      clearInterval(interval);
      numberElem.remove();
    }
  }, 10);
}

setInterval(function() {
  //Ender lys styrken om score er mindre en 100
  if (score < 100) {
    const button = document.getElementById("upgrade1");
    button.style.opacity = "0.5";
  } else {
    const button = document.getElementById("upgrade1");
    button.style.opacity = "1";
  }
  //Ender lys styrken om score er mindre en 1000
  if (score < 1000) {
    const button = document.getElementById("upgrade10");
    button.style.opacity = "0.5";
  } else {
    const button = document.getElementById("upgrade10");
    button.style.opacity = "1";
  }
  //Ender lys styrken om score er mindre en 10000
  if (score < 10000) {
    const button = document.getElementById("upgrade100");
    button.style.opacity = "0.5";
  } else {
    const button = document.getElementById("upgrade100");
    button.style.opacity = "1";
  }
  //Ender lys styrken om score er mindre en 100000
  if (score < 100000) {
    const button = document.getElementById("upgrade1000");
    button.style.opacity = "0.5";
  } else {
    const button = document.getElementById("upgrade1000");
    button.style.opacity = "1";
  }
}, 10);


function Upgrade1() {
  if (score >= 100) {
    score -= prices[0];
    amount1 += 1;
    document.getElementById('score').innerHTML = score;
    document.getElementById('amount1').innerHTML = amount1;
    //Sender den oppdaterte scoren og amount10 til php scriptet
    var xhr = new XMLHttpRequest();
    xhr.open("POST", location.href, true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
      if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
        console.log("You got another upgrade", amount1);
      }
    };
    xhr.send("score=" + score + "&amount1=" + amount1);
  }
}
 
function Upgrade10() {
  if (score >= 1000) {
   score -= prices[1];
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
   score -= prices[2];
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
   score -= prices[3];
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

