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
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>IMD | Admin</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/admin.css">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>
    <style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        text-align: left;
        padding: 8px;
    }

    tr:nth-child(even) {background-color: #f2f2f2;}
    </style>

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>Observatory Monitoring System</h3>
            </div>

            <ul class="list-unstyled components">
                <p>Admin</p>
                <li class="active">
                    <a href="admin.php">Home</a>
                </li>
                <li>
                    <a href="all_reports.php" >All Reports</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Statistics</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="state_wise_stats.php">State-wise</a>
                        </li>
                        <li>
                            <a href="instrument_wise_stats.php">Instrument-wise</a>
                        </li>
                        <li>
                            <a href="type_wise_stats.php">Type-Wise</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#observatorySubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Edit Observatories</a>
                    <ul class="collapse list-unstyled" id="observatorySubmenu">
                        <li>
                            <a href="add_MC.php">Add Observatory</a>        
                        </li>
                        <li>
                            <a href="delete_MC.php">Delete Observatory</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#userSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Edit Users</a>
                    <ul class="collapse list-unstyled" id="userSubmenu">
                        <li>
                            <a href="add_user.php">Add User</a>
                        </li>
                        <li>
                            <a href="delete_user.php">Delete User</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="btn btn-info">
                        <i class="fas fa-align-left"></i>
                        <span>Toggle Sidebar</span>
                    </button>
                    <form action="/IMD/public_html/index.php" method="get">
                        <button type="submit" class="btn btn-info">
                            <i class="fa fa-sign-out"></i>
                            <span>Sign out</span>
                        </button>
                    </form>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>
                </div>
            </nav>            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <select class="browser-default custom-select" name="state">
            <?php
                require_once('./utilities/db_connection.php');
                $states_query = "SELECT DISTINCT state FROM mc;";
                $states_result = getResult($states_query);
            ?>
                <option selected>All States</option>
                <?php while($row1 = mysqli_fetch_array($states_result)):;?>
                    <option value="<?php echo $row1[0]; ?>"><?php echo $row1[0]; ?></option>
                <?php endwhile;?>
            </select><br><br>
            <input placeholder="Start Date" class="browser-default custom-select" type="text" onfocus="(this.type='date')"  id="start_date" name="start_date"><br><br>
            <input placeholder="End Date" class="browser-default custom-select" type="text" onfocus="(this.type='date')"  id="end_date" name="end_date"><br><br>
            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
            </form><br><br>
            <?php
                require_once('./utilities/db_connection.php');
                $start_date = $_POST["start_date"];
                $end_date = $_POST["end_date"];
                $state = $_POST["state"];
                
                if($state == 'All States'){
                    $query = "SELECT DISTINCT date_recorded,observatory,type,inspector from report WHERE date_recorded BETWEEN '$start_date' AND '$end_date';";
                }
                else{
                    $query = "SELECT DISTINCT date_recorded,observatory,type,inspector from report WHERE date_recorded BETWEEN '$start_date' AND '$end_date' AND observatory IN (SELECT name from mc WHERE state = '$state');";
                }

                $res = getResult($query);
                
            ?>
            <div class="browser-default">
                Reports in <strong><?php echo $state; ?></strong> between <strong><?php echo $start_date; ?></strong> and <strong><?php echo $end_date; ?></strong>:<br>
            </div><br><br>
            <table>
                <tr>
                    <th>Inspector</th>
                    <th>Observatory</th>
                    <th>Type</th>
                    <th>Date</th>
                    <th>View Report</th>
                    <th>Download Report</th>
                </tr>
                <?php while($row1 = mysqli_fetch_array($res)):;?>
                    <tr>
                        <td><?php echo $row1[3];?></td>
                        <td><?php echo $row1[1];?></td>
                        <td><?php echo $row1[2];?></td>
                        <td><?php echo $row1[0];?></td>                        
                        <td><?php echo "<a href = report.php?obs='".$row1['observatory']."'&date='".$row1['date_recorded']."'&type='".$row1['type']."' target='_blank'>View Report</a>";?></td>
                        <td><?php echo "<a href = generate_pdf.php?obs='".$row1['observatory']."'&date='".$row1['date_recorded']."'&type='".$row1['type']."' target='_blank'>Download Report</a>";?></td>
                    </tr>
                <?php endwhile;?>
            </table>

            <?php  
                require_once('./utilities/db_connection.php');

                if($state == 'All States'){
                    $query = "SELECT * FROM report INNER JOIN (SELECT observatory,MAX(date_recorded) as top_date FROM report GROUP BY observatory) AS each_item ON each_item.top_date = report.date_recorded AND each_item.observatory = report.observatory AND working = 1 AND top_date BETWEEN '$start_date' AND '$end_date';";
                }

                else{
                    $query = "SELECT * FROM report INNER JOIN (SELECT observatory,MAX(date_recorded) as top_date FROM report GROUP BY observatory) AS each_item ON each_item.top_date = report.date_recorded AND each_item.observatory = report.observatory AND working = 1 AND top_date BETWEEN '$start_date' AND '$end_date' AND each_item.observatory IN (SELECT name FROM mc where state = '$state');";
                }
                $result = getResult($query);
                $total_working = mysqli_num_rows($result);
                mysqli_free_result($result);

                if($state == 'All States'){
                    $query = "SELECT * FROM report INNER JOIN (SELECT observatory,MAX(date_recorded) as top_date FROM report GROUP BY observatory) AS each_item ON each_item.top_date = report.date_recorded AND each_item.observatory = report.observatory AND working = 0 AND top_date BETWEEN '$start_date' AND '$end_date';";
                }

                else{
                    $query = "SELECT * FROM report INNER JOIN (SELECT observatory,MAX(date_recorded) as top_date FROM report GROUP BY observatory) AS each_item ON each_item.top_date = report.date_recorded AND each_item.observatory = report.observatory AND working = 0 AND top_date BETWEEN '$start_date' AND '$end_date' AND each_item.observatory IN (SELECT name FROM mc where state = '$state');";
                }
                $result = getResult($query);
                $total_not_working = mysqli_num_rows($result);
                mysqli_free_result($result);

                if($state == 'All States'){
                    $query = "SELECT * FROM report INNER JOIN (SELECT observatory,MAX(date_recorded) as top_date FROM report GROUP BY observatory) AS each_item ON each_item.top_date = report.date_recorded AND each_item.observatory = report.observatory AND working = -1 AND top_date BETWEEN '$start_date' AND '$end_date';";    
                }
                else{
                    $query = "SELECT * FROM report INNER JOIN (SELECT observatory,MAX(date_recorded) as top_date FROM report GROUP BY observatory) AS each_item ON each_item.top_date = report.date_recorded AND each_item.observatory = report.observatory AND working = -1 AND top_date BETWEEN '$start_date' AND '$end_date' AND each_item.observatory IN (SELECT name FROM mc where state = '$state');";
                }
                $result = getResult($query);
                $total_not_available = mysqli_num_rows($result);
                mysqli_free_result($result);

            ?>
            <br><br>
            <center><div id="piechart"></div></center>
            <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

            <script type="text/javascript">
                google.charts.load('current', {'packages':['corechart']});
                google.charts.setOnLoadCallback(all_instruments);

                function all_instruments() {
                    var total_working = <?php echo $total_working; ?>;
                    var total_not_working = <?php echo $total_not_working; ?>;
                    var total_not_available = <?php echo $total_not_available; ?>;
                    var data = google.visualization.arrayToDataTable([
                        ['Status', 'Number'],
                        ['Working', total_working],
                        ['Not Working', total_not_working],
                        ['Not Available', total_not_available]
                    ]);
                    var options = {'title':'All Instruments in the given state and time frame', 'width':550, 'height':400};
                    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
                    chart.draw(data, options);
                }
            </script>
            <br>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>Instrument</th>
                        <th>Working</th>
                        <th>Not Working</th>
                        <th>Not available</th>
                    </tr>
                </thead>
                <?php
                    require_once('./utilities/db_connection.php');
                    if($state == 'All States'){
                        $query = "SELECT instrument, SUM(CASE WHEN working = 1 THEN 1 ELSE 0 END) Working, SUM(CASE WHEN working = 0 THEN 1 ELSE 0 END) Not_working, SUM(CASE WHEN working = -1 THEN 1 ELSE 0 END) Not_available FROM report WHERE date_recorded BETWEEN '$start_date' AND '$end_date' GROUP BY instrument;";    
                    }
                    else{
                        $query = "SELECT instrument, SUM(CASE WHEN working = 1 THEN 1 ELSE 0 END) Working, SUM(CASE WHEN working = 0 THEN 1 ELSE 0 END) Not_working, SUM(CASE WHEN working = -1 THEN 1 ELSE 0 END) Not_available FROM report WHERE date_recorded BETWEEN '$start_date' AND '$end_date' AND observatory IN (SELECT name FROM mc where state = '$state') GROUP BY instrument;";
                    }
                    $table_result = getResult($query);
                ?>
                <tbody>
                    <?php while($row1 = mysqli_fetch_array($table_result)):;?>
                        <tr>
                            <td><?php echo $row1[0]; ?></td>
                            <td><?php echo $row1[1]; ?></td>
                            <td><?php echo $row1[2]; ?></td>
                            <td><?php echo $row1[3]; ?></td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar, #content').toggleClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
</body>
</html>