<?php
	function authenticate($username,$pwd){
		require_once('db_connection.php');
		$query = 'SELECT username,password,salt from '
	}