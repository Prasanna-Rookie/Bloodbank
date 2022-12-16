<?php
require 'file/connection.php';
session_start();
if (!isset($_SESSION['did'])) {
	header('location:login.php');
} else {
	$did = $_SESSION['did'];
	$sql = "select donorrequest.*, donors.* from donorrequest, donors where did='$did' && donorrequest.hid=donors.id";
	$result = mysqli_query($conn, $sql);
?>

	<!DOCTYPE html>
	<html>
	<?php $title = "Bloodbank | Sent Requests"; ?>
	<?php require 'head.php'; ?>

	<body>
		<?php require 'header.php'; ?>
		<div class="container cont">

			<?php require 'message.php'; ?>

			<table class="table table-responsive table-striped rounded mb-5">
				<tr>
					<th colspan="8" class="title">Sent requests</th>
				</tr>
				<tr>
					<th>#</th>
					<th>Name</th>
					<th>Email</th>
					<th>City</th>
					<th>Phone</th>
					<th>Blood Group</th>
					<th>Status</th>
					<th>Action</th>
				</tr>

				<div>
					<?php
					if ($result) {
						$row = mysqli_num_rows($result);
						if ($row) { //echo "<b> Total ".$row." </b>";
						} else echo '<b style="color:white;background-color:red;padding:7px;border-radius: 15px 50px;">You have not requested yet. </b>';
					}
					?>
				</div>

				<?php while ($row = mysqli_fetch_array($result)) { ?>

					<tr>
						<td><?php echo ++$counter; ?></td>
						<td><?php echo $row['dname']; ?></td>
						<td><?php echo $row['demail']; ?></td>
						<td><?php echo $row['dcity']; ?></td>
						<td><?php echo $row['dphone']; ?></td>
						<td><?php echo $row['dbg']; ?></td>
						<td><?php echo $row['status']; ?></td>
						<td><?php if ($row['status'] == 'Accepted') { ?>
							<?php } else { ?>
								<a href="file/cancel.php?reqid=<?php echo $row['reqid']; ?>" class="btn btn-danger">Cancel</a>
							<?php } ?>
						</td>
					</tr>
				<?php } ?>
			</table>
		</div>

	</body>

	</html>
<?php } ?>