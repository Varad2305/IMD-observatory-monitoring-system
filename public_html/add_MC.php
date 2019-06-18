<?php
session_start();
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
	<link rel="stylesheet" type="text/css" href="css/add_MC.css">
	<title>Add MC</title>
</head>
<style>
  .dropdown-menu{
    width:350px !important;
    height: 40px !important;
    opacity: 0.5;
    font-family: "Poppins",sans-serif;
    font-weight: 100;
    font-size: 12px;
    line-height: 30px;
  }
</style>
<body>
	<div class="container">  
  <form id="contact" action="" method="post">
    <h3>Add a Meteorological Center</h3>
    <fieldset>
      <input placeholder="Name" type="text" name="name" id="name" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="City" type="text" name="city" id="city" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="District" type="text" name="district" id="district" tabindex="2" required>
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
      <div class="custom-select" style="width:200px;">
        <select name="obs_type" tabindex="4" class="dropdown-menu">
          <option value="MO">Meteorological Observatory</option>
          <option value="AMO">Aerodrome Met Observatory</option>
          <option value="AMS">Aerodrome Met Station</option>
          <option value=MWO>Meteorological Watch Office</option>
          <option value="MC">Meteorological Centre</option>
          <option value="RMC">Regional Meteorological Centre</option>
          <option value="AWS">Automatic Weather Station</option>
        </select>
      </div>
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
    	$query = "INSERT INTO mc(name,district,city,state,type) VALUES ('".$_POST["name"]."','".$_POST["district"]."','".$_POST["city"]."','".$_POST["state"]."','".$_POST["obs_type"]."');"; 
    	$check = getResult($query);
    	$query2 = "INSERT INTO users(username,password,salt,status) VALUES ('".$_POST["name"]."','".$_POST["password"]."','123',1);";
    	$check2 = getResult($query2);
    	if($check2 && $check){
    		header("Location:add_MC_conf.php");
    	}
    }
  ?>
</div>
</body>
</html>