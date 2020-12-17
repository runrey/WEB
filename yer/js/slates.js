// When the user scrolls down 170px from the top of the document, slide down the navbar
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 170 || document.documentElement.scrollTop > 170) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-130px";
  }
}

//Shows proper image on pages 6.php, 7.php, 8.php
document.getElementById("r1").onclick = function() { 
  document.getElementById("img1").style.display = "block"; 
  document.getElementById("img2").style.display = "none"; 
  document.getElementById("img3").style.display = "none"; 
  document.getElementById("img4").style.display = "none"; 
  document.getElementById("img5").style.display = "none"; 
  document.getElementById("img6").style.display = "none"; 
}
document.getElementById("r2").onclick = function() { 
  document.getElementById("img1").style.display = "none"; 
  document.getElementById("img2").style.display = "block"; 
  document.getElementById("img3").style.display = "none"; 
  document.getElementById("img4").style.display = "none"; 
  document.getElementById("img5").style.display = "none"; 
  document.getElementById("img6").style.display = "none"; 
}
document.getElementById("r3").onclick = function() { 
 	document.getElementById("img1").style.display = "none"; 
  document.getElementById("img2").style.display = "none";
	document.getElementById("img3").style.display = "block";
  document.getElementById("img4").style.display = "none"; 
  document.getElementById("img5").style.display = "none"; 
  document.getElementById("img6").style.display = "none"; 
}
document.getElementById("r4").onclick = function() { 
  document.getElementById("img1").style.display = "none"; 
  document.getElementById("img2").style.display = "none";
	document.getElementById("img3").style.display = "none";
  document.getElementById("img4").style.display = "block"; 
  document.getElementById("img5").style.display = "none"; 
  document.getElementById("img6").style.display = "none"; 
}
document.getElementById("r5").onclick = function() { 
  document.getElementById("img1").style.display = "none"; 
  document.getElementById("img2").style.display = "none";
	document.getElementById("img3").style.display = "none";
  document.getElementById("img4").style.display = "none"; 
  document.getElementById("img5").style.display = "block"; 
  document.getElementById("img6").style.display = "none"; 
}
document.getElementById("r6").onclick = function() { 
  document.getElementById("img1").style.display = "none"; 
  document.getElementById("img2").style.display = "none";
	document.getElementById("img3").style.display = "none";
  document.getElementById("img4").style.display = "none"; 
  document.getElementById("img5").style.display = "none"; 
  document.getElementById("img6").style.display = "block"; 
}

//Calculates the price of product on pages 6.php, 7.php, 8.php
document.querySelector("#buy").onclick = function() {
	let tprice = 0;
 	var n = document.querySelector("#inp").value;
  const price = document.getElementById("price").value;
 	var percentageD = 1.0
 	var percentageC = 1.0
 	var delivery = document.querySelector("#chk");
 	var color = document.getElementById("sel");
 	var selVal = color.options[color.selectedIndex].value;
 	if(delivery.checked){
 		percentageD = 1.2;
 	}
 	if(selVal!="Classic"){
 		percentageC = 1.2;
 	}
 	tprice = percentageC*percentageD*price*n;
 	document.querySelector("#pr").innerHTML = "Total price: " + tprice + " &#8376;";
}

//This code shows current day of week
var text;
switch (new Date().getDay()) {
	case 1:
    text = "Today is Monday";
	  break;
	case 2:
	  text = "Today is Tuesday";
	  break;
	case 3:
	  text = "Today is Wednesday";
	  break;
	case 4:
	  text = "Today is Thursday";
	  break;
	case 5:
	  text = "Today is Friday";
	  break;
	case 6:
	  text = "Today is Saturday";
	  break;
	case 0:
	  text = "Today is Sunday";
	  break;
	default:
	  text = "Looking forward to the Weekend";
	}
document.getElementById("day").innerHTML = text;