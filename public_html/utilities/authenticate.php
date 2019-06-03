<?php
	function authenticate($username,$pwd){
		echo "Im here\n";
		require_once('db_connection.php');
		$query = "SELECT username,password,salt from users where username = '$username';";
		if($result = getResult($query)){
			if(mysqli_num_rows($result) == 1){
				$row = mysqli_fetch_array($result);
				//$salt = $row['salt'];
				//$hashed_pwd = hash('sha512', $key + $salt);
				if($row['password'] == $pwd){
					//correct password
					session_start();
					$_SESSION['firstname'] = $row['firstname'];
					$_SESSION['username'] = $username;
					header("Location: test.php");
					exit();
				}
				else{
					//wrong password
					header("Location: index.html?error=incorrect");
					exit();
				}
			}
			else{
				//user not registered
				header("Location: index.html?error=notexists");
				exit();
			}
		}
		else{
			header("Location: index.html?error=yes");
			exit();
		}
	}
?>