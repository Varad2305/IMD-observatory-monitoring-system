<?php
session_start();
$gender = "";
$set = isset($_SESSION["username"]) && isset($_SESSION["status"]);
if(!$set){
	unset($_SESSION["username"]);
	unset($_SESSION["status"]);
	header("Location: index.html?error=timed_out");
	session_destroy();
	exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Add Instrument</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style type="text/css">
    .bs-example{
    	margin: 20px;
    }
</style>
</head>
<body>
	<div class="container">  
  <form id="contact" action="" method="post">
    <h3>Add an instrument</h3>
    <fieldset>
      <input placeholder="City" type="text" name="city" id="city" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="State" type="text" name="state" id="state" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Password" type="password" name="password" id="password"tabindex="3" required>
    </fieldset>
    <fieldset>
      <input placeholder="Web Site" type="url" name="website" id="website" tabindex="4">
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
  <?php
  	if($_SERVER["REQUEST_METHOD"] == "POST"){
  		require_once('./utilities/db_connection.php');
    	$city = $_POST['city'];
    	$state = $_POST['state'];
    	$pwd = $_POST['password'];
    	$website = $_POST['website'];
    	$query = "INSERT INTO mc(name,state) VALUES ('".$_POST["city"]."','".$_POST["state"]."');"; 
    	$check = getResult($query);
    	$query2 = "INSERT INTO users(username,password,salt,status) VALUES ('".$_POST["city"]."','".$_POST["password"]."','123',1);";
    	$check2 = getResult($query2);
    	if($check2 && $check){
    		header("Location:add_MC_conf.php");
    	}
    }
  ?>
</div>
</body>
</html>