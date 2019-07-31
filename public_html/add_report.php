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

if($_SESSION["status"] == 0){
    unset($_SESSION["username"]);
    unset($_SESSION["status"]);
    header("Location: index.html?error=timed_out");
    ob_end_flush();
    session_destroy();
    exit();   
}
?>
<?php
    $error = trim($_GET["errortype"],"'");
    if(isset($error)){
        if($error == 2){
            echo "<script> alert('You did not fill the full form'); </script>";
        }

        if($error == 1){
            echo "<script> alert('You have already filled a report for that station today'); </script>";
        }
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
                4.Please limit the remark to 5 words<br>
			</div>
		</div>
	</div>
	<br>
	<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <center><select class="browser-default custom-select" name="obs_type" style="width:6em;"></center>
                <option selected>Type</option>
                <option value="SO">Surface Observatory</option>
                <option value="ARG">ARG</option>                    <!-- Ask Biju Sir -->
                <option value="Agromet">Agromet Observatory</option>
                <option value="MWO">MWO</option>
                <option value="AMO">AMO</option>
                <option value="AMS">AMS</option>
                <option value="AWS">AWS</option>
            </select>
            <br><br>
            <center><select class="browser-default custom-select" name="state" style="width:20em;" id="state1"></center>
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
            <noscript><input type="submit" value="Submit"></noscript>
            <br><br>
            <input type="submit" name="submit" value="Submit" class="btn btn-primary">
        </form><br><br>
        <button class="btn btn-primary" type="button" onclick="window.location='station.php';">Go back</button>
        <?php
        	if($_SERVER["REQUEST_METHOD"] == "POST"){
        		$type = $_POST["obs_type"];
        		$state = $_POST["state"];
        		$_SESSION["type"] = $type;
        		if($type === 'SO'){
        			header("Location:1_add_report.php?type='$type'&state='$state'");
        			ob_end_flush();
        			exit();
        		}
        		if($type === 'MWO' || $type === 'AMO' || $type === 'AMS'){
        			header("Location:2_add_report.php?type='$type'&state='$state'");
        			ob_end_flush();
        			exit();
        		}
        		if($type === 'AWS'){
        			header("Location:3_add_report.php?type='$type'&state='$state'");
        			ob_end_flush();
        			exit();
        		}
                if($type === 'ARG'){                //Ask Biju Sir
                    header("Location:4_add_report.php?type='$type'&state='$state'");
                    ob_end_flush();
                    exit();
                }
                if($type === 'Agromet'){
                    header("Location:5_add_report.php?type='$type'&state='$state'");
                    ob_end_flush();
                    exit();
                }
        	}	
        ?>

</body>
</html>
