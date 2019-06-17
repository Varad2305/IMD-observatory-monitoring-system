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

    <title>State Wise Stats</title>

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
    .dropdown-menu{
        width:350px !important;
        height: 40px !important;
        background-color: rgba(0,0,0,.5);
        font-family: "Poppins",sans-serif;
        font-weight: 100;
        font-size: 12px;
        line-height: 30px;
    }
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
                    <a href="all_reports.php" target="_blank">All Reports</a>
                </li>
                <li>
                    <a href="statistics.php">Statistics</a>
                </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Statistics</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="state_wise_stats.php">State-wise</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                           </li>
                    </ul>
                </li>
                 <li>
                    <a href="add_MC.php">Add Observatory</a>
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
            </nav>
            <?php
                include('./utilities/db_connection.php');
                $query = "SELECT DISTINCT state from mc;";
                $states = getResult($query);
            ?>
            <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <select class="browser-default custom-select" name="state">
                <option selected>State</option>
                <?php while($row1 = mysqli_fetch_array($states)):;?>
                    <option value="<?php echo $row1[0]; ?>"><?php echo $row1[0]; ?></option>
                <?php endwhile;?>
            </select>
            <br>
            <br>
            <input placeholder="Start Date" class="browser-default custom-select" type="text" onfocus="(this.type='date')"  id="start_date" name="start_date">
            <br>
            <br>
            <input placeholder="End Date" class="browser-default custom-select" type="text" onfocus="(this.type='date')"  id="end_date" name="end_date"><br><br>
            <input type="submit" class="btn btn-primary" name="submit" value="Submit">
            </form>
            <br>
            <br>
            <table>
                <tr>
                    <th>Observatory</th>
                    <th>Date</th>
                    <th>Report</th>
                </tr>
                <?php
                    if($_SERVER["REQUEST_METHOD"] == "POST"){
                        include('./utilities/db_connection.php');
                        $start_date = $_POST["start_date"];
                        $end_date = $_POST["end_date"];
                        $state = $_POST["state"];
                        echo $start_date;
                        echo $end_date;
                        echo $state;
                        
                        $query = "SELECT DISTINCT date_recorded,observatory from report WHERE DATE(date_recorded) BETWEEN ''$start_date'' AND ''$end_date'' AND observatory IN (SELECT name FROM mc WHERE state = ''$state'');";
                        // SELECT date_recorded,observatory from report where date_recorded BETWEEN "2019-06-10" AND "2019-06-18" AND observatory IN (SELECT name from mc where state = 'Maharashtra')
                        $res = getResult($query);
                    }
                ?>
                <?php while($row1 = mysqli_fetch_array($res)):;?>
                    <tr>
                        <td><?php echo $row1[1];?></td>
                        <td><?php echo $row1[0];?></td>
                        <td><?php echo "<a href = report.php?obs='".$row1[1]."'&date='".$row1[0]."' target='_blank'>Report</a>"?></td>
                    </tr>
                <?php endwhile;?>
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