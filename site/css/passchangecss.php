<?php 
header('Content-Type: text/css');
$sendD = "none";
$codeD = "none";
$passD = "none";
$version = $_GET['ver'];
switch ($version) {
	case '2.0.1':
		$sendD = "none";
		$codeD = "flex";
		$passD = "none";
		break;

	case '2.0.2':
		$sendD = "none";
		$codeD = "none";
		$passD = "flex";
		break;
	default:
		$sendD = "flex";
		$codeD = "none";
		$passD = "none";
		break;
}
?>
@import url('https://fonts.googleapis.com/css?family=Galada&display=swap');
@import url('https://fonts.googleapis.com/css?family=Orbitron:400,500,600,700,800,900&display=swap');
@import url('https://fonts.googleapis.com/css?family=Tomorrow:400,400i&display=swap');
@import url('https://fonts.googleapis.com/css?family=Roboto+Slab&display=swap');
@import url('https://fonts.googleapis.com/css?family=Lobster&display=swap');
@import url('https://fonts.googleapis.com/css?family=Russo+One&display=swap');
*{
	padding: 0; 
	margin: 0;
	box-sizing: border-box;
	/*font-family: 'Orbitron', sans-serif; Latin
	font-family: 'Galada', cursive;
	font-family: 'Tomorrow', sans-serif;

	font-family: 'Roboto Slab', serif;  Cyrillic
	font-family: 'Russo One', sans-serif;
	font-family: 'Lobster', cursive;
	*/	
}
a{
	text-decoration: none;
}
h1{font-size:2.5rem}
h2{font-size:2rem}
h3{font-size:1.75rem}
h4{font-size:1.5rem}
h5{font-size:1.25rem}
h6{font-size:1rem}

body{
	background-image: url('../img/bg1.jpg');
	background-attachment: fixed;
	background-position: center;
	background-repeat: no-repeat;
	background-size: cover;
}
header{
	width: 100%;
	height: 8vh;
	position: fixed;
	top: 0;
	z-index: 999999;
}
.header-normal{
	width: 100%;
	min-height: 80px;
	display: flex;
	flex-direction: row;
	justify-content: space-between;
	align-items: center;
	position: fixed;
	background-color: #fff;
	box-shadow: 0 0 5px #000000;
}
.header-normal-logo{
	font-family: 'Galada', cursive;
	font-size: 3rem;
	font-weight: 700;
	display: flex;
	justify-content: center;
	transition: all 0.5s ease;
	margin-left: 5%;
}
.header-normal-logo a{
	color: #767676;
	transition: all 0.5s ease;
}
.content{
	width: 1200px;
	height: auto;
	padding: 25px;
	background-color: #fff; 
	display: flex;
	flex-direction: column;
	justify-content: flex-start;
	align-items: ;	
	box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2), 0 12px 40px 0 rgba(0, 0, 0, 0.19);
	margin-left: auto;
	margin-right: auto;
	margin-top: 200px;
	margin-bottom: auto;
}
h1{
	padding: 5px; 
	border-bottom: 10px solid #000; 
	font-weight: 800; 
	width: auto;
	margin-bottom: 60px;
}
.link{
	width: auto;
	cursor: pointer;
	color: #4981D7;
}
.link:hover{
	border-bottom: 0.1px solid #4981D7;
}
.push{
	height: 100px;
}
@media only screen and (max-width: 1200px) {
	.content{
		width: 90%;
	}
}
p{
	font-family: 'Roboto Slab', serif;
	font-size: 1rem;
	color: #000;
	margin-top: 25px;
}

form{
	display: flex;
	flex-direction: column;
}
label{
	font-family: 'Roboto Slab', serif;
	font-size: 1.3rem;
	margin-top: 20px;
}
input[type="email"], input[type="password"], input[type="text"], input[type="tel"], input[type="number"]{
	background-color: #ddd;
	width: auto;
	height: 40px;
	padding: 8px 16px;
	font-family: 'Roboto Slab', serif;
	font-size: 1.3rem;
	border:none;
	border-radius: 3px;
	border-bottom: 0.1px solid #000;
	transition: all 0.4s ease;

}
input[type="email"]:hover, input[type="password"]:hover, input[type="text"]:hover, input[type="tel"]:hover, input[type="number"]:hover{
	background-color: #bbb;
	border-bottom: 0.1px solid #000;
}
input[type="email"]:focus, input[type="password"]:focus, input[type="text"]:focus, input[type="tel"]:focus, input[type="number"]:focus{
	width: auto;
	background-color: #bbb;
	outline: none;
	border-bottom: 0.1px solid #000;
	transition: all 0.3s ease;
}
input[type="submit"],input[type="button"]{
	font-family: 'Roboto Slab', serif;
	background-color: rgba(255,215,0, 1);
	font-size: 1rem;
	width: auto;
	padding: 8px 16px;
	height: 40px;
	margin-top: 25px;
	border: none;
	border-radius: 3px;
	cursor: pointer;
	outline: none;
}
input[type="submit"]:hover,input[type="button"]:hover{
	background-color: rgba(255,215,0, 0.6);
}
#send{
	display: <?php echo $sendD; ?>;
} 
#code{
	display: <?php echo $codeD; ?>;
} 
#pass{
	display: <?php echo $passD; ?>;
}