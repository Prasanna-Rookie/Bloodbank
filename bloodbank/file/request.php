<?php
session_start();


require 'connection.php';
if (!isset($_SESSION['rid'])) {
	header('location:../login.php');
} else {
	if (isset($_POST['request'])) {
		$hid = $_POST['hid'];
		$rid = $_SESSION['rid'];
		$bg = $_POST['bg'];
		$unit = $_POST['unit'];

		$bid = $_POST["bid"];

		$check_data = mysqli_query($conn, "SELECT reqid FROM bloodrequest where hid='$hid' and rid='$rid'");

		$res = $conn->query("SELECT * FROM bloodinfo WHERE bid=$bid");

		if (mysqli_num_rows($res) > 0) {
			while ($row = $res->fetch_assoc()) {
				$curunit = $row["units"];
			}
		}

		if (mysqli_num_rows($check_data) > 0) {
			$error = 'You have already requested for blood sample from this Hospital.';
			header("location:../abs.php?error=" . $error);
		} else {

			if ($curunit < $unit) {
				$error = 'You entered more than we have';
				header("location:../abs.php?error=" . $error);
			} elseif ($curunit === 0) {
				$error = 'Not available';
				header("location:../abs.php?error=" . $error);
			} else {
				$sql = "INSERT INTO bloodrequest (bg,hid,rid,unit) VALUES ('$bg', '$hid', '$rid',$unit)";
				if ($conn->query($sql) === TRUE) {
					$msg = 'You have requested for blood group ' . $bg . '. Our team will contact you soon.';

					$updatedunit = $curunit - $unit;

					$conn->query("UPDATE bloodinfo SET units=$updatedunit WHERE bid=$bid");
					header("location:../sentrequest.php?msg=" . $msg);
				} else {
					$error = "Error: " . $sql . "<br>" . $conn->error;
					header("location:../abs.php?error=" . $error);
				}
			}

			$conn->close();
		}
	}
}
