<!-- donor request form -->
<?php
session_start();
require 'file/connection.php';
// if (isset($_GET['search'])) {
//     $searchKey = $_GET['search'];
//     $sql = "select bloodinfo.*, hospitals.* from bloodinfo, hospitals where bloodinfo.hid=hospitals.id && bg LIKE '%$searchKey%'";
// } else {
    
// }
// $sql = "select bloodinfo.*, hospitals.*  from bloodinfo, hospitals where bloodinfo.hid=hospitals.id";
$sql = "select * from hospitals";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html>
<?php $title = "Bloodbank | Available "; ?>
<?php require 'head.php'; ?>

<body>
    <?php require 'header.php'; ?>
    <div class="container cont">

        <?php require 'message.php'; ?>

       



        <table class="table table-responsive table-striped rounded mb-5">
            <tr>
                <th colspan="8" class="title">Available Hospitals</th>
            </tr>
            <tr>
                <th>#</th>
                <th>Hospital Name</th>
                <th>Hospital City</th>
                <th>Hospital Email</th>
                <th>Hospital Phone</th>
                <!-- <th>Blood Group</th> -->
                <!-- <th>Stocks</th> -->
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

            <!-- <?php while ($row = mysqli_fetch_array($result)) { ?> 

                <tr>
                    <td><?php echo ++$counter; ?></td>
                    <td><?php echo $row['hname']; ?></td>
                    <td><?php echo ($row['hcity']); ?></td>
                    <td><?php echo ($row['hemail']); ?></td>
                    <td><?php echo ($row['hphone']); ?></td>
                    <!-- <td><?php echo ($row['bg']); ?></td> -->
                    <td><button class="btn btn-success" data-target="#modal" data-toggle="modal">Request sample</button></td>


                    <?php $bid = $row['bid']; ?>
                    <?php $hid = $row['hid']; ?>
                    <?php $bg = $row['bg']; ?>
                    <form action="file/request.php" method="post">
                        <input type="hidden" name="bid" value="<?php echo $bid; ?>">
                        <input type="hidden" name="hid" value="<?php echo $hid; ?>">
                        <input type="hidden" name="bg" value="<?php echo $bg; ?>">

                        <!-- <?php if (isset($_SESSION['hid'])) { ?>
                            <td><a href="javascript:void(0);" class="btn btn-info hospital">Request Sample</a></td>
                        <?php } else {
                            (isset($_SESSION['rid']))  ?>
                            <td><input type="submit" name="request" class="btn btn-info" value="Request Sample"></td>
                        <?php } ?> -->

                    </form>
                </tr>

            <?php } ?> -->
        </table>
    </div>


    <!-- modal for blood request -->
    <div class="modal fade" id="modal" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Blood request</h3>
                    </div>
                    <div class="card-body">
                        <!-- <label for="unit">Enter the unit</label> -->
                        <!-- <div class="input-group">
                            <input type="number" name="unit" id="unit" class="form-control" placeholder="Enter the unit">
                        </div> -->
                        <form action="file/donorrequest.php" method="post">
                        <label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Donor Name</label>
						<input type="text" name="dname" value="" class="form-control mb-3" required>
						<label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Donor Email</label>
						<input type="email" name="demail" value="" class="form-control mb-3" required>
						<label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Donor Password</label>
						<input type="text" name="dpassword" value="" class="form-control mb-3" required minlength="6">
						<label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Donor Phone Number</label>
						<input type="text" name="dphone" value="" class="form-control mb-3" required>
						<label class="text-muted font-weight-bold" class="text-muted font-weight-bold">Donor City</label>
						<input type="text" name="dcity" value="" class="form-control mb-3" required>
						<label class="text-muted font-weight-bold" class="text-muted font-weight-bold">
                            Donor Blood Group</label>
						<select class="form-control mb-3" name="bg" required>
                             <!-- <option selected><?php echo $row['dbg']; ?></option> -->
                             <option>A-</option>
                             <option>A+</option>
                             <option>B-</option>
                             <option>B+</option>
                             <option>AB-</option>
                             <option>AB+</option>
                             <option>O-</option>
                             <option>O+</option>
                        </select>
                         <input type="submit" name="update" class="btn btn-block btn-primary" value="request">
					   </form>
					</div>
					<!-- <a href="index.php" class="text-center">Cancel</a><br> -->
                    <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
				</div>
                    </div>
                    <div class="card-footer">
                        <!-- <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button> -->
                    <!-- </div>
                </div> -->
            </div>
        </div>
    </div>
</body>

