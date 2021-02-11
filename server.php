<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'form_crud');

	// initialize variables
	$name = "";
	$address = "";
	$id = 0;
	$update = false;

	if (isset($_POST['save'])) {
		$name = $_POST['function'];
		$address = $_POST['command'];

		mysqli_query($db, "INSERT INTO crud (function, command) VALUES ('$name', '$address')"); 
		$_SESSION['message'] = "Data saved"; 
		header('location: index.php');
	}



	if (isset($_POST['update'])) {
	$id = $_POST['id'];
	$name = $_POST['function'];
	$address = $_POST['command'];

	mysqli_query($db, "UPDATE crud SET function='$name', command='$address' WHERE id=$id");
	$_SESSION['message'] = "Data updated!"; 
	header('location: index.php');
}




if (isset($_GET['del'])) {
	$id = $_GET['del'];
	mysqli_query($db, "DELETE FROM crud WHERE id=$id");
	$_SESSION['message'] = "Data deleted!"; 
	header('location: index.php');
}