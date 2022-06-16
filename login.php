<?php
// Start the session
session_start();
?>

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
</html>


<?php
@$dbConnect = new mysqli('localhost', 'root', '', 'tip_db');
if (mysqli_connect_errno()) 
{
	echo ("<p>Error: Unable to connect to database.</p>" .
			"<p>Error code $dbConnect->connect_errno: $dbConnect->connect_error. </p>");
	exit;
}
// get data from the input boxes 
$userid = $_POST['userid'];
$password = $_POST['password'];   



if (!$userid || !$password) {
    echo "<script>window.location.href='login.html';
	alert('You have not entered all the required information.')</script>";
    exit;
}

//$data = mysqli_query(@$dbConnect, "SELECT * FROM user_acc where firstname = '$firstname' && email = '$email' && password = '$password'") 
 //or die("Unable to select data");
$getPass = mysqli_query(@$dbConnect,"SELECT password FROM user_acc WHERE userid = '$userid'");
//$pass = $dbConnect->query($getPass);
$data = mysqli_fetch_assoc($getPass);

if(!$data['password'])
{
	echo "<script>window.location.href='login.html';
	alert('Couldn't retrieve data from database.')</script>";
    exit;
}

if($password == $data['password'])
{
	$getName = "SELECT firstname FROM user_acc WHERE userid = '$userid'";
	$name = $dbConnect->query($getName);
	$name_data = mysqli_fetch_assoc($name);
	
	$_SESSION['sessionid']= $userid;
	$_SESSION['name'] = $name_data['firstname'];
	header( "refresh:5;url=user_landing.php" );
	echo "<h1>Login Successful!</h1>
		<p>Redirecting...</p>";
}
else
{
	echo "<script>window.location.href='login.html';
	alert('Your User ID / password is not correct.')</script>";
    exit;
}
//header( "refresh:5;url=user_landing.html" );
$dbConnect->close();
//** end of input processing
?>

	

