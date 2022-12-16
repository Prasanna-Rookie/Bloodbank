<?php

require 'file/connection.php';
session_start();

     $sql = "select * from hospitals ";
    $result = mysqli_query($conn, $sql);
  
// if (isset($_GET['search'])) {
//     $searchKey = $_GET['search'];
//     $sql = "select bloodinfo.*, donors.* from bloodinfo, donors where bloodinfo.hid=donors.id && bg LIKE '%$searchKey%'";
// }
    // $sql = "SELECT h.id FROM hospitals AS h INNER JOIN donors AS dr ON h.id = dr.dbg";
 
?>

<!DOCTYPE html>
<html>
<?php $title = "Bloodbank | Available Hospitals"; ?>
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
                <th colspan="7" class="title">Available Hospitals</th>
            </tr>
            <tr>
                <th>#</th>
                <th>Hospitals Name</th>
                <th> Hospitals City</th>
                <th>Hospitals Email</th>
                <th>Hospitals Phone</th>
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

            <?php while ($row = mysqli_fetch_assoc($result)) { ?>

                <tr>
                    <td><?php echo ++$counter; ?></td>
                    <td><?php echo $row['hname']; ?></td>
                    <td><?php echo $row['hcity']; ?></td>
                    <td><?php echo $row['hemail']; ?></td>
                    <td><?php echo $row['hphone']; ?></td>

                    <?php $hid = $row['id']; ?>

                    <input type="hidden" name="hid" value="<?php echo $hid; ?>">
                    
                    <td><a href="./availablehospitals.php?hospitals=<?php echo $hid; ?>" class="btn btn-success" data-target="#modal" data-toggle="modal">Request</a></td>

                    
                        
                 </tr>
            <?php } ?>
        </table>
    </div>
    <div class="modal fade" id="modal" data-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Blood request</h3>
                    </div>
                    <form action="file/request1.php" method="post">  
                    <div class="card-body">
                            <label for="dbg">Enter the Blood Group</label>
						<select class="form-control mb-3" name="dbg" id="dbg" required>
                             <option>A-</option>
                             <option>A+</option>
                             <option>B-</option>
                             <option>B+</option>
                             <option>AB-</option>
                             <option>AB+</option>
                             <option>O-</option>
                             <option>O+</option>
                        </select>
                        </div>
                        <div class="card-footer">
                            <button type="button" class="btn btn-danger" data-dismiss="modal">cancel</button>
                            
                            <?php if (isset($_SESSION['hid'])) { ?>
                            <td><a href="javascript:void(0);" class="btn btn-info hospital">Donate Sample</a></td>
                        <?php } else {
                            (isset($_SESSION['hid']))  ?>
                            <td><input type="submit" name="request1" class="btn btn-info" value="Donate Sample"></td>
                        <?php } ?> 
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</body>