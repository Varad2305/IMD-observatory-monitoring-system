<?php
session_start();
$gender = "";
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
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Add Report</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style type="text/css">
    .bs-example{
    	margin: 20px;
    }
</style>
</head>
<body>


	<table class="table table-dark">
		<thead>
			<tr>
				<th>INSTRUMENT</th>
				<th>WORKING</th>
				<th>NOT WORKING</th>
				<th>NOT AVAILABLE</th>
			</tr>
		</thead>
		<tbody>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<tr>
					<td>Wind Wane</td>
					<td><input type="radio" name="1" value=1></td>
					<td><input type="radio" name="1" value=0></td>
					<td><input type="radio" name="1" value=-1></td>
			</tr>
			<tr>
					<td>Cup Counter Anemometer</td>
					<td><input type="radio" name="2" value=1></td>
					<td><input type="radio" name="2" value=0></td>
					<td><input type="radio" name="2" value=-1></td>
			</tr>
			<tr>
					<td>Max Thermometer</td>
					<td><input type="radio" name="3" value=1></td>
					<td><input type="radio" name="3" value=0></td>
					<td><input type="radio" name="3" value=-1></td>
			</tr>
			<tr>
					<td>Min Thermometer</td>
					<td><input type="radio" name="4" value=1></td>
					<td><input type="radio" name="4" value=0></td>
					<td><input type="radio" name="4" value=-1></td>
			</tr>
			<tr>
					<td>Dry Bulb Thermometer</td>
					<td><input type="radio" name="5" value=1></td>
					<td><input type="radio" name="5" value=0></td>
					<td><input type="radio" name="5" value=-1></td>
			</tr>
			<tr>
					<td>Wet Bulb Thermometer</td>
					<td><input type="radio" name="6" value=1></td>
					<td><input type="radio" name="6" value=0></td>
					<td><input type="radio" name="6" value=-1></td>
			</tr>
			<tr>
					<td>Stevenson Screen (single)</td>
					<td><input type="radio" name="7" value=1></td>
					<td><input type="radio" name="7" value=0></td>
					<td><input type="radio" name="7" value=-1></td>
			</tr>
			<tr>
					<td>Stevenson Screen (double)</td>
					<td><input type="radio" name="8" value=1></td>
					<td><input type="radio" name="8" value=0></td>
					<td><input type="radio" name="8" value=-1></td>
			</tr>
			<tr>
					<td>Thermograph</td>
					<td><input type="radio" name="9" value=1></td>
					<td><input type="radio" name="9" value=0></td>
					<td><input type="radio" name="9" value=-1></td>
			</tr>
			<tr>
					<td>Barograph</td>
					<td><input type="radio" name="10" value=1></td>
					<td><input type="radio" name="10" value=0></td>
					<td><input type="radio" name="10" value=-1></td>
			</tr>
			<tr>
					<td>Hydrograph</td>
					<td><input type="radio" name="11" value=1></td>
					<td><input type="radio" name="11" value=0></td>
					<td><input type="radio" name="11" value=-1></td>
			</tr>
			<tr>
					<td>Ordinary Rain Gauge</td>
					<td><input type="radio" name="12" value=1></td>
					<td><input type="radio" name="12" value=0></td>
					<td><input type="radio" name="12" value=-1></td>
			</tr>
			<tr>
					<td>Self Recording Rain Gauge</td>
					<td><input type="radio" name="13" value=1></td>
					<td><input type="radio" name="13" value=0></td>
					<td><input type="radio" name="13" value=-1></td>
			</tr>
			<tr>
					<td>Evaporimeter</td>
					<td><input type="radio" name="14" value=1></td>
					<td><input type="radio" name="14" value=0></td>
					<td><input type="radio" name="14" value=-1></td>
			</tr>
			<tr>
					<td>Mercury Barometer</td>
					<td><input type="radio" name="15" value=1></td>
					<td><input type="radio" name="15" value=0></td>
					<td><input type="radio" name="15" value=-1></td>
			</tr>
			<tr>
					<td>High Wind Speed Recorder</td>
					<td><input type="radio" name="16" value=1></td>
					<td><input type="radio" name="16" value=0></td>
					<td><input type="radio" name="16" value=-1></td>
			</tr>
			<tr><td><input type="submit" class="btn btn-primary" name="submit" value="Submit"></td></tr>
			<?php
				include('./utilities/db_connection.php');
				$query = "INSERT INTO report(date_recorded,observatory,instrument,working) values(CURDATE(),'".$_SESSION["username"]."','Wind Wane','".$_POST["1"]."'),(CURDATE(),'".$_SESSION["username"]."','Cup Counter Anemometer','".$_POST["2"]."'),(CURDATE(),'".$_SESSION["username"]."','Max Thermometer','".$_POST["3"]."'),(CURDATE(),'".$_SESSION["username"]."','Min Thermometer','".$_POST["4"]."'),(CURDATE(),'".$_SESSION["username"]."','Dry Bulb Thermometer','".$_POST["5"]."'),(CURDATE(),'".$_SESSION["username"]."','Wet Bulb Thermometer','".$_POST["6"]."'),(CURDATE(),'".$_SESSION["username"]."','Stevenson Screen (single)','".$_POST["7"]."'),(CURDATE(),'".$_SESSION["username"]."','Stevenson Screen (double)','".$_POST["8"]."'),(CURDATE(),'".$_SESSION["username"]."','Thermograph','".$_POST["9"]."'),(CURDATE(),'".$_SESSION["username"]."','Barograph','".$_POST["10"]."'),(CURDATE(),'".$_SESSION["username"]."','Hydrograph','".$_POST["11"]."'),(CURDATE(),'".$_SESSION["username"]."','Ordinary Rain Gauge','".$_POST["12"]."'),(CURDATE(),'".$_SESSION["username"]."','Self Recording Rain Gauge','".$_POST["13"]."'),(CURDATE(),'".$_SESSION["username"]."','Evaporimeter','".$_POST["14"]."'),(CURDATE(),'".$_SESSION["username"]."','Mercury Barometer','".$_POST["15"]."'),(CURDATE(),'".$_SESSION["username"]."','High Wind Speed Recorder','".$_POST["16"]."');";
				$c = getResult($query);
				header("Location:station.php");
			?>
		</tbody>
	</table>



</body>
</html>