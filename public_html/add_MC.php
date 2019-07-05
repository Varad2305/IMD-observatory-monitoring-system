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
      <input placeholder="District" type="text" name="district" id="district" tabindex="2" required>
    </fieldset>
    <fieldset>
      <div class="custom-select" style="width:200px;">

      <center><select class="dropdown-menu" name="state" id="state1" tabindex="4"></center>
                <option selected>State</option>
                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Dadra and Nagar Havelli">Dadra and Nagar Havelli</option>
                <option value="Daman and Diu">Daman and Diu</option>
                <option value="New Delhi">New Delhi</option>
                <option value="Goa">Goa</option>
                <option value="Gujrat">Gujrat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Lakshadweep">Lakshadweep</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Odisha">Odisha</option>
                <option value="Puducherry">Puducherry</option>
                <option value="Punjab">Punjab</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Telangana">Telangana</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="West Bengal">West Bengal</option>
            </select>
        </div>
    </fieldset>
    <fieldset>
      <div class="custom-select" style="width:200px;">
        <select name="obs_type" tabindex="4" class="dropdown-menu">
          <option value="AWS">AWS</option>
          <option value="AMO">AMO</option>
          <option value="AMS">AMS</option>
          <option value=MWO>MWO</option>
          <option value="MC">MC</option>
          <option value="RMC">RMC</option>
          <option value="MO">MO</option>
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
    	$query = "INSERT INTO mc(name,district,state,type) VALUES ('".$_POST["name"]."','".$_POST["district"]."','".$_POST["state"]."','".$_POST["obs_type"]."');";
    	$check = getResult($query);
    	//$query2 = "INSERT INTO users(username,password,salt,status) VALUES ('".$_POST["name"]."','".$_POST["password"]."','123',1);";
    	//$check2 = getResult($query2);
    	if($check){
    		header("Location:add_MC_conf.php");
    	}
    }
  ?>
</div>
</body>
</html>