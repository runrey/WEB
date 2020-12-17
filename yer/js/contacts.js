// When the user scrolls down 170px from the top of the document, slide down the navbar
window.onscroll = function() {scrollFunction()};
function scrollFunction() {
  if (document.body.scrollTop > 170 || document.documentElement.scrollTop > 170) {
    document.getElementById("navbar").style.top = "0";
  } else {
    document.getElementById("navbar").style.top = "-130px";
  }
}

//Shows proper image on page contacts.php
document.getElementById("butZ").onclick = function() { 
   document.getElementById("Zaure").style.display = "block"; 
   document.getElementById("butZ").style.display = "none"; 
   document.getElementById("butZ1").style.display = "block"; 
   document.getElementById("clear").style.display = "block";
}
document.getElementById("butZ1").onclick = function() { 
  document.getElementById("Zaure").style.display = "none"; 
  document.getElementById("butZ1").style.display = "none"; 
  document.getElementById("butZ").style.display = "block"; 
  document.getElementById("clear").style.display = "none";
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