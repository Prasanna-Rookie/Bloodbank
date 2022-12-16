<?php
session_start();
require 'file/connection.php';
// if (isset($_GET['search'])) {
//     $searchKey = $_GET['search'];
//     $sql = "select bloodinfo.*, donors.* from bloodinfo, donors where bloodinfo.hid=donors.id && bg LIKE '%$searchKey%'";
// }

    $sql = "select*from donors";

$result = mysqli_query($conn, $sql);
 
?>

<!DOCTYPE html>
<html>
<?php $title = "Bloodbank | Available donor"; ?>
<?php require 'head.php'; ?>

<body>
    <?php require 'header.php'; ?>
    <div class="container cont">

        <?php require 'message.php'; ?>

        <!-- <div class="row col-lg-8 col-md-8 col-sm-12 mb-3">
            <form method="get" action="" style="margin-top:-20px; ">
                <label class="font-weight-bolder">Select Blood Group:</label>
                <select name="search" class="form-control">
                    <option><?php echo @$_GET['search']; ?></option>
                    <option value="A+">A+</option>
                    <option value="A-">A-</option>
                    <option value="B+">B+</option>
                    <option value="B-">B-</option>
                    <option value="AB+">AB+</option>
                    <option value="AB-">AB-</option>
                    <option value="O+">O+</option>
                    <option value="O-">O-</option>
                </select><br>
                <a href="abs1.php" class="btn btn-info mr-4"> Reset</a>
                <input type="submit" name="submit" class="btn btn-info" value="search">
            </form>
        </div> -->

        <table class="table table-responsive table-striped rounded mb-5">
            <tr>
                <th colspan="7" class="title">Available Donors</th>
            </tr>
            <tr>
                <th>#</th>
                <th>Donor Name</th>
                <th>Donor City</th>
                <th>Donor Email</th>
                <th>Donor Phone</th>
                <th>Blood Group</th>
                <!-- <th>Action</th> -->
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

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                <tr>
                    <td><?php echo ++$counter; ?></td>
                    <td><?php echo $row['dname']; ?></td>
                    <td><?php echo $row['dcity']; ?></td>
                    <td><?php echo $row['demail']; ?></td>
                    <td><?php echo $row['dphone']; ?></td>
                    <td><?php echo $row['dbg']; ?></td>


                    <!-- <?php
                    $bid = $row['bid'];
                    $hid = $row['hid'];
                    $bg = $row['rbg'];
                    ?>
                    <form action="file/request1.php" method="post">
                        <input type="hidden" name="bid" value="<?php echo $bid; ?>">
                        <input type="hidden" name="hid" value="<?php echo $hid; ?>">
                        <input type="hidden" name="bg" value="<?php echo $bg; ?>">
                        <?php if (isset($_SESSION['hid'])) { ?>
                            <td><a href="javascript:void(0);" class="btn btn-info hospital">Donate Sample</a></td>
                        <?php } else {
                            (isset($_SESSION['hid']))  ?>
                            <td><input type="submit" name="request1" class="btn btn-info" value="Donate Sample"></td>
                        <?php } ?> -->
                    </form>
                </tr>
            <?php } ?>
        </table>
    </div>

</body>

<script type="text/javascript">
    $('.hospital').on('click', function() {
        alert("Hospital user can't request for blood.");
    });
</script>