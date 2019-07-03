<?php
session_start();
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
		$date = trim($_GET["date"],"'");
		$type = trim($_GET["type"],"'");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title><?php echo $obs;?> Report</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
<style type="text/css">
    .bs-example{
    	margin: 200px;
    }
    table.roundedCorners { 
 		border: 1px solid Black;
 		border-radius: 13px; 
 		border-spacing: 0;
  	}
	table.roundedCorners td, 
	table.roundedCorners th { 
  		border-bottom: 1px solid Black;
  		padding: 10px; 
  	}
	table.roundedCorners tr:last-child > td {
  		border-bottom: none;
	}
</style>
</head>
<body>
	<br>
	<div class="container">
		<div class="card bg-info text-white">
			<div class="card-body">
				Observatory: <?php echo $obs; ?>
			</div>
		</div>
	</div>
	<br>
	<div class="container">
		<div class="card bg-info text-white">
			<div class="card-body">
				Date: <?php echo $date; ?>
			</div>
		</div>
	</div>
	<br>
	<div class="container">
		<div class="card bg-info text-white">
			<div class="card-body">
				Type:
				<?php
					echo $type;
				?>
			</div>
		</div>
	</div>
	<br><br>
	<center><table class="roundedCorners">
		<tr style="background-color: #141414">
			<center><th><font color= #f5f0f0>Instrument</font></th></center>
			<center><th><font color= #f5f0f0>Status</font></th></center>
			<center><th><font color= #f5f0f0>Remark</font></th></center>
		</tr>
		<?php
			require_once('./utilities/db_connection.php');
			$query = "SELECT instrument,working,remark FROM report where observatory = '$obs' AND date_recorded = '$date';";
			$res = getResult($query);
			$status_colors = array(0 => '#ff0000',1 => '#00ff00',-1 => '#d3d3d3' );
		?>
		<?php while($row1 = mysqli_fetch_array($res)):;?>
                <tr>	
                    <td><?php echo $row1[0];?></td>
                    <td style="background-color: <?php echo $status_colors[$row1[1]]; ?>;">
                    	<?php
                    	switch($row1[1]){
                    		case 0:
                    			echo "Not working";
                    			break;
                    		case 1:
                    			echo "Working";
                    			break;
                    		case -1:
                    			echo "Not available";
                    			break;
                    		default:
                    			echo "Error";
                    	}
                    ?></td>
                    <td><?php echo $row1[2]; ?></td>
                </tr>
        <?php endwhile;?>
        <?php
        	require_once('./utilities/db_connection.php');
        	$query = "SELECT * FROM images WHERE date_recorded = '$date' AND observatory = '$obs' AND type = '$type';";
        	$result = getResult($query);
        	while ($row = mysqli_fetch_array($result)) {
      			echo "<div id='img_div'>";
        		echo "<img src='images/".$row['image']."' style='max-width:70%;height:auto'>";
        		echo "<p>".$row['image_text']."</p>";
      			echo "</div><br><br>";

    		}
  		?>

        ?>
        <?php
        if($_SESSION["status"] == 0){
        	$query2 = "UPDATE report SET reviewed = 1 WHERE observatory = '$obs' AND date_recorded = '$date';";
        	$res2 = getResult($query2);
        }
        ?>

	</table></center>
</body>
</html>