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
	<br>
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
	<table class="table table-dark" id="myTable">
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
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			<tr>
					<td>Wind Wane</td>
					<td><input type="radio" name="1" value=1></td>
					<td><input type="radio" name="1" value=0></td>
					<td><input type="radio" name="1" value=-1></td>
					<td><input type="text" name="Wind_Wane"></td>
			</tr>
			<tr>
					<td>Cup Counter Anemometer</td>
					<td><input type="radio" name="2" value=1></td>
					<td><input type="radio" name="2" value=0></td>
					<td><input type="radio" name="2" value=-1></td>
					<td><input type="text" name="Cup_Counter_Anemometer"></td>
			</tr>
			<tr>
					<td>Max Thermometer</td>
					<td><input type="radio" name="3" value=1></td>
					<td><input type="radio" name="3" value=0></td>
					<td><input type="radio" name="3" value=-1></td>
					<td><input type="text" name="Max_Thermometer"></td>
			</tr>
			<tr>
					<td>Min Thermometer</td>
					<td><input type="radio" name="4" value=1></td>
					<td><input type="radio" name="4" value=0></td>
					<td><input type="radio" name="4" value=-1></td>
					<td><input type="text" name="Min_Thermometer"></td>
			</tr>
			<tr>
					<td>Dry Bulb Thermometer</td>
					<td><input type="radio" name="5" value=1></td>
					<td><input type="radio" name="5" value=0></td>
					<td><input type="radio" name="5" value=-1></td>
					<td><input type="text" name="Dry_Bulb_Thermometer"></td>
			</tr>
			<tr>
					<td>Wet Bulb Thermometer</td>
					<td><input type="radio" name="6" value=1></td>
					<td><input type="radio" name="6" value=0></td>
					<td><input type="radio" name="6" value=-1></td>
					<td><input type="text" name="Wet_Bulb_Thermometer"></td>
			</tr>
			<tr>
					<td>Stevenson Screen (single)</td>
					<td><input type="radio" name="7" value=1></td>
					<td><input type="radio" name="7" value=0></td>
					<td><input type="radio" name="7" value=-1></td>
					<td><input type="text" name="Stevenson_Screen_(Single)"></td>
			</tr>
			<tr>
					<td>Stevenson Screen (double)</td>
					<td><input type="radio" name="8" value=1></td>
					<td><input type="radio" name="8" value=0></td>
					<td><input type="radio" name="8" value=-1></td>
					<td><input type="text" name="Stevenson_Screen_(Double)"></td>
			</tr>
			<tr>
					<td>Thermograph</td>
					<td><input type="radio" name="9" value=1></td>
					<td><input type="radio" name="9" value=0></td>
					<td><input type="radio" name="9" value=-1></td>
					<td><input type="text" name="Thermograph"></td>
			</tr>
			<tr>
					<td>Barograph</td>
					<td><input type="radio" name="10" value=1></td>
					<td><input type="radio" name="10" value=0></td>
					<td><input type="radio" name="10" value=-1></td>
					<td><input type="text" name="Barograph"></td>
			</tr>
			<tr>
					<td>Hydrograph</td>
					<td><input type="radio" name="11" value=1></td>
					<td><input type="radio" name="11" value=0></td>
					<td><input type="radio" name="11" value=-1></td>
					<td><input type="text" name="Hydrograph"></td>
			</tr>
			<tr>
					<td>Ordinary Rain Gauge</td>
					<td><input type="radio" name="12" value=1></td>
					<td><input type="radio" name="12" value=0></td>
					<td><input type="radio" name="12" value=-1></td>
					<td><input type="text" name="Ordinary_Rain_Gauge"></td>
			</tr>
			<tr>
					<td>Self Recording Rain Gauge</td>
					<td><input type="radio" name="13" value=1></td>
					<td><input type="radio" name="13" value=0></td>
					<td><input type="radio" name="13" value=-1></td>
					<td><input type="text" name="Self_Recording_Rain_Gauge"></td>
			</tr>
			<tr>
					<td>Evaporimeter</td>
					<td><input type="radio" name="14" value=1></td>
					<td><input type="radio" name="14" value=0></td>
					<td><input type="radio" name="14" value=-1></td>
					<td><input type="text" name="Evaporimeter"></td>
			</tr>
			<tr>
					<td>Mercury Barometer</td>
					<td><input type="radio" name="15" value=1></td>
					<td><input type="radio" name="15" value=0></td>
					<td><input type="radio" name="15" value=-1></td>
					<td><input type="text" name="Mercury_Barometer"></td>
			</tr>
			<tr>
					<td>High Wind Speed Recorder</td>
					<td><input type="radio" name="16" value=1></td>
					<td><input type="radio" name="16" value=0></td>
					<td><input type="radio" name="16" value=-1></td>
					<td><input type="text" name="High_Wind_Speed_Recorder"></td>
			</tr>
			<tr>
				<td><a class="btn btn-primary" href="station.php" role="button">Go Back</a></td>
				<td></td>
				<td></td>
				<td><button class="btn btn-primary" type="button" onclick="add_instr()">Add Instrument</button></td>
				<td><input type="submit" class="btn btn-primary" name="submit" value="Submit"></td>
			</tr>
			</form>
			<?php
			if($_SERVER["REQUEST_METHOD"] == 'POST'){
				include('./utilities/db_connection.php');
				$flag1 = 1;
				function inject($instrument_name,$instrument_number){
					$instrument = $instrument_name;
					$working = $_POST[$instrument_number];
					$remark = $_POST[$instrument_name];
					
					$query = "INSERT INTO report(date_recorded,observatory,instrument,working,reviewed,remark) VALUES(CURDATE(),'".$_SESSION["username"]."','$instrument','$working',0,'$remark');";
					$res = getResult($query);
					if($res === FALSE){
						$GLOBALS["flag1"] = 0;
					}
				}
				function all_set(){
					$flag = 1;
					for ($i=1; $i<=16; $i++){ 
						$j = strval($i);
						if(!isset($_POST[$j])){
							$flag = 0;
							break;
						}
					}
					return $flag;
				}
				if(all_set()){
					inject("Wind_Wane","1");
					inject("Cup_Counter_Anemometer","2");
					inject("Max_Thermometer","3");
					inject("Min_Thermometer","4");
					inject("Dry_Bulb_Thermometer","5");
					inject("Wet_Bulb_Thermometer","6");
					inject("Stevenson_Screen_(Single)","7");
					inject("Stevenson_Screen_(Double)","8");
					inject("Thermograph","9");
					inject("Barograph","10");
					inject("Hydrograph","11");
					inject("Ordinary_Rain_Gauge","12");
					inject("Self_Recording_Rain_Gauge","13");
					inject("Evaporimeter","14");
					inject("Mercury_Barometer","15");
					inject("High_Wind_Speed_Recorder","16");
					if($flag1 == 0){
						echo "<script type='text/javascript'> alert('You have already filled a report today'); </script>";		
					}
					else{
						echo "<script type='text/javascript'> alert('Success'); </script>";
					}
				}
				else{
					echo "<script type='text/javascript'> alert('Please fill all rows'); </script>";	
				}


				// $query = "INSERT INTO report(date_recorded,observatory,instrument,working,reviewed,remark) values(CURDATE(),'".$_SESSION["username"]."','Wind Wane','".$_POST["1"]."',0,'".$_POST["windwane"]."'),(CURDATE(),'".$_SESSION["username"]."','Cup Counter Anemometer','".$_POST["2"]."',0,'".$_POST["CCA"]."'),(CURDATE(),'".$_SESSION["username"]."','Max Thermometer','".$_POST["3"]."',0,'".$_POST["max_therm"]."'),(CURDATE(),'".$_SESSION["username"]."','Min Thermometer','".$_POST["4"]."',0,'".$_POST["min_therm"]."'),(CURDATE(),'".$_SESSION["username"]."','Dry Bulb Thermometer','".$_POST["5"]."',0,'".$_POST["DBT"]."'),(CURDATE(),'".$_SESSION["username"]."','Wet Bulb Thermometer','".$_POST["6"]."',0,'".$_POST["WBT"]."'),(CURDATE(),'".$_SESSION["username"]."','Stevenson Screen (single)','".$_POST["7"]."',0,'".$_POST["SSS"]."'),(CURDATE(),'".$_SESSION["username"]."','Stevenson Screen (double)','".$_POST["8"]."',0,'".$_POST["SSD"]."'),(CURDATE(),'".$_SESSION["username"]."','Thermograph','".$_POST["9"]."',0,'".$_POST["thermograph"]."'),(CURDATE(),'".$_SESSION["username"]."','Barograph','".$_POST["10"]."',0,'".$_POST["barograph"]."'),(CURDATE(),'".$_SESSION["username"]."','Hydrograph','".$_POST["11"]."',0,'".$_POST["hydrograph"]."'),(CURDATE(),'".$_SESSION["username"]."','Ordinary Rain Gauge','".$_POST["12"]."',0,'".$_POST["ORG"]."'),(CURDATE(),'".$_SESSION["username"]."','Self Recording Rain Gauge','".$_POST["13"]."',0,'".$_POST["SRRG"]."'),(CURDATE(),'".$_SESSION["username"]."','Evaporimeter','".$_POST["14"]."',0,'".$_POST["evaporimeter"]."'),(CURDATE(),'".$_SESSION["username"]."','Mercury Barometer','".$_POST["15"]."',0,'".$_POST["MB"]."'),(CURDATE(),'".$_SESSION["username"]."','High Wind Speed Recorder','".$_POST["16"]."',0,'".$_POST["HWSR"]."');"; 
				// // $query = "INSERT INTO report(date_recorded,observatory,instrument,working,reviewed,remark) VALUES(CURDATE(),'".$_SESSION["username"]."','Wind Wane','".$_POST["1"]."',0,'".$_POST["windwane"]."');";
				// $c = getResult($query);
				// if($c === FALSE){
				// 	echo "<script type='text/javascript'> alert('Error'); </script>";
				// }
				// else{
				// 	echo "<script type='text/javascript'> alert('Success'); </script>";
				// }
			}
			?>
		</tbody>
	</table>
	<script type="text/javascript">
	function add_instr(){
		var table = document.getElementById("myTable");
  		var row = table.insertRow(17);
		var cell1 = row.insertCell(0)
		var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		var cell4 = row.insertCell(3);
		var cell5 = row.insertCell(4);
		cell1.innerHTML = "<input type='text' name='addedt'>";
		cell2.innerHTML = "<input type='radio' name='addedr'>";
		cell3.innerHTML = "<input type='radio' name='addedr'>";
		cell4.innerHTML = "<input type='radio' name='addedr'>";
		cell5.innerHTML = "<input type='text' name='addedremark'>";
	}

</script>
</body>
</html>
