<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <style>
		body {
		background-image: url('index_files/cartooncityt.png');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
		}
</style>
<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: firebrick;
}

li {
  float: left;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: indianred;
}
</style>
</head>




<ul>
  <li><a href="user_landing.php">Home</a><li>
  <li><a href="findMentor.php">Find a Mentor</a><li>
  <li><a href="buySbscription.php">Subscription</a></li>
  <li><a class = "active" href="manageSubscriptions.php"> Manage Subscription</a></li>
  <li style= "float:right"><a href="logout.php">Logout</a></li>
</ul>

<body>
  <h1 style="text-align: center;">Your Subscription Status</h1>
    <?php
    $userid = $_SESSION["sessionid"];

    @$dbConnect = new mysqli('localhost', 'root', '', 'tip_db');
    if (mysqli_connect_errno()) {
      echo ("<p>Error: Unable to connect to database.</p>" .
          "<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
      exit;
      }

      $data = mysqli_query(@$dbConnect, "SELECT * FROM subscriptions where userid = '$userid'") 
      or die("Unable to select data"); 

      while($info = mysqli_fetch_array($data)) 
      { 
        echo('<h2 style="text-align: center;">Status: '.$info['status'].'</h2>');
        echo('<h2 style="text-align: center;">Subscription: '.$info['sub_type'].'</h2>');
      }
    ?>
</body>
</html>