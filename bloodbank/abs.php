<?php
session_start();
require 'file/connection.php';
if (isset($_GET['search'])) {
    $searchKey = $_GET['search'];
    $sql = "select bloodinfo.*, hospitals.* from bloodinfo, hospitals 
    where bloodinfo.hid=hospitals.id and bg = '$searchKey'";
} else {
    $sql = "select bloodinfo.*, hospitals.*  from bloodinfo , hospitals where bloodinfo.hid=hospitals.id";
}
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

        <div class="row col-lg-8 col-md-8 col-sm-12 mb-3">
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
                <a href="abs.php" class="btn btn-info mr-4"> Reset</a>
                <input type="submit" name="submit" class="btn btn-info" value="search">
            </form>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-1"></div>
            <div class="col-6">
                <table class="table table-responsive table-striped rounded mb-5">
                    <tr>
                        <th colspan="8" class="title">Available Blood Samples</th>
                    </tr>
                    <tr>
                        <th>#</th>
                        <th>Hospital Name</th>
                        <th>Hospital City</th>
                        <th>Hospital Email</th>
                        <th>Hospital Phone</th>
                        <th>Blood Group</th>
                        <th>Stocks</th>
                        <th>Action</th>
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
                            <td><?php echo ($row['hcity']); ?></td>
                            <td><?php echo ($row['hemail']); ?></td>
                            <td><?php echo ($row['hphone']); ?></td>
                            <td><?php echo ($row['bg']); ?></td>
                            <td><?php echo $row["units"]; ?></td>
                            <td><a href="abs.php?units=<?php echo $row["bid"]; ?>" class="btn btn-success">Request</a></td>

                            <?php $bid = $row['bid']; ?>
                            <?php $hid = $row['hid']; ?>
                            <?php $bg = $row['bg']; ?>

                        </tr>

                    <?php } ?>
                </table>
            </div>


            <?php
            if (isset($_GET["units"])) {
            ?>
                <div class="col-3">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Blood request</h3>
                        </div>
                        <form action="file/request.php" method="post">
                            <div class="card-body">
                                <label for="unit">Enter the unit</label>
                                <div class="input-group">
                                    <input type="number" name="unit" id="unit" class="form-control" placeholder="Enter the unit">
                                </div>
                            </div>
                            <div class="card-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>

                                <?php
                                $bid = $_GET["units"];
                                $res = $conn->query("SELECT * FROM bloodinfo WHERE bid=$bid");
                                if (mysqli_num_rows($res) > 0) {
                                    while ($row = $res->fetch_assoc()) {
                                        $hid = $row["hid"];
                                        $bg = $row["bg"];
                                    }
                                }
                                ?>


                                <input type="hidden" name="bid" value="<?php echo $bid; ?>">
                                <input type="hidden" name="hid" value="<?php echo $hid; ?>">
                                <input type="hidden" name="bg" value="<?php echo $bg; ?>">

                                <?php if (isset($_SESSION['hid'])) { ?>
                                    <td><a href="javascript:void(0);" class="btn btn-info hospital">Request Sample</a></td>
                                <?php } else {
                                    (isset($_SESSION['rid']))  ?>
                                    <td><input type="submit" name="request" class="btn btn-info" value="Request Sample"></td>
                                <?php } ?>
                            </div>
                        </form>
                    </div>
                </div>
            <?php
            }
            ?>

        </div>
    </div>
</body>

<script type="text/javascript">
    $('.hospital').on('click', function() {
        alert("Hospital user can't request for blood.");
    });
</script>