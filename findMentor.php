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

		h1{
			color:firebrick;
		}
	table {
		text-align: center;
		vertical-align: middle;
		border: 2px solid black;
		border-collapse: collapse;
		margin: 20px auto;
		font-family: Verdana, Helvetica, serif;
	}
	table tr:nth-child(even) {
		background-color: #ccc;
	}
	table tr:first-child {
		border-bottom: 2px solid black;
		font-weight: bold;
	}
	td {
		padding: 5px 15px 5px 15px;
		border: 1px solid black;
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
<div id=header>
</div>
  <table>
	  <tr>
		  <td>First Name</td>
		  <td>Last Name</td>
	  	<td>Email</td>
		  <td>Phone</td>
	  </tr>	
</head>

<ul>
  <li><a href="user_landing.php">Home</a><li>
  <li><a class = "active" href="findMentor.php">Find a Mentor</a><li>
  <!--<li><a href="subscription.php">Subscription</a></li>
  <li><a href="manageSubscriptions.php"> Manage Subscription</a></li>-->
  <li style= "float:right"><a href="logout.php">Logout</a></li>
</ul>

<body>
    <?php
  echo('<h1 style="text-align: center;">Available Mentors</h1>') 
    ?>

<?php
@$dbConnect = new mysqli('localhost', 'root', '', 'tip_db');
if (mysqli_connect_errno()) {
	echo ("<p>Error: Unable to connect to database.</p>" .
			"<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
	exit;
	}

// get data from the input boxes 
$userid = $_SESSION["sessionid"];

$data = mysqli_query(@$dbConnect, "SELECT * FROM user_acc where acc_type = 'Mentor'")
 or die("Unable to select data"); 
 #$info = mysqli_fetch_array($data);

 while($info = mysqli_fetch_array( $data )) 
 { 
 echo "<tr>";  
 echo "<td>" .$info['firstname'] . "</td>";
 echo "<td>".$info['lastname'] . " </td>";
 echo "<td>".$info['email']. " </td>";
 echo "<td>" .$info['phone']. " </td>";
 echo "</tr>";
 }
 $dbConnect->close(); 
?>
</body>
</html>