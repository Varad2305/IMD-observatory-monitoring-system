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
	$username = trim($_GET["username"],"'");
?>
<!DOCTYPE html>
<html>
<head>
	<title>Confirmation</title>
</head>
<body>
	<?php
		echo $obs;
		require_once('./utilities/db_connection.php');
		$query = "DELETE FROM users WHERE username = '$username';";
		$res = getResult($query);
		if($res != FALSE){
		header("Location:delete_user.php");
		}
		else{
			echo "<script> alert('Error'); </script>";
		}
	?>
</body>