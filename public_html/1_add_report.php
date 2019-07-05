<?php
session_start();
ob_start();
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
	<div class="container">
		<div class="card bg-info text-white">
			<div class="card-body">
				1.Date and time are filled in by the system itself.<br>
				2.Fill all the rows to submit the report successfully.<br>
				3.You can submit only one report a day.<br>
				4.Please limit the remark to 5 words<br>
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
					<td>Wind Wane</td>
					<td><input type="radio" name="1" value=1></td>
					<td><input type="radio" name="1" value=0></td>
					<td><input type="radio" name="1" value=-1></td>
					<td><input type="text" name="Wind_Wane" placeholder="Remark.."></td>
			</tr>
			<tr>
					<td>Cup Counter Anemometer</td>
					<td><input type="radio" name="2" value=1></td>
					<td><input type="radio" name="2" value=0></td>
					<td><input type="radio" name="2" value=-1></td>
					<td><input type="text" name="Cup_Counter_Anemometer" placeholder="Remark.."></td>
			</tr>
			<tr>
					<td>Max Thermometer</td>
					<td><input type="radio" name="3" value=1></td>
					<td><input type="radio" name="3" value=0></td>
					<td><input type="radio" name="3" value=-1></td>
					<td><input type="text" name="Max_Thermometer" placeholder="Remark.."></td>
			</tr>
			<tr>
					<td>Min Thermometer</td>
					<td><input type="radio" name="4" value=1></td>
					<td><input type="radio" name="4" value=0></td>
					<td><input type="radio" name="4" value=-1></td>
					<td><input type="text" name="Min_Thermometer" placeholder="Remark.."></td>
			</tr>
			<tr>
					<td>Dry Bulb Thermometer</td>
					<td><input type="radio" name="5" value=1></td>
					<td><input type="radio" name="5" value=0></td>
					<td><input type="radio" name="5" value=-1></td>
					<td><input type="text" name="Dry_Bulb_Thermometer" placeholder="Remark.."></td>
			</tr>
			<tr>
					<td>Wet Bulb Thermometer</td>
					<td><input type="radio" name="6" value=1></td>
					<td><input type="radio" name="6" value=0></td>
					<td><input type="radio" name="6" value=-1></td>
					<td><input type="text" name="Wet_Bulb_Thermometer" placeholder="Remark.."></td>
			</tr>
			<tr>
					<td>Stevenson Screen (single)</td>
					<td><input type="radio" name="7" value=1></td>
					<td><input type="radio" name="7" value=0></td>
					<td><input type="radio" name="7" value=-1></td>
					<td><input type="text" name="Stevenson_Screen_(Single)" placeholder="Remark.."></td>
			</tr>
			<tr>
					<td>Stevenson Screen (double)</td>
					<td><input type="radio" name="8" value=1></td>
					<td><input type="radio" name="8" value=0></td>
					<td><input type="radio" name="8" value=-1></td>
					<td><input type="text" name="Stevenson_Screen_(Double)" placeholder="Remark.."></td>
			</tr>
			<tr>
					<td>Thermograph</td>
					<td><input type="radio" name="9" value=1></td>
					<td><input type="radio" name="9" value=0></td>
					<td><input type="radio" name="9" value=-1></td>
					<td><input type="text" name="Thermograph" placeholder="Remark.."></td>
			</tr>
			<tr>
					<td>Barograph</td>
					<td><input type="radio" name="10" value=1></td>
					<td><input type="radio" name="10" value=0></td>
					<td><input type="radio" name="10" value=-1></td>
					<td><input type="text" name="Barograph" placeholder="Remark.."></td>
			</tr>
			<tr>
					<td>Hydrograph</td>
					<td><input type="radio" name="11" value=1></td>
					<td><input type="radio" name="11" value=0></td>
					<td><input type="radio" name="11" value=-1></td>
					<td><input type="text" name="Hydrograph" placeholder="Remark.."></td>
			</tr>
			<tr>
					<td>Ordinary Rain Gauge</td>
					<td><input type="radio" name="12" value=1></td>
					<td><input type="radio" name="12" value=0></td>
					<td><input type="radio" name="12" value=-1></td>
					<td><input type="text" name="Ordinary_Rain_Gauge" placeholder="Remark.."></td>
			</tr>
			<tr>
					<td>Self Recording Rain Gauge</td>
					<td><input type="radio" name="13" value=1></td>
					<td><input type="radio" name="13" value=0></td>
					<td><input type="radio" name="13" value=-1></td>
					<td><input type="text" name="Self_Recording_Rain_Gaue" placeholder="Remark.."></td>
			</tr>
			<tr>
					<td>Evaporimeter</td>
					<td><input type="radio" name="14" value=1></td>
					<td><input type="radio" name="14" value=0></td>
					<td><input type="radio" name="14" value=-1></td>
					<td><input type="text" name="Evaporimeter" placeholder="Remark.."></td>
			</tr>
			<tr>
					<td>Mercury Barometer</td>
					<td><input type="radio" name="15" value=1></td>
					<td><input type="radio" name="15" value=0></td>
					<td><input type="radio" name="15" value=-1></td>
					<td><input type="text" name="Mercury_Barometer" placeholder="Remark.."></td>
			</tr>
			<tr>
					<td>High Wind Speed Recorder</td>
					<td><input type="radio" name="16" value=1></td>
					<td><input type="radio" name="16" value=0></td>
					<td><input type="radio" name="16" value=-1></td>
					<td><input type="text" name="High_Wind_Speed_Recorder" placeholder="Remark.."></td>
			</tr>
			<tr>
				<td><a class="btn btn-primary" href="add_report.php" role="button">Go Back</a></td>
				<td></td>
				<td></td>
				<td><input type="submit" class="btn btn-primary" name="submit" value="Upload Image"></td>
			</tr>
		</tbody>
	</table>
	</form>
			<?php
			if(isset($_POST["submit"])){
				$_SESSION["observatory"] = $_POST["station"];
				require_once('./utilities/db_connection.php');
				$flag1 = 1;
				function inject($instrument_name,$instrument_number){
					$instrument = $instrument_name;
					$working = $_POST[$instrument_number];
					$remark = $_POST[$instrument_name];
					$station = $_POST["station"];
					
					$query = "INSERT INTO report(date_recorded,inspector,observatory,type,instrument,working,reviewed,remark) VALUES(CURDATE(),'".$_SESSION["username"]."','$station','".$_SESSION["type"]."','$instrument','$working',0,'$remark');";
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

					if(empty($_POST["station"]))
						$flag = 0;
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
						header("Location:add_report.php?errortype=1");
						ob_end_flush();
						exit();
					}
					else{
						echo "<script type='text/javascript'> alert('Success'); </script>";
						header("Location:image_upload.php");
						ob_end_flush();
						exit();
					}
				}
				else{
					echo "<script type='text/javascript'> alert('Please check that you have filled the full form'); </script>";
					header("Location:add_report.php?errortype=2");
					ob_end_flush();
					exit();
				}
			}
			
			?>
		</tbody>
	</table>
</script>
</body>
</html>
