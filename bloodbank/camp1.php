 <?php
session_start();
if (isset($_SESSION['cid'])) {
  header("location:bloodrequest.php");
} elseif (isset($_SESSION['rid'])) {
  header("location:sentrequest.php");
} else {
?> -->
  <!DOCTYPE html>
  <html>
  <?php $title = "Bloodbank | Register"; ?>
  <?php require 'head.php'; ?>

  <body>
    <?php include 'header.php'; ?>

    <div class="container cont">

      <?php require 'message.php'; ?>

      <div class="row justify-content-center">
        <div class="col-lg-4 col-md-5 col-sm-6 col-xs-7 mb-5">
          <div class="card rounded">
            <ul class="nav nav-tabs justify-content-center bg-light" style="padding: 20px">
              <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#camp">Upadate Camp Details</a>
              </li>
                                             
            </ul>

            <div class="tab-content">

              <div class="tab-pane container active" id="camp">

                <form action="file/campup.php" method="post" enctype="multipart/form-data">
                  <input type="text" name="hname" placeholder="Hospital Name" class="form-control mb-3" required>
                  <input type="tel"  name="cphone" placeholder="Incharger contact" class="form-control mb-3" maxlength="10" required>
                  <input type="date"  name="cdate" placeholder="camp date" class="form-control mb-3" required>
                  <input type="time"  name="ctime" placeholder="camp time" class="form-control mb-3" required>
                  <input type="text" name="caddress" placeholder="camp venue" class="form-control mb-3" required>
                  <input type="submit" name="cupdate" value="update" class="btn btn-primary btn-block mb-4">
                </form>
              </div>
             
            <!-- </div>
            <a href="login.php" class="text-center mb-4" title="Click here">Already have account?</a>
          </div> -->
        </div>
      </div>
    </div>

  </body>

  </html>
 <?php } ?> 