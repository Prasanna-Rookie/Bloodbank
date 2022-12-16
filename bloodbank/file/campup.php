<?php
require 'connection.php';
if(isset($_POST['cupdate'])){
	$hname=$_POST['hname'];
	$cphone=$_POST['cphone'];
	$caddress=$_POST['caddress'];
	$cdate=$_POST['cdate'];
	$ctime=$_POST['ctime'];
// 	if(mysqli_num_rows($check_email) > 0){
//     $error= 'Email Already exists. Please try another Email.';
//     header( "location:../camp1.php?error=".$error );
// }else{
	{
	$sql = "INSERT INTO camp(hname, cphone,caddress,cdate,ctime)
	VALUES ('$hname','$cphone', '$caddress', '$cdate', '$ctime')";
	if ($conn->query($sql) === TRUE) {
		$msg = 'You have successfully updated.';
		header( "location:../camp1.php?msg=".$msg );
	} else {
		$error = "Error: " . $sql . "<br>" . $conn->error;
        header( "location:../camp1.php?error=".$error );
	}
	$conn->close();
}
}
?>