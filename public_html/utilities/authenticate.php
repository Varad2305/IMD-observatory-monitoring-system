<?php
	function authenticate($username,$pwd){
		require_once('db_connection.php');
		$query = "SELECT username,password,salt,status from users where username = '$username';";
		if($result = getResult($query)){
			if(mysqli_num_rows($result) == 1){
				$row = mysqli_fetch_array($result);
				$salt = $row['salt'];
				$hashed_pwd = hash('sha512', $pwd + $salt);
				if($row["password"] == $hashed_pwd){
					//correct password
					session_start();
					echo "<script> alert('Setting variables') </script>";	
					$_SESSION["username"] = $username;
					$_SESSION["status"] = $row["status"];
					if($row['status'] == 0){
						header("Location: admin.php");
					}
					if($row['status'] == 1){
						header("Location: station.php");
					}
					exit();
				}
				else{
					//wrong password
					header("Location: index.php?error=incorrect");
					exit();
				}
			}
			else{
				//user not registered
				header("Location: index.php?error=notexists");
				exit();
			}
		}
		else{
			header("Location: index.php?error=yes");
			exit();
		}
	}
?>