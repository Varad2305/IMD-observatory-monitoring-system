<?php
session_start();

  // Create database connection
//ob_start();
$set = isset($_SESSION["username"]) && isset($_SESSION["status"]);
if(!$set){
  unset($_SESSION["username"]);
  unset($_SESSION["status"]);
  header("Location: index.html?error=timed_out");
  session_destroy();
  exit();
}
  //$db = mysqli_connect("localhost", "root", "", "imd");
  require_once('./utilities/db_connection.php');


  // Initialize message variable
  $msg = "";
  
  // If upload button is clicked ...
if (isset($_POST['upload'])) {
    // Get image name
    $image = $_FILES['image']['name'];
    // Get text
    //$image_text = mysqli_real_escape_string($db, $_POST['image_text']);

    // image file directory
    $target = "images/".basename($image);

    if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
      $msg = "Image uploaded successfully";
      $sql = "INSERT INTO images VALUES (CURDATE(), '".$_SESSION["observatory"]."', '".$_SESSION["type"]."', '$image', '".$_POST["image_text"]."', '".$_POST["status"]."' );";
    // execute query
      //mysqli_query($db, $sql);
      $res = getResult($sql);
    }
    else{
      $msg = "Failed to upload image";
      echo $msg;	
    }
}

$result = getResult( "SELECT * FROM images where date_recorded = CURDATE() and observatory = '".$_SESSION["observatory"]."' and type = '".$_SESSION["type"]."';");

if (isset($_POST["delete"])) {
		getResult( "DELETE FROM images where date_recorded = CURDATE() and observatory = '".$_SESSION["observatory"]."' and type = '".$_SESSION["type"]."';");
		while ($row = mysqli_fetch_array($result)) {
			unlink("images/".$row['image']);

		}

}
  	


 ?>


<!DOCTYPE html>
<html>
<head>
<title>Image Upload</title>
<style type="text/css">
   #content{
    width: 50%;
    margin: 20px auto;
    border: 1px solid #cbcbcb;
   }
   form{
    width: 50%;
    margin: 20px auto;
   }
   form div{
    margin-top: 5px;
   }
   #img_div{
    width: 80%;
    padding: 5px;
    margin: 15px auto;
    border: 1px solid #cbcbcb;
   }
   #img_div:after{
    content: "";
    display: block;
    clear: both;
   }
   img{
    float: left;
    margin: 5px;
    width: 300px;
    height: 140px;
   }
</style>
</head>
<body>
 
<div id="content">
  <?php
    while ($row = mysqli_fetch_array($result)) {
      echo "<div id='img_div'>";
        echo "<img src='images/".$row['image']."' >";
        echo "<p>".$row['image_text']."</p>";
      echo "</div>";
    }
  ?>
  <form method="POST" action="image_upload.php" enctype="multipart/form-data">
    <input type="hidden" name="size" value="1000000">
    <div>
      <input type="file" name="image">
    </div>
    <div>
      <textarea 
        id="text" 
        cols="40" 
        rows="4" 
        name="image_text" 
        placeholder="Say something about this image..."></textarea>
    </div>
    <div>
    	<input type ="radio" name = "status" value = -1>Before
    	<input type ="radio" name = "status" value = 1>After
    </div>
    <div>
      <button type="submit" name="upload">Upload</button>
      <button type="submit" name="delete">Delete Uploaded Images</button>
    </div>
    <div>
    	<a href="station.php" role = "button" class = "btn btn-primary" name="finish">Finish</a>
    </div>
  </form>
</div>
</body>
</html>