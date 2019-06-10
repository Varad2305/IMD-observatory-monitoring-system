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
			<tr>
				<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
					<td>Wind Wane</td>
					<td><input type="radio" name="gender" value=1></td>
					<td><input type="radio" name="gender" value=2></td>
					<td><input type="radio" name="gender" value=-1></td>
					<br><br>
					<input type="submit" name="submit" value="Submit">
				</form>
				<?php
					include('./utilities/db_connection.php');
					$query = "INSERT INTO report(date_recorded,observatory,instrument,working) values(CURDATE(),'".$_SESSION["username"]."','Wind Wane','$gender');";
					$c=getResult($query);
				?>
			</tr>

		</tbody>

	</table>


</div>
</body>
</html>
