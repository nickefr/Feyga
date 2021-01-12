
<html>





<head>

<?php



session_start();
include("dbc/dbconnect.php");
if($_SERVER['REQUEST_METHOD'] == "POST"){






$user_name = $_POST['user_name'];
  $password = $_POST['password'];


  $sql = "SELECT * FROM users WHERE user_name='$user_name' AND password='$password'";
   
  
  $result = mysqli_query($mysqli, $sql);

  if ($row = mysqli_fetch_assoc($result)) {
    echo "You are logged in!";

  } else {
    echo "Your username or password is incorrect!";
  }
}
?>
















    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
       <!-- Bootstrap core CSS -->
    <link href="bootstrap/bootstrap.min.css" rel="stylesheet">
    <link href="css/mychess.css" rel="stylesheet">
<script src="bootstrap/jquery-3.2.1.min.js"></script>
    <script src="bootstrap/bootstrap.min.js"></script>
	<script src="js/mychess.js"></script>
	 <script src="jquery-ui-1.12.1/jquery-ui.min.js"></script>
	 
	<link href="jquery-ui-1.12.1/jquery-ui.min.css" rel="stylesheet">
	

    <title>ΑΔΙΣΕ: Tavli</title>
		<meta name="description" content="Project- Game -Feyga">
		<link rel="shortcut icon" href="favicon.ico"/>
	<link rel="stylesheet" href="demo/styles.css">
	<link rel="stylesheet" href="photobox/photobox.css">
	
	<script src="//ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src='photobox/jquery.photobox.js'></script>

 
  </head>
<meta charset="utf-8">
<link rel="stylesheet" href="style.css">







<style>

body {
  font-family: Arial;
  color: white;
}

.split {
  height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 20px;
}

.left {
  left: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: #111;
}

.clock {
  width: 350px;
  height: 350px;
  display: flex;
  justify-content: center;
  align-items: center;
  background: url(clock.png);
  background-size: cover;
  border: 4px solid #091921;
  border-radius: 50% box-shadow: 0 -15px 15px rgba(255, 255, 255, 0.05), insert 0 -15px 15px rgba(255, 255, 255, 0.05), 0 15px 15px rgba(0, 0, 0, 0.3), insert 0 15px 15px rgba(0, 0, 0, 0.3);
}

div#D6 {
  height: 10%;
  position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;
  background-color: black;
  color: white;
  text-align: center;
}

.right {
  right: 0;
  background-color: red;
}

.centered {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

.centered img {
  width: 150px;
  border-radius: 50%;
}

.progressBar {
  width: 90%;
  height: 30px;
  background-color: #fff000;
}

.progressBar div {
  height: 10%;
  text-align: right;
  padding: 0 10px;
  line-height: 16px;
  /* same as #progressBar height if we want text middle aligned */
  width: 90%;
  background-color: #CBEA00;
  box-sizing: border-box;
}

.container {
  width: 100px
}

</style>
</head>

<body>

<div class="split left">
  <div class="centered">
    <div id="center_button" class='btn btn-primary'>
     <div id="center_button"   class='btn btn-primary' 	>
	<form action="indexb.php">
            <input type="text" name="user_name" placeholder="Username"><br>
            <input type="password" name="password" placeholder="Password"><br>
	   <button  type="submit">LOG IN -Player : Black</button>
      <br>
      <br>
      <div class="container">
        <div class="progressBar">
        </div>
      </div>
    </div>
  </div>
</div>
<div class="split right">
  <div class="centered">
    <div id="center_button"   class='btn btn-primary' 	>
	<form action="indexr.php">
            <input type="text" name="user_name" placeholder="Username"><br>
            <input type="password" name="password" placeholder="Password"><br>
	   <button  type="submit">LOG IN -Player : Red</button>
      <br>
      <br>
      <div class="container">
        <div class="progressBar">
        </div>
      </div>
    </div>
  </div>
</div>

	
	
<script>

var elem = document.getElementsByClassName("progressBar");
var time = document.getElementsByClassName("container");
var width = 1;
setInterval(frame, 1000);

function frame() {
  if (width >= 100) {
    window.location.replace("gameover.html");
  } else {
    width++;
    for (var i = 0; i < elem.length; i++) {
      elem[i].style.width = width + "%";
      elem[i].innerHTML = width + "%";
    }
  }
}
</script>

     
</body>
</html> 