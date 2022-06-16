
<?php
// Start the session
session_start();
//Clear session variables
$_SESSION = array();


header( "refresh:5;url=login.html" );
echo "<script>window.location.href='login.html';
alert('Successfully Logged out!')</script>";
exit;

?>

