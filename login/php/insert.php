<?php
	$connect = mysqli_connect("localhost","root","","cdws") or die("Connection Failed");
	if( isset($_POST['submit'])){
		$username=$_POST['email'];
		$password=$_POST['password'];
		//query that request all login records that matches that entered login data
		$query= 'select * from login where EMAIL="'. $username .'" and PASSWORD ="'.$password .'"';

		//Excute the query
		$result=mysqli_query($connect,$query);

		//record fetched from the database
		$count = mysqli_num_rows($result);
		
		//if Username and password are correct then go to approval page
		if($count){
			header('Location:../../bq/approval/ApprovalPage.php');
		}
		//else show message that they are incorrect
		else{
			echo '<script>alert("Wrong Username or password")</script>';
			header('Location:../index.html');
		}
	}
?>
