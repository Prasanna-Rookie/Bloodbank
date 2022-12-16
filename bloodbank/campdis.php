<?php
session_start();
require 'file/connection.php';
$sql="SELECT cid,hname,cphone,caddress,cdate,ctime FROM camp";

$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<?php $title = "Bloodbank | Available Blood Samples"; ?>
<?php require 'head.php'; ?>

<body>
    <?php require 'header.php'; ?>
    <div class="container cont">

        <?php require 'message.php'; ?>

     
        <table class="table table-responsive table-striped rounded mb-5">
            <tr>
                <th colspan="8" class="title">Available Blood Samples</th>
            </tr>
            <tr>
                <th>#</th>
                <th>Hospital Name</th>
                <th>Address</th>
                <th>Incharger contact</th>
                <th>Camp date</th>
                <th>CAMP TIMING</th>
                
            </tr>
            <div>
                <?php
                if ($result) {
                    $row = mysqli_num_rows($result);
                    if ($row) { //echo "<b> Total ".$row." </b>";
                    } else echo '<b style="color:white;background-color:red;padding:7px;border-radius: 15px 50px;">Nothing to show.</b>';
                }
                ?>
            </div>

            <?php while ($row = mysqli_fetch_array($result)) { ?>

                <tr>
                    <td><?php echo ++$counter; ?></td>
                    <td><?php echo $row['hname']; ?></td>
                    <td><?php echo ($row['caddress']); ?></td>
                    <td><?php echo ($row['cphone']); ?></td>
                    <td><?php echo ($row['cdate']); ?></td>
                    <td><?php echo ($row['ctime']); ?></td>




                    
                </tr>

            <?php } ?>
        </table>
    </div>


    <!-- modal for blood request -->
            
</body>

