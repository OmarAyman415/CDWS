<?php
	$connect = mysqli_connect("localhost","root","","cdws") or die("Connection Failed");
	if( isset($_POST['submit'])){
		$username=$_POST['email'];
		$password=$_POST['password'];
		$query= 'select * from login where EMAIL="'. $username .'" and PASSWORD ="'.$password .'"';
		$result=mysqli_query($connect,$query);
		$count = mysqli_num_rows($result);
		if($count)
		{
			header('Location:../../Admin/approval/ApprovalPage.php');
		}
		else
		{
			echo"login not successful";
		}
	}
?>
