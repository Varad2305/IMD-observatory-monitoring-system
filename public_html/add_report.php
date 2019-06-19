<?php
ob_start();
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
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <center><select class="browser-default custom-select" name="obs_type" style="width:6em;"></center>
                <option selected>Type</option>
                <option value="RMC">RMC</option>
                <option value="MC">MC</option>
                <option value="MO">MO</option>
                <option value="MWO">MWO</option>
                <option value="AMO">AMO</option>
                <option value="AMS">AMS</option>
                <option value="AWS">AWS</option>
            </select>
            <br><br>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form>
        <?php
        	if($_SERVER["REQUEST_METHOD"] == "POST"){
        		$type = $_POST["obs_type"];
        		if($type === 'RMC' || $type === 'MC' || $type === 'MO'){
        			header("Location:1_add_report.php");
        			ob_end_flush();
        			exit();
        		}
        		if($type === 'MWO' || $type === 'AMO' || $type === 'AMS'){
        			header("Location:2_add_report.php");
        			ob_end_flush();
        			exit();
        		}
        		if($type === 'AWS'){
        			header("Location:3_add_report.php");
        			ob_end_flush();
        			exit();	
        		}
        	}	
        ?>

</body>
</html>
