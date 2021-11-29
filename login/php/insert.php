<?php
	define("DB_HOST", "localhost");
    define("DB_USER", "root");
    define("DB_PASSWORD", "@#Omar415");
    define("DB_DATABASE", "cdws");
	$connect = mysqli_connect(DB_HOST,DB_USER,"",DB_DATABASE,);
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
