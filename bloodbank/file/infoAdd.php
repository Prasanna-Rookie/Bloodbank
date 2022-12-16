<?php
require 'connection.php';
session_start();
// if (!isset($_SESSION['hid'])) {
// 	header('location:login.php');
// } else {
// 	if (isset($_POST['add'])) {
// 		$hid = $_SESSION['hid'];
// 		$bg = $_POST['bg'];
// 		$unit = $_POST['unit'];
// 		$check_data = mysqli_query($conn, "SELECT hid FROM bloodinfo where hid='$hid' && bg='$bg'");
// 		if(mysqli_num_rows($check_data)){
// 				while($row=$check_data->fetch_assoc()){
// 					$units = $row["units"] + $unit;
// 				}
// 			}
// 			$check_data = mysqli_query($conn,"UPDATE bloodinfo SET units='$units' WHERE hid='$hid' && bg='$bg'");
// 			// $error = 'You have already added this blood sample.';
// 			// header("location:../bloodinfo.php?error=" . $error);
// 			header("Location: ../bloodinfo.php");
// 		} else {
// 			$sql = "INSERT INTO bloodinfo (bg, hid, units) VALUES ('$bg', '$hid', $unit)";
// 			// if ($conn->query($sql) === TRUE) {
// 			// 	$msg = "You have added record successfully.";
// 			// 	header("location:../bloodinfo.php?msg=" . $msg);
// 			// } else {
// 			// 	$error = "Error: " . $sql . "<br>" . $conn->error;
// 			// 	header("location:../bloodinfo.php?error=" . $error);
// 			// }
// 			$conn->close();
// 			header("Location: ../bloodinfo.php");
// 		}
// 	}

if(!isset($_SESSION['hid'])){
	header('location: login.php');
}else{
	if(isset($_POST['add'])){
		$hid = $_SESSION['hid'];
		$bg = $_POST['bg'];
		$unit = $_POST['unit'];

		if($resunits=$conn->query("SELECT * FROM bloodinfo WHERE hid='$hid' && bg='$bg'")){
			if(mysqli_num_rows($resunits)>0){
				while($row=$resunits->fetch_assoc()){
					$units = $row["units"] + $unit;
				}
				$check_data = mysqli_query($conn,"UPDATE bloodinfo SET units='$units' WHERE hid='$hid' && bg='$bg'");
				$msg = "You have updated record successfully.";
				header("location:../bloodinfo.php?msg=" . $msg);
			}else{
				$insert = "INSERT INTO bloodinfo(hid,bg,units) VALUES($hid,'$bg',$unit)";
				$conn->query($insert);
				$msg = "You have added record successfully.";
				header("location:../bloodinfo.php?msg=" . $msg);
			}
			
			
		}
	}
}
