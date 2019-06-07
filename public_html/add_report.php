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

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add Report</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	<div class="limiter">
		<div class="container-table100">
			<div class="wrap-table100">
				<div class="table100 ver1">
					<div class="table100-firstcol">
						<table>
							<thead>
								<tr class="row100 head">
									<th class="cell100 column1">Instrument</th>
								</tr>
							</thead>
							<tbody>
								<tr class="row100 body">	
									<td class="cell100 column1">Wind Wane</td>
								</tr>

								<tr class="row100 body">
									<td class="cell100 column1">Cup Counter Anemometer</td>
								</tr>

								<tr class="row100 body">
									<td class="cell100 column1">Max Thermometer</td>
								</tr>

								<tr class="row100 body">
									<td class="cell100 column1">Min Thermometer</td>
								</tr>

								<tr class="row100 body">
									<td class="cell100 column1">Dry Bulb Thermometer</td>
								</tr>

								<tr class="row100 body">
									<td class="cell100 column1">Wet Bulb Thermometer</td>
								</tr>

								<tr class="row100 body">
									<td class="cell100 column1">Stevenson Screen (Single)</td>
								</tr>

								<tr class="row100 body">
									<td class="cell100 column1">Stevenson Screen (Double)</td>
								</tr>

								<tr class="row100 body">
									<td class="cell100 column1">Thermograph</td>
								</tr>

								<tr class="row100 body">
									<td class="cell100 column1">Barograph</td>
								</tr>

								<tr class="row100 body">
									<td class="cell100 column1">Hydrograph</td>
								</tr>

								<tr class="row100 body">
									<td class="cell100 column1">Ordinary Rain Gauge</td>
								</tr>

								<tr class="row100 body">
									<td class="cell100 column1">Self Recording Rain Gauge</td>
								</tr>

								<tr class="row100 body">
									<td class="cell100 column1">Evaporimeter</td>
								</tr>

								<tr class="row100 body">
									<td class="cell100 column1">Mercury Barometer</td>
								</tr>

								<tr class="row100 body">
									<td class="cell100 column1">High Wind Speed Recorders</td>
								</tr>
							</tbody>
						</table>
					</div>
					
					<div class="wrap-table100-nextcols js-pscroll">
						<div class="table100-nextcols">
							<table>
								<thead>
									<tr class="row100 head">
										<th class="cell100 column2">Working</th>
										<th class="cell100 column3">Not working</th>
										<th class="cell100 column4">Not Available</th>
									</tr>
								</thead>
								<tbody>
									<tr class="row100 body">
										<form>
											<td class="cell100 column2">
												<center><input type="radio" name="working" align="centre" value="1"></center>
											</td>
											<td class="cell100 column3">
												<center><input type="radio" name="working" value="0"></center>
											</td>
											<td class="cell100 column4">
												<center><input type="radio" name="working" value="-1"></center>
											</td>
										</form>
									</tr>

									<tr class="row100 body">
										<form>
											<td class="cell100 column2">
												<center><input type="radio" name="working" align="centre" value="1"></center>
											</td>
											<td class="cell100 column3">
												<center><input type="radio" name="working" value="0"></center>
											</td>
											<td class="cell100 column4">
												<center><input type="radio" name="working" value="-1"></center>
											</td>
										</form>
									</tr>

									<tr class="row100 body">
										<form>
											<td class="cell100 column2">
												<center><input type="radio" name="working" align="centre" value="1"></center>
											</td>
											<td class="cell100 column3">
												<center><input type="radio" name="working" value="0"></center>
											</td>
											<td class="cell100 column4">
												<center><input type="radio" name="working" value="-1"></center>
											</td>
										</form>
									</tr>

									<tr class="row100 body">
										<form>
											<td class="cell100 column2">
												<center><input type="radio" name="working" align="centre" value="1"></center>
											</td>
											<td class="cell100 column3">
												<center><input type="radio" name="working" value="0"></center>
											</td>
											<td class="cell100 column4">
												<center><input type="radio" name="working" value="-1"></center>
											</td>
										</form>
									</tr>

									<tr class="row100 body">
										<form>
											<td class="cell100 column2">
												<center><input type="radio" name="working" align="centre" value="1"></center>
											</td>
											<td class="cell100 column3">
												<center><input type="radio" name="working" value="0"></center>
											</td>
											<td class="cell100 column4">
												<center><input type="radio" name="working" value="-1"></center>
											</td>
										</form>
									</tr>

									<tr class="row100 body">
										<form>
											<td class="cell100 column2">
												<center><input type="radio" name="working" align="centre" value="1"></center>
											</td>
											<td class="cell100 column3">
												<center><input type="radio" name="working" value="0"></center>
											</td>
											<td class="cell100 column4">
												<center><input type="radio" name="working" value="-1"></center>
											</td>
										</form>
									</tr>

									<tr class="row100 body">
										<form>
											<td class="cell100 column2">
												<center><input type="radio" name="working" align="centre" value="1"></center>
											</td>
											<td class="cell100 column3">
												<center><input type="radio" name="working" value="0"></center>
											</td>
											<td class="cell100 column4">
												<center><input type="radio" name="working" value="-1"></center>
											</td>
										</form>
									</tr>

									<tr class="row100 body">
										<form>
											<td class="cell100 column2">
												<center><input type="radio" name="working" align="centre" value="1"></center>
											</td>
											<td class="cell100 column3">
												<center><input type="radio" name="working" value="0"></center>
											</td>
											<td class="cell100 column4">
												<center><input type="radio" name="working" value="-1"></center>
											</td>
										</form>
									</tr>

									<tr class="row100 body">
										<form>
											<td class="cell100 column2">
												<center><input type="radio" name="working" align="centre" value="1"></center>
											</td>
											<td class="cell100 column3">
												<center><input type="radio" name="working" value="0"></center>
											</td>
											<td class="cell100 column4">
												<center><input type="radio" name="working" value="-1"></center>
											</td>
										</form>
									</tr>

									<tr class="row100 body">
										<form>
											<td class="cell100 column2">
												<center><input type="radio" name="working" align="centre" value="1"></center>
											</td>
											<td class="cell100 column3">
												<center><input type="radio" name="working" value="0"></center>
											</td>
											<td class="cell100 column4">
												<center><input type="radio" name="working" value="-1"></center>
											</td>
										</form>
									</tr>

									<tr class="row100 body">
										<form>
											<td class="cell100 column2">
												<center><input type="radio" name="working" align="centre" value="1"></center>
											</td>
											<td class="cell100 column3">
												<center><input type="radio" name="working" value="0"></center>
											</td>
											<td class="cell100 column4">
												<center><input type="radio" name="working" value="-1"></center>
											</td>
										</form>
									</tr>

									<tr class="row100 body">
										<form>
											<td class="cell100 column2">
												<center><input type="radio" name="working" align="centre" value="1"></center>
											</td>
											<td class="cell100 column3">
												<center><input type="radio" name="working" value="0"></center>
											</td>
											<td class="cell100 column4">
												<center><input type="radio" name="working" value="-1"></center>
											</td>
										</form>
									</tr>

									<tr class="row100 body">
										<form>
											<td class="cell100 column2">
												<center><input type="radio" name="working" align="centre" value="1"></center>
											</td>
											<td class="cell100 column3">
												<center><input type="radio" name="working" value="0"></center>
											</td>
											<td class="cell100 column4">
												<center><input type="radio" name="working" value="-1"></center>
											</td>
										</form>
									</tr>

									<tr class="row100 body">
										<form>
											<td class="cell100 column2">
												<center><input type="radio" name="working" align="centre" value="1"></center>
											</td>
											<td class="cell100 column3">
												<center><input type="radio" name="working" value="0"></center>
											</td>
											<td class="cell100 column4">
												<center><input type="radio" name="working" value="-1"></center>
											</td>
										</form>
									</tr>

									<tr class="row100 body">
										<form>
											<td class="cell100 column2">
												<center><input type="radio" name="working" align="centre" value="1"></center>
											</td>
											<td class="cell100 column3">
												<center><input type="radio" name="working" value="0"></center>
											</td>
											<td class="cell100 column4">
												<center><input type="radio" name="working" value="-1"></center>
											</td>
										</form>
									</tr>

									<tr class="row100 body">
										<form>
											<td class="cell100 column2">
												<center><input type="radio" name="working" align="centre" value="1"></center>
											</td>
											<td class="cell100 column3">
												<center><input type="radio" name="working" value="0"></center>
											</td>
											<td class="cell100 column4">
												<center><input type="radio" name="working" value="-1"></center>
											</td>
										</form>
									</tr>

									<tr class="row100 body">
										<form>
											<td class="cell100 column2">
												<center><input type="radio" name="working" align="centre" value="1"></center>
											</td>
											<td class="cell100 column3">
												<center><input type="radio" name="working" value="0"></center>
											</td>
											<td class="cell100 column4">
												<center><input type="radio" name="working" value="-1"></center>
											</td>
										</form>
									</tr>

									<tr class="row100 body">
										<form>
											<td class="cell100 column2">
												<center><input type="radio" name="working" align="centre" value="1"></center>
											</td>
											<td class="cell100 column3">
												<center><input type="radio" name="working" value="0"></center>
											</td>
											<td class="cell100 column4">
												<center><input type="radio" name="working" value="-1"></center>
											</td>
										</form>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>


<!--===============================================================================================-->	
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script>
		$('.js-pscroll').each(function(){
			var ps = new PerfectScrollbar(this);

			$(window).on('resize', function(){
				ps.update();
			})

			$(this).on('ps-x-reach-start', function(){
				$(this).parent().find('.table100-firstcol').removeClass('shadow-table100-firstcol');
			});

			$(this).on('ps-scroll-x', function(){
				$(this).parent().find('.table100-firstcol').addClass('shadow-table100-firstcol');
			});

		});

		
		
		
	</script>
<!--===============================================================================================-->
	<script src="js/main.js"></script>

</body>
</html>