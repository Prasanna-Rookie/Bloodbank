<?php
if(isset($_POST['dregister'])){
	require 'connection.php';
	$dname=$_POST['dname'];
	$demail=$_POST['demail'];
	$dpassword=$_POST['dpassword'];
	$dphone=$_POST['dphone'];
	$dcity=$_POST['dcity'];
	$rbg=$_POST['rbg'];
	$check_email = mysqli_query($conn, "SELECT demail FROM donors where demail = '$demail' ");
	if(mysqli_num_rows($check_email) > 0){
    $error= 'Email Already exists. Please try another Email.';
    header( "location:../register.php?error=".$error );
}else{
	$sql = "INSERT INTO donors (dname, demail, dpassword, dphone, dcity, rbg)
	VALUES ('$dname','$demail', '$dpassword', '$dphone', '$dcity', '$rbg')";
	if ($conn->query($sql) === TRUE) {
		$msg = "You have successfully registered. Please, login to continue.";
		header( "location:../login.php?msg=".$msg);
	} else {
		$error = "Error: " . $sql . "<br>" . $conn->error;
        header( "location:../register.php?error=".$error );
	}
	$conn->close();
}
}
?>