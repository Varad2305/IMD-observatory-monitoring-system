<?php
	require_once('./utilities/db_connection.php');
	$query = "SELECT * FROM users;";
	$result = getResult($query);
	while($row1 = mysqli_fetch_array($result)){
		$hashed_pwd = hash('sha512',$row1['password'] + $row1['salt']);
		$username = $row1['username'];
		$query2 = "UPDATE users SET password = '$hashed_pwd' WHERE username = '$username';";
		$check = getResult($query2);
		if($check != FAILURE)
			echo "Done";
	}
?>