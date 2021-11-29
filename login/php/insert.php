<?php
	$connect = mysqli_connect("localhost","root","","cdws") or die("Connection Failed");
	//if($connect->connect_error){
		//die('connection Failed : '. $connect->connect_error);
	//}
	//else{
		echo 3;
	if( isset($_POST['submit'])){
		$username=$_POST['email'];
		$password=$_POST['password'];
		$query= 'select * from login where EMAIL="'. $username .'" and PASSWORD ="'.$password .'"';
		$result=mysqli_query($connect,$query);
		$count = mysqli_num_rows($result);
		echo $count;
		if($count)
		{
			header('Location:../../Admin/approval/index.html');
		}
		else
		{
			echo"login not successful";
		}
	}
	//}
?>
