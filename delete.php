<?php
    session_start(); //starts the session
    $con = mysqli_connect("localhost", "kde", "midas", "first_db");
	if($_SESSION['user']){ //checks if user is logged in
	}
	else{
		header("location:index.php"); // redirects if user is not logged in
	}
	if($_SERVER['REQUEST_METHOD'] == "GET")
	{
		
		mysqli_select_db($con, "first_db") or die("Cannot connect to database"); //Connect to database
		$id = $_GET['id'];
		mysqli_query($con, "DELETE FROM list WHERE id='$id'");
		header("location: home.php");
	}
?>
