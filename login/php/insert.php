<?php

	$connect = mysqli_connect("localhost","root","","cdws");
	if($connect->connect_error){
		die('connection Failed : '. $connect->connect_error);
	}
	else{
	if(!empty($_POST['save'])){
		$username=$_POST['email'];
		$password=$_POST['password'];
		$query="select * from login where username='$username' and password ='$password'";
		$result=mysqli_query($connect,$query);
		$count=mysqli_num_rows($result);
		if($count>0)
		{
			echo"Login Successful";
		}
		else
		{
			echo"login not successful";
		}
	}
	}
?>
