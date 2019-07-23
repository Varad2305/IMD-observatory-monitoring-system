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

if($_SESSION["status"] == 1){
    unset($_SESSION["username"]);
    unset($_SESSION["status"]);
    header("Location: index.html?error=timed_out");
    ob_end_flush();
    session_destroy();
    exit();   
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title> Delete Observatory</title>
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
                Delete observatory
            </div>
        </div>
    </div>
    <br>
    
    <center>
        <table class="roundedCorners">
        <tr style="background-color: #141414">
            <center><th><font color= #f5f0f0>Observatory</font></th></center>
            <center><th><font color= #f5f0f0>Type</font></th></center>
        </tr>
        <?php
            require_once('./utilities/db_connection.php');
            $query = "SELECT name,type FROM mc";
            $res = getResult($query);
        ?>
        <?php while($row1 = mysqli_fetch_array($res)):;?>
            <tr>    
                <td><?php echo "<a onclick=\"return confirm('Delete this record?')\" href=\"delete_MC_conf.php?obs=".$row1[0]."&type=".$row1[1]."\"> $row1[0]</a>"; ?></td>
                <td><?php echo $row1[1];?></td>
            </tr>
            
        <?php endwhile; ?>
        </table>
    </center>
    <br><br>
    <div>
            <a class="btn btn-primary" href="admin.php" role="button" style="margin-left: 3em; ">Go Back</a>
    </div>
</body>
</html> 
    

