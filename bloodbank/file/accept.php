<?php
include "connection.php";
$reqid = $_GET['reqid'];
$status = "Accepted";
$sql = "update bloodrequest SET status = '$status' WHERE reqid = '$reqid'";
if (mysqli_query($conn, $sql)) {
    $msg = "You have accepted the request.";
    header("location:../bloodrequest.php?msg=" . $msg);
} else {
    $error = "Error changing status: " . mysqli_error($conn);
    header("location:../bloodrequest.php?error=" . $error);
}
$select = $conn->query("select * from bloodrequest where reqid = '$reqid'")
if (mysqli_num_rows($select) > 0){
    while ($row = $select->fetch_assoc){
        $units = $row['unit'];
        

    }
}


mysqli_close($conn);
