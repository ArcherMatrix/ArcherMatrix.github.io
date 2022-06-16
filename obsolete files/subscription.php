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
  <!--<li><a class = "active" href="buySubscription.php">Subscription</a></li>
  <li><a href="manageSubscriptions.php"> Manage Subscription</a></li>-->
  <li style= "float:right"><a href="logout.php">Logout</a></li>
</ul>

<body>
<?php
@$dbConnect = new mysqli('localhost', 'root', '', 'tip_db');
if (mysqli_connect_errno()) {
	echo ("<p>Error: Unable to connect to database.</p>" .
			"<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
	exit;
	}


// get data from the input boxes 
$userid = $_SESSION["sessionid"];

$selectedPlan = $_POST['sub_plan'];
$date = date('Y-m-d H:i:s');


// add slashes if add and strip slashes default is not turned on
// magic_quotes_gpc is off by default in XAMPP, add \ if value contains a quote
/*if (!get_magic_quotes_gpc()){
	$firstname = addslashes($firstname); 
	$lastname = addslashes($lastname);
	$email = addslashes($email);
	$phone = addslashes($phone);
	$password = addslashes($password);
}*/

// insert into contact database

$sql = "INSERT INTO `subscriptions` (`userid`, `start_date`, `end_date`, `status`, `sub_type`) VALUES". "('$userid', '$date','null', 'Active', '$\
');";
$sqlString = "INSERT into subscriptions values" .
				"('$userid', '$date','null','Active','$selectedPlan')";
$result = $dbConnect->query($sqlString);
if (!$result){	
	echo ("<p>Error: Registration information was not added.</p>" .
			"<p>Error code $dbConnect->errno: $dbConnect->error. </p>");
	$dbConnect->close();
	exit;
	}

$dbConnect->close();
//** end of input processing
?>
<div id=header>
	<h1>Thank you for booking with us!</h1>
	<h1>Now Redirecting to Home Page</h1>
</div>
<?php 
	header( "refresh:5;url=user_landing.php" ); 
?>
</body>
</html>
