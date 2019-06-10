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
	<title>Add Report</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</head>
<body>
	<?php
// define variables and set to empty values
	$gender = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["gender"])) {
    $genderErr = "Gender is required";
  } else {
    $gender = test_input($_POST["gender"]);
  }
}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}
?>

<div class="table-responsive">
	<table class="table">
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
					<td><input type="radio" name="1" value=2></td>
					<td><input type="radio" name="1" value=-1></td>
			</tr>
			<tr>
					<td>Cup Counter Anemometer</td>
					<td><input type="radio" name="2" value=1></td>
					<td><input type="radio" name="2" value=2></td>
					<td><input type="radio" name="2" value=-1></td>
			</tr>
			<tr>
					<td>Max Thermometer</td>
					<td><input type="radio" name="3" value=1></td>
					<td><input type="radio" name="3" value=2></td>
					<td><input type="radio" name="3" value=-1></td>
			</tr>
			<tr>
					<td>Min Thermometer</td>
					<td><input type="radio" name="4" value=1></td>
					<td><input type="radio" name="4" value=2></td>
					<td><input type="radio" name="4" value=-1></td>
			</tr>
			<tr>
					<td>Dry Bulb Thermometer</td>
					<td><input type="radio" name="5" value=1></td>
					<td><input type="radio" name="5" value=2></td>
					<td><input type="radio" name="5" value=-1></td>
			</tr>
			<tr>
					<td>Wet Bulb Thermometer</td>
					<td><input type="radio" name="6" value=1></td>
					<td><input type="radio" name="6" value=2></td>
					<td><input type="radio" name="6" value=-1></td>
			</tr>
			<tr>
					<td>Stevenson Screen (single)</td>
					<td><input type="radio" name="7" value=1></td>
					<td><input type="radio" name="7" value=2></td>
					<td><input type="radio" name="7" value=-1></td>
			</tr>
			<tr>
					<td>Stevenson Screen (double)</td>
					<td><input type="radio" name="8" value=1></td>
					<td><input type="radio" name="8" value=2></td>
					<td><input type="radio" name="8" value=-1></td>
			</tr>
			<tr>
					<td>Thermograph</td>
					<td><input type="radio" name="9" value=1></td>
					<td><input type="radio" name="9" value=2></td>
					<td><input type="radio" name="9" value=-1></td>
			</tr>
			<tr>
					<td>Barograph</td>
					<td><input type="radio" name="10" value=1></td>
					<td><input type="radio" name="10" value=2></td>
					<td><input type="radio" name="10" value=-1></td>
			</tr>
			<tr>
					<td>Hydrograph</td>
					<td><input type="radio" name="11" value=1></td>
					<td><input type="radio" name="11" value=2></td>
					<td><input type="radio" name="11" value=-1></td>
			</tr>
			<tr>
					<td>Ordinary Rain Gauge</td>
					<td><input type="radio" name="12" value=1></td>
					<td><input type="radio" name="12" value=2></td>
					<td><input type="radio" name="12" value=-1></td>
			</tr>
			<tr>
					<td>Self Recording Rain Gauge</td>
					<td><input type="radio" name="13" value=1></td>
					<td><input type="radio" name="13" value=2></td>
					<td><input type="radio" name="13" value=-1></td>
			</tr>
			<tr>
					<td>Evaporimeter</td>
					<td><input type="radio" name="14" value=1></td>
					<td><input type="radio" name="14" value=2></td>
					<td><input type="radio" name="14" value=-1></td>
			</tr>
			<tr>
					<td>Mercury Barometer</td>
					<td><input type="radio" name="15" value=1></td>
					<td><input type="radio" name="15" value=2></td>
					<td><input type="radio" name="15" value=-1></td>
			</tr>
			<tr>
					<td>High Wind Speed Recorder</td>
					<td><input type="radio" name="16" value=1></td>
					<td><input type="radio" name="16" value=2></td>
					<td><input type="radio" name="16" value=-1></td>
			</tr>
			<input type="submit" name="submit" value="Submit">
		</tbody>
	</table>


</div>
</body>
</html>
