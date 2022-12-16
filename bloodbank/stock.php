<?php
require 'file/connection.php';
session_start();
if (!isset($_SESSION['hid'])) {
    header('location:login.php');
} else {
?>
    <!DOCTYPE html>
    <html>
    <?php $title = "Bloodbank | Add blood samples"; ?>
    <?php require 'head.php'; ?>

    <body>
        <?php require 'header.php'; ?>

        <div class="container cont">

            <?php require 'message.php'; ?>

            <?php
            $res = $conn->query("SELECT * FROM hospitals");
            $rows = mysqli_num_rows($res);

            $hid = $_SESSION['hid'];

            if ($_SESSION['hid'] === $hid) {
            ?>
                <div class="col-lg-9">
                    <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-5">
                            <div class="card">
                                <div class="card-header text-center">A+</div>
                                <div class="card-body text-center">
                                    <?php
                                    $sql = "SELECT * FROM bloodinfo WHERE bg='A+' AND hid=$hid";
                                    $res = $conn->query($sql);

                                    if (mysqli_num_rows($res) > 0) {
                                        while ($row = mysqli_fetch_array($res)) {
                                            echo "Available units : " .  $row['units'];
                                        }
                                    } else {
                                        echo "available units : 0";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-5">
                            <div class="card">
                                <div class="card-header text-center">A-</div>
                                <div class="card-body text-center">
                                    <?php
                                    $sql = "SELECT * FROM bloodinfo WHERE bg='A-' AND hid=$hid";
                                    $res = $conn->query($sql);

                                    if (mysqli_num_rows($res) > 0) {
                                        while ($row = mysqli_fetch_array($res)) {
                                            echo "Available units :" .  $row['units'];
                                        }
                                    } else {
                                        echo "available units : 0";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-5">
                            <div class="card">
                                <div class="card-header text-center">B+</div>
                                <div class="card-body text-center">
                                    <?php
                                    $sql = "SELECT * FROM bloodinfo WHERE bg='B+' AND hid=$hid";
                                    $res = $conn->query($sql);

                                    if (mysqli_num_rows($res) > 0) {
                                        while ($row = mysqli_fetch_array($res)) {
                                            echo "Available units : ".$row['units'];
                                        }
                                    } else {
                                        echo "available units : 0";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-5">
                            <div class="card">
                                <div class="card-header text-center">B-</div>
                                <div class="card-body text-center">
                                    <?php
                                    $sql = "SELECT * FROM bloodinfo WHERE bg='B-' AND hid=$hid";
                                    $res = $conn->query($sql);

                                    if (mysqli_num_rows($res) > 0) {
                                        while ($row = mysqli_fetch_array($res)) {
                                            echo "Available units : " .  $row['units'];
                                        }
                                    } else {
                                        echo "available units : 0";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-5">
                            <div class="card">
                                <div class="card-header text-center">AB+</div>
                                <div class="card-body text-center">
                                    <?php
                                    $sql = "SELECT * FROM bloodinfo WHERE bg='AB+' AND hid=$hid";
                                    $res = $conn->query($sql);

                                    if (mysqli_num_rows($res) > 0) {
                                        while ($row = mysqli_fetch_array($res)) {
                                            echo "Available units : " .  $row['units'];
                                        }
                                    } else {
                                        echo "available units : 0";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-5">
                            <div class="card">
                                <div class="card-header text-center">AB-</div>
                                <div class="card-body text-center">
                                    <?php
                                    $sql = "SELECT * FROM bloodinfo WHERE bg='AB-' AND hid=$hid";
                                    $res = $conn->query($sql);
                                    
                                    if (mysqli_num_rows($res) > 0) {
                                        while ($row = mysqli_fetch_array($res)) {
                                            echo "Available units : " .  $row['units'];
                                          
                                        }
                                    } else {
                                        echo "available units : 0";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-5">
                            <div class="card">
                                <div class="card-header text-center">O+</div>
                                <div class="card-body text-center">
                                    <?php
                                    $sql = "SELECT * FROM bloodinfo WHERE bg='O+' AND hid=$hid";
                                    $res = $conn->query($sql);

                                    if (mysqli_num_rows($res) > 0) {
                                        while ($row = mysqli_fetch_array($res)) {
                                            echo "Available units : " .  $row['units'];
                                        }
                                    } else {
                                        echo "available units : 0";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-5">
                            <div class="card">
                                <div class="card-header text-center">O-</div>
                                <div class="card-body text-center">
                                    <?php
                                    $sql = "SELECT * FROM bloodinfo WHERE bg='O-' AND hid=$hid";
                                    $res = $conn->query($sql);

                                    if (mysqli_num_rows($res) > 0) {
                                        while ($row = mysqli_fetch_array($res)) {
                                            echo "Available units : " .  $row['units'];
                                        }
                                    } else {
                                        echo "available units : 0";
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-12 mb-5">
                        <div class="card">
                            <div class="card-header text-center">Admin contact</div>
                            <div class="card-body">
                                <i class="fa fa-envelope"> </i> <a> bloodbank@gmail.com</a><br><br>
                                <i class="fa fa-mobile"> </i> <a> +91 9876543210</a><br><br>
                            </div>
                        </div>
                    </div> -->
                    </div>
                </div>
            <?php
            }
            ?>


        </div>
        <?php require 'footer.php' ?>
    </body>
<?php } ?>