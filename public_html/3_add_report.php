<!-- yooo -->
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
<?php
	$type = trim($_GET["type"],"'");
	$state = trim($_GET["state"],"'");
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
	<br><br>
	<div></div>
	<div class="container">
		<div class="card bg-info text-white">
			<div class="card-body">
				1.Date and time are filled in by the system itself.<br>
				2.Fill all the rows to submit the report successfully.<br>
				3.You can submit only one report a day.<br>
			</div>
		</div>
	</div>
	<br>	

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <center><select class="browser-default custom-select" name="station" style="width:20em"></center>
            	<?php 
            		require_once('./utilities/db_connection.php');
            		$query = "SELECT name from mc where type = '$type' AND state = '$state';";
            		$res = getResult($query);
            		
            	?>
            	<option selected>Station</option>
                <?php while($row1 = mysqli_fetch_array($res)):;?>
                    <option value="<?php echo $row1[0]; ?>"><?php echo $row1[0]; ?></option>
                <?php endwhile;?>
            		
            	</option>

            </select>
            <br><br>
	<table class="table table-dark" id="myTable" style="width:70em">
		<thead>
			<tr>
				<th>INSTRUMENT</th>
				<th>WORKING</th>
				<th>NOT WORKING</th>
				<th>NOT AVAILABLE</th>
				<th>REASON FOR NOT WORKING</th>
			</tr>
		</thead>
		<tbody>
			<tr>
					<td>Wind Sensor</td>
					<td><input type="radio" name="1" value=1></td>
					<td><input type="radio" name="1" value=0></td>
					<td><input type="radio" name="1" value=-1></td>
					<td><input type="text" name="Wind_Sensor" placeholder="Remark.."></td>
			</tr>
			<tr>
					<td>AT Sensor</td>
					<td><input type="radio" name="2" value=1></td>
					<td><input type="radio" name="2" value=0></td>
					<td><input type="radio" name="2" value=-1></td>
					<td><input type="text" name="AT_Sensor" placeholder="Remark.."></td>
			</tr>
			<tr>
					<td>AP Sensor</td>
					<td><input type="radio" name="3" value=1></td>
					<td><input type="radio" name="3" value=0></td>
					<td><input type="radio" name="3" value=-1></td>
					<td><input type="text" name="AP_Sensor" placeholder="Remark.."></td>
			</tr>
			<tr>
					<td>TBRG</td>
					<td><input type="radio" name="4" value=1></td>
					<td><input type="radio" name="4" value=0></td>
					<td><input type="radio" name="4" value=-1></td>
					<td><input type="text" name="TBRG" placeholder="Remark.."></td>
			</tr>
			<tr>
					<td>SM</td>
					<td><input type="radio" name="5" value=1></td>
					<td><input type="radio" name="5" value=0></td>
					<td><input type="radio" name="5" value=-1></td>
					<td><input type="text" name="SM" placeholder="Remark.."></td>
			</tr>
			<tr>
					<td>ST</td>
					<td><input type="radio" name="6" value=1></td>
					<td><input type="radio" name="6" value=0></td>
					<td><input type="radio" name="6" value=-1></td>
					<td><input type="text" name="ST" placeholder="Remark.."></td>
			</tr>
			<tr>
					<td>Global Radiator</td>
					<td><input type="radio" name="7" value=1></td>
					<td><input type="radio" name="7" value=0></td>
					<td><input type="radio" name="7" value=-1></td>
					<td><input type="text" name="Global_Radiator" placeholder="Remark.."></td>
			</tr>
			<tr>
				<td><a class="btn btn-primary" href="station.php" role="button">Go Back</a></td>
				<td></td>
				<td></td>
				<td><input type="submit" class="btn btn-primary" name="submit" value="Submit"></td>
			</tr>
		</tbody>
	</table>
	</form>
			<?php
			if(isset($_POST["submit"]))
				include('./utilities/db_connection.php');
				$flag1 = 1;
				function inject($instrument_name,$instrument_number){
					$instrument = $instrument_name;
					$working = $_POST[$instrument_number];
					$remark = $_POST[$instrument_name];
					$station = $_POST["station"];
					$state = $_POST["state"];
					$district = $_POST["district"];
					$query = "INSERT INTO report(date_recorded,inspector,observatory,instrument,working,reviewed,remark) VALUES(CURDATE(),'".$_SESSION["username"]."','$station','$instrument','$working',0,'$remark');";
					$res = getResult($query);
					if($res === FALSE){
						$GLOBALS["flag1"] = 0;
					}
				}
				function all_set(){
					$flag = 1;
					for ($i=1; $i<=7; $i++){ 
						$j = strval($i);
						if(!isset($_POST[$j])){
							$flag = 0;
							break;
						}
					}

					if(empty($_POST["station"]) || empty($_POST["state"]) || empty($_POST["district"]))
						$flag = 0;
					
					return $flag;
				}

				if(all_set()){
					inject("Wind_Sensor","1");
					inject("AT_Sensor","2");
					inject("AP_Sensor","3");
					inject("TBRG","4");
					inject("SM","5");
					inject("ST","6");
					inject("Global_Radiator","7");

					
					if($flag1 == 0){
						echo "<script type='text/javascript'> alert('You have already filled a report for this station today'); </script>";
					}
					else{
						echo "<script type='text/javascript'> alert('Success'); </script>";
					}
				}
				else{
					echo "<script type='text/javascript'> alert('Please check that you have filled the full form'); </script>";	
				}

			}
			?>
		</tbody>
	</table>
</script>
</body>
</html>
