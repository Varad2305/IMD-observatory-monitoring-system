<?php
	function getResult($query){
		//$config = parse_ini_file('../../private/db/config.ini');
		//$link = mysqli_connect($config['servername'], $config['username'], $config['password'], $config['dbname']);
		$link = mysqli_connect("localhost", "root", "", "imd");
		if (mysqli_connect_errno()){
  			echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		}
		return mysqli_query($link, $query);
	}
?>