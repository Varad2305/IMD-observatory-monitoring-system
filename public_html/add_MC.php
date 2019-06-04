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
<body>
	<div class="container">  
  <form id="contact" action="" method="post">
    <h3>Add a Meteorological Center</h3>
    <fieldset>
      <input placeholder="City" type="text" tabindex="1" required autofocus>
    </fieldset>
    <fieldset>
      <input placeholder="State" type="text" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input placeholder="Password" type="password" tabindex="3" required>
    </fieldset>
    <fieldset>
      <input placeholder="Web Site" type="url" tabindex="4">
    </fieldset>
    <fieldset>
      <button name="submit" type="submit" id="contact-submit" data-submit="...Sending">Submit</button>
    </fieldset>
  </form>
</div>
</body>
</html>