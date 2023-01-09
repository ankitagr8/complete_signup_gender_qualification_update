<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Home</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.slim.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>
<div class="container">
	<div class="row">
		<div class="col-xl-6">
			<div id="msg"></div>
			<form id="signup-form" method="post" enctype="multipart/form-data">
				<div class="form-group">
					<label>Name : </label>
					<input type="text" name="name" id="name" class="form-control">
				</div>
				<div class="form-group">
					<label>Email : </label>
					<input type="text" name="email" class="form-control">
				</div>
				<div class="form-group">
					<label>Password : </label>
					<input type="text" name="password" class="form-control">
				</div>
				<div class="form-group">
					<label>Mobile : </label>
					<input type="text" name="mobile" class="form-control">
				</div>
				<div class="form-group">
					<label>Gender : </label>
					<input type="radio" name="gender" value="male">Male
					<input type="radio" name="gender" value="female">Female
				</div>
				<div class="form-group">
					<label>Qualification : </label>
					<input type="checkbox" name="qualification[]" value="mca">MCA
					<input type="checkbox" name="qualification[]" value="bca">BCA
					<input type="checkbox" name="qualification[]" value="b.tech">B.Tech
				</div>
				<div class="form-group">
					<label>Image : </label>
					<input type="file" name="pic" class="form-control">
				</div>
				<div class="form-group">
					<label>Country : </label>
					<select name="country" class="form-control">
						<option value="">Select Country</option>
						<option value="india">India</option>
						<option value="usa">USA</option>
						<option value="uk">UK</option>
						<option value="japan">Japan</option>
					</select>
				</div>
				<input type="submit" name="save" value="Save" id="save" class="btn btn-info">
			</form>
		</div>




		<!-- login start  -->
		<div class="col-xl-5" style="margin-left: 80px;">
			<div>
			<?php  
				session_start();
				if(isset($_SESSION["error"])){
	                echo $_SESSION["error"]; 
	                unset($_SESSION["error"]);
	            }
			?>
			</div>
			<form method="post" action="login.php">
				<div class="form-group">
					<label>Email : </label>
					<input type="text" name="email" class="form-control">
				</div>
				<div class="form-group">
					<label>Password : </label>
					<input type="text" name="password" class="form-control">
				</div>
				<input type="submit" name="login" value="Login" class="btn btn-success">
			</form>
		</div>
		<!-- login end  -->
	</div>
</div>

<script src="https://code.jquery.com/jquery-3.6.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script>

		
			$("#signup-form").validate({
				rules : {
					name : {
						required : true,
					},
					email : {
						required : true,
					},
					password : {
						required : true,
					},
					mobile : {
						required : true,
					},
					country : {
						required : true,
					},
					pic : {
						required :true,
					}
				},

				submitHandler: function(form) {
					save();
		        }

			});

			function save()
			{
				$.ajax({
					url : 'signup.php',
					type : 'POST',
					// async: false,
					data : new FormData($('form')[0]),
					contentType:false,
					cache:false,
					processData:false,
					success:function(data)
					{
						console.log(data);
						$("#msg").html('Data Saved Successfully');
					}
				});
			}
		

</script>
</body>
</html>