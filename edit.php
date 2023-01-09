<?php 
session_start();
if(!isset($_SESSION['user']))
{
	header("location:index.php");
}
$id=$_REQUEST['id'];
$con=mysqli_connect("localhost","root","","ajax");
$qry=mysqli_query($con,"select * from user where id='$id'");
$row=mysqli_fetch_array($qry);
extract($row);
$qualification=explode(",", $qualification);
?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>

<div id="msg"></div>
<table class="table" style="width: 500px;">
	<form method="post" action="">
		<input type="hidden" name="id" value="<?php echo $id; ?>">
		<tr>
			<td>Name : </td><td><input type="text" name="name" class="form-control" value="<?php echo $name ?>"></td>
		</tr>
		<tr>
			<td>Email : </td><td><input type="text" name="email" class="form-control" value="<?php echo $email ?>"></td>
		</tr>
		<tr>
			<td>Mobile : </td><td><input type="text" name="mobile" class="form-control" value="<?php echo $mobile ?>"></td>
		</tr>
		<tr>
			<td>Gender</td>
			<td>
				<input type="radio" name="gender" value="male" <?php echo $gender=='male' ? 'checked' : '' ?> >Male
				<input type="radio" name="gender" value="female" <?php echo $gender=='female' ? 'checked' : '' ?> >Female
			</td>
		</tr>

		<tr>
			<td>Qualification : </td>
			<td>
				<input type="checkbox" name="qualification[]" value="mca"
				<?php 
				if(in_array("mca", $qualification))
				{
					echo "checked";
				}
				?>
				>MCA

				<input type="checkbox" name="qualification[]" value="bca"
				<?php 
				if(in_array("bca", $qualification))
				{
					echo "checked";
				}
				?>
				>BCA

				<input type="checkbox" name="qualification[]" value="b.tech"
				<?php 
				if(in_array("b.tech", $qualification))
				{
					echo "checked";
				}
				?>
				>B.Tech
			</td>
		</tr>


		<tr>
			<td><input type="submit" name="update" value="update" id="update" class="btn btn-info"></td>
		</tr>
	</form>
</table>
<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script>
	$("#update").click(function(e){
		e.preventDefault();
		$.ajax({
			url : 'update.php',
			type: 'POST',
			data: new FormData($('form')[0]),
			contentType:false,
			cache:false,
			processData:false,
			success:function(data)
			{
				console.log(data);
				$("#msg").html('Data update successfully');
			}
		});
	});
</script>