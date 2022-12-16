<?php
include "connection.php";
$reqid = $_GET['reqid'];
$status = "Rejected";
$sql = "update bloodrequest SET status = '$status' WHERE reqid = '$reqid'";
if (mysqli_query($conn, $sql)) {

    $res = $conn->query("SELECT * FROM bloodrequest WHERE reqid=$reqid");
    if (mysqli_num_rows($res) > 0) {
        while ($row = $res->fetch_assoc()) {
            $unit = $row["unit"];
            $hid = $row["hid"];
            $bg = $row["bg"];
        }
    }

    $bloodinfo = $conn->query("SELECT * FROM bloodinfo WHERE hid=$hid AND bg='$bg'");
    if (mysqli_num_rows($bloodinfo) > 0) {
        while ($row = $bloodinfo->fetch_assoc()) {
            $remunit = $row["units"];
        }
    }

    $addedunit = $remunit + $unit;
    $conn->query("UPDATE bloodinfo SET units=$addedunit WHERE hid=$hid AND bg='$bg'");

    $msg = "You have Rejected the request.";
    header("location:../bloodrequest.php?msg=" . $msg);
} else {
    $error = "Error changing status: " . mysqli_error($conn);
    header("location:../bloodrequest.php?error=" . $error);
}
mysqli_close($conn);
