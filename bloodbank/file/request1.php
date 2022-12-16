<?php
session_start(); 
require 'connection.php';
if(!isset($_SESSION['did']))
{
	header('location:../login.php');
}
else {
	if(isset($_POST['request1'])){
		$hid = $_GET['hospitals'];
		$did = $_SESSION['did'];
		$dbg = $_POST['dbg'];
		// $unit = $_POST['unit'];
		$check_data = mysqli_query($conn, "SELECT reqid FROM donorrequest where hid=$hid and did=$did");
		if(mysqli_num_rows($check_data) > 0){
			$error= 'You have already requested for blood sample from this Hospital.';
			header( "location:../availablehospitals.php?error=".$error );
}else{
		$sql="INSERT INTO donorrequest (dbg, did, hid) VALUES ('$dbg', $did, $hid)";
		if ($conn->query($sql) === TRUE) {
			$msg = 'You have requested for donating '.$dbg.'. Our team will contact you soon.';
			header( "location:../sentrequest1.php?msg=".$msg);
		} else {
			$error = "Error: " . $sql . "<br>" . $conn->error;
            header( "location:../availablehospitals.php?error=".$error );
		}
		$conn->close();
	}
}
}
