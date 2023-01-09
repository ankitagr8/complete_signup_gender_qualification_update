<?php 
session_start();
if(!isset($_SESSION['user']))
{
	header("location:index.php");
}
$email=$_SESSION["user"];
$con=mysqli_connect("localhost","root","","ajax");
$qry=mysqli_query($con,"select * from user where email='$email'");
$row=mysqli_fetch_array($qry);
extract($row);
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
<table class="table" style="width: 500px; border: 1px solid black;">
	<tr>
		<td rowspan="6"><img src="img/<?php echo $pic; ?>"></td>
	</tr>
	<tr>
		<td>Name</td><td><?php echo $name; ?></td>
	</tr>
	<tr>
		<td>Email</td><td><?php echo $email; ?></td>
	</tr>
	<tr>
		<td>Mobile</td><td><?php echo $mobile; ?></td>
	</tr>
	<tr>
		<td>Gender : </td><td><?php echo $gender; ?></td>
	</tr>
	<tr>
		<td>Qualification : </td><td><?php echo $qualification; ?></td>
	</tr>
	<tr>
		<td><a href="edit.php?id=<?php echo $id ?>" class="btn btn-success">Edit</a></td>
	</tr>
</table>
