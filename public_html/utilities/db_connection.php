<?php
	function getResult($query){
		//While deploying use this function instead: 
		//$link = mysqli_connect("localhost", "<username>", "<password>", "<dbname>");
		$link = mysqli_connect("localhost", "root", "", "imd");
		if (mysqli_connect_errno()){
  			echo "Failed to connect to MySQL: " . mysqli_connect_error();
  		}
		return mysqli_query($link, $query);
	}
?>