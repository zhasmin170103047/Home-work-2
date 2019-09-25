<?php
$error=''; 
if (isset($_POST['submit'])) {
if (empty($_POST['user']) || empty($_POST['password'])) {
	$error = "USERNAME OR PASSWORD IS INVALID";
} else {
	$user = $_POST['user'];
	$password = $_POST['password'];
	$conn = mysqli_connect('localhost:8889','root','root') or die ('NO CONNECTION');
	$db = mysqli_select_db($conn, 'log') or die ('DB WILL NOT OPEN');
	$query = mysqli_query($conn, "SELECT * FROM pass WHERE password='$password' AND user='$user'");
	$rows = mysqli_num_rows($query);
	if ($rows == 1) {
		header("Location: logged.php"); 
		$error = "USERNAME OR PASSWORD IS INVALID";
	}
	mysqli_close($conn); 
}
}
?>