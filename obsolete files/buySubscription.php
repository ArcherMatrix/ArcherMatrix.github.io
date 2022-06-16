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
  <li><a class = "active" href="buySubscription.php">Subscription</a></li>
  <li><a href="manageSubscriptions.php"> Manage Subscription</a></li>
  <li style= "float:right"><a href="logout.php">Logout</a></li>
</ul>

<body>
<form id="subForm" action="subscription.php" method="post">
	<table>
		
        <tr>
        <td> Subscription Plan: <td>
            <td>
            <select name="sub_plan" id="sub_type">
                <option value="Weekly">Weekly Plan-60.00$</option>
                <option value="Medium">Month Plan-240.00$</option>
                <option value="Large">Semester Plan-500$</option>
                <option value="Extra Large">Year Plan-800$</option>
                </select>
            </td>
	</table>
<input id="button" type="submit" value="Submit" />
</form>

</body>
</html>