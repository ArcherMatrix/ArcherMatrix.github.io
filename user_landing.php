<?php
// Start the session
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <style>
		body {
		background-image: url('index_files/mentor.jpg');
		background-repeat: no-repeat;
		background-attachment: fixed;
		background-size: 100% 100%;
		}
</style>
<style>

  h1
  {
    color: firebrick;
  }
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
  <!--<li><a href="buySubscription.php">Subscription</a></li>
  <li><a href="manageSubscriptions.php"> Manage Subscription</a></li>-->
  <li style= "float:right"><a href="logout.php">Logout</a></li>
</ul>

<body>
    <?php
  echo('<h1 style="text-align: center;">Welcome '. $_SESSION['name']. '!</h1>') 
    ?>
</body>
</html>
