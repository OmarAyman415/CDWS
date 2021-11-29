<?php
$username=$_POST['email'];
$password=$_POST['password'];
	$connect=mysqli_connect("localhost","root","12345","cdws") ;  
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
	
?>
