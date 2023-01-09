<?php 
if(isset($_REQUEST['login']))
{
	$email=$_REQUEST["email"];
	$password=$_REQUEST["password"];
	$con=mysqli_connect("localhost","root","","ajax");
	$qry=mysqli_query($con,"select * from user where email='$email' and password='$password'");
	$row=mysqli_fetch_array($qry);
	if($row)
	{
		session_start();
		$_SESSION['user']=$email;
		header("location:profile.php");
	}
	else
	{
		session_start();
		$_SESSION['error']="Login Field";

		header("location:index.php");
	}
}

?>