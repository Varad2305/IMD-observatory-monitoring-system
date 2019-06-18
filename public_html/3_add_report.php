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
	$obs = trim($_GET["obs"],"'");
	echo $obs;
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
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <center><select class="browser-default custom-select" name="obs_type" style="width:6em;"></center>
                <option selected>Type</option>
                <option value="RMC">RMC</option>
                <option value="MC">MC</option>
                <option value="MO">MO</option>
                <option value="WMO">MWO</option>
                <option value="AMO">AMO</option>
                <option value="AMS">AMS</option>
                <option value="AWS">AWS</option>
            </select>
            <br><br>
            <center><select class="browser-default custom-select" name="state" style="width:20em;"></center>
                <option selected>State</option>
                <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                <option value="Andhra Pradesh">Andhra Pradesh</option>
                <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                <option value="Assam">Assam</option>
                <option value="Bihar">Bihar</option>
                <option value="Chandigarh">Chandigarh</option>
                <option value="Chhattisgarh">Chhattisgarh</option>
                <option value="Dadra and Nagar Havelli">Dadra and Nagar Havelli</option>
                <option value="New Delhi">New Delhi</option>
                <option value="Goa">Goa</option>
                <option value="Gujrat">Gujrat</option>
                <option value="Haryana">Haryana</option>
                <option value="Himachal Pradesh">Himachal Pradesh</option>
                <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                <option value="Jharkhand">Jharkhand</option>
                <option value="Karnataka">Karnataka</option>
                <option value="Kerala">Kerala</option>
                <option value="Lakshadweep">Lakshadweep</option>
                <option value="Madhya Pradesh">Madhya Pradesh</option>
                <option value="Maharashtra">Maharashtra</option>
                <option value="Manipur">Manipur</option>
                <option value="Meghalaya">Meghalaya</option>
                <option value="Mizoram">Mizoram</option>
                <option value="Nagaland">Nagaland</option>
                <option value="Odisha">Odisha</option>
                <option value="Puducherry">Puducherry</option>
                <option value="Punjab">Punjab</option>
                <option value="Rajasthan">Rajasthan</option>
                <option value="Sikkim">Sikkim</option>
                <option value="Tamil Nadu">Tamil Nadu</option>
                <option value="Telangana">Telangana</option>
                <option value="Tripura">Tripura</option>
                <option value="Uttar Pradesh">Uttar Pradesh</option>
                <option value="Uttarakhand">Uttarakhand</option>
                <option value="West Bengal">West Bengal</option>
            </select>
            <br><br>
            <input type="text" name="district" class="form-control" placeholder="District" style="width:20em">
            <br>
            <input type="text" name="station" class="form-control" placeholder="Station" style="width:20em">
            <br><br>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
            <br><br>
        </form>

	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
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
				<td><button class="btn btn-primary" type="button" onclick="add_instr()">Add Instrument</button></td>
				<td><input type="submit" class="btn btn-primary" name="submit" value="Submit"></td>
			</tr>
		</tbody>
	</table>
	</form>
			<?php
			if($_SERVER["REQUEST_METHOD"] == 'POST'){
				include('./utilities/db_connection.php');
				$flag1 = 1;
				function inject($instrument_name,$instrument_number){
					$instrument = $instrument_name;
					$working = $_POST[$instrument_number];
					$remark = $_POST[$instrument_name];
					$obs1 = $GLOBALS["obs"];
					echo "Here".$obs1;
					$query = "INSERT INTO report(date_recorded,observatory,instrument,working,reviewed,remark) VALUES(CURDATE(),'$obs1','$instrument','$working',0,'$remark');";
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
						echo "<script type='text/javascript'> alert('You have already filled a report today'); </script>";		
					}
					else{
						echo "<script type='text/javascript'> alert('Success'); </script>";
					}
				}
				else{
					echo "<script type='text/javascript'> alert('Please fill all rows'); </script>";	
				}
			}
			?>
		</tbody>
	</table>
	<script type="text/javascript">
	function add_instr(){
		var table = document.getElementById("myTable");
  		var row = table.insertRow(8);
		var cell1 = row.insertCell(0)
		var cell2 = row.insertCell(1);
		var cell3 = row.insertCell(2);
		var cell4 = row.insertCell(3);
		var cell5 = row.insertCell(4);
		cell1.innerHTML = "<input type='text' name='addedt' placeholder='Instrument..'>";
		cell2.innerHTML = "<input type='radio' name='addedr'>";
		cell3.innerHTML = "<input type='radio' name='addedr'>";
		cell4.innerHTML = "<input type='radio' name='addedr'>";
		cell5.innerHTML = "<input type='text' name='addedremark' placeholder='Remark..'>";
	}
</script>
</body>
</html>
