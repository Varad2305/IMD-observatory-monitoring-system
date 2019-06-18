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
<?php
	$obs = trim($_GET["obs"],"'");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Confirmation</title>
</head>
<body>
	<?php
		echo $obs;
		include('./utilities/db_connection.php');
		$query = "DELETE FROM users WHERE username = '$obs';";
		$res = getResult($query);
		if($res != FALSE){
		header("Location:delete_MC.php");
		}
		else{
			echo "<script> alert('Error'); </script>";
		}
	?>
</body>