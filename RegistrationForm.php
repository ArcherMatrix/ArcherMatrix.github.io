<!DOCTYPE html>
<html>
<head>
<style tyle="text/css">
h1 {
	text-align: center;
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
</head>
<body>
<?php
@$dbConnect = new mysqli('localhost', 'root', '', 'tip_db');
if (mysqli_connect_errno()) {
	echo ("<p>Error: Unable to connect to database.</p>" .
			"<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
	exit;
	}

// get data from the input boxes 
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$password = $_POST['password'];
$a_type = $_POST['acc_type'];

if (!$firstname || !$lastname || !$email || !$phone || !$password||!$a_type) 
{
    echo "<p>You have not entered all the required information. </p>";
    exit;
}
else
{
	if($a_type == 'Mentor')
	{
		$sqlString = "INSERT into user_acc values " .
				"(0, '$firstname', '$lastname', '$email', '$phone', '$password','null','0','$a_type')";
		$result = $dbConnect->query($sqlString);
	}
	else if($a_type == 'Mentee')
	{
		$sqlString = "INSERT into user_acc values " .
				"(0, '$firstname', '$lastname', '$email', '$phone', '$password','null','null','$a_type')";
		$result = $dbConnect->query($sqlString);
	}
	else
	{
		echo "<p>Could not figure out what type of account. </p>";
		exit;
	}
}

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
if (!$result||!$firstname || !$lastname || !$email || !$phone || !$password||!$a_type){	
	echo ("<p>Error: Registration information was not added.</p>" .
			"<p>Error code $dbConnect->errno: $dbConnect->error. </p>");
	$dbConnect->close();
	exit;
	}

$dbConnect->close();
//** end of input processing
?>
<div id=header>
	<h1>Thank You for Registering</h1>
</div>
<table>
	<tr>
		<td>User Id</td>
		<td>First Name</td>
		<td>Last Name</td>
		<td>Email</td>
		<td>Phone</td>
		<td>Account Type</td>
	</tr>	

<?php 
@$dbConnect = new mysqli('localhost', 'root', '', 'tip_db');
if (mysqli_connect_errno()) {
	echo ("<p>Error: Unable to connect to database.</p>" .
			"<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
	exit;
	}
$data = mysqli_query(@$dbConnect, "SELECT * FROM user_acc where firstname = '$firstname' && email = '$email' && password = '$password'") 
 or die("Unable to select data"); 
 #$info = mysqli_fetch_array($data);

 while($info = mysqli_fetch_array( $data )) 
 { 
 echo "<tr>";  
 echo "<td>" .$info['userid'] . "</td>";
 echo "<td>".$info['firstname'] . " </td>";
 echo "<td>".$info['lastname']. " </td>";
 echo "<td>" .$info['email']. " </td>";
 echo "<td>" .$info['phone']. " </td>";
 echo "<td>" .$info['acc_type']. " </td>";
 echo "</tr>";
 } 
 
?>
</body>

	<head>
		<title>Back to Login</title>
	</head>
	<body>
	<h3></h3>
	
	<form id="subForm" action="login.html" method="post">
		<table>
		</table>
	<input id="button" type="submit" value="Back to Login" />
	</form>
	
	</body>
 
</html>
