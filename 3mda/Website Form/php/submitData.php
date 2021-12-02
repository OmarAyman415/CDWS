<?php
require('../../../Config/Database.php');
	if( isset($_POST['submit'])){
		$personSSN = $_POST['pSSN'];
		$personName = $_POST['pName'];
		$personPhone = $_POST['pPhone'];
		$personEmail = $_POST['pEmail'];
		$adjID = $_POST['rad'];
		$pVisitor = 'DEFAULT(SSNVISITOR)';
		if ($_POST['rad2'] == "1") {
			$pVisitor = $_POST['authSSN'];
		}
		$query = "INSERT INTO persons  VALUES({$personSSN},'{$personName}',{$personPhone},'{$personEmail}',{$adjID},{$pVisitor},DEFAULT(APPROVEN));";
		
		mysqli_query($conn,$query);
		
		$authSSN = NULL;
		$authPhone = NULL;
		$authIdNumber = NULL;
		$authEmail=NULL;
		if ($_POST['rad2'] == "1") {
			$pVisitor = $_POST['authSSN'];
			$authSSN = $_POST['authSSN'];
			$authPhone = $_POST['authPhone'];
			$authIdNumber = $_POST['authIdNumber'];
			$authEmail = $_POST['authEmail'];
			$query = "INSERT INTO authorize VALUES({$authSSN}, '{$authPhone}' , '{$authEmail}' , {$authIdNumber} );";
			mysqli_query($conn,$query);
			
		}
		$foundationName =  $_POST['foundName'];
		$foundationPlace = $_POST['foundPlace'];
		$foundationId = $_POST['rad3'];
		$foundationLic = $_POST['foundLic'];
		$foundationIdRoomNumber = $_POST['foundIdRoomNumber'];
		$query = "INSERT INTO foundation(ssnPerson ,name , place ,foundationId , licenceId ,idNumberRoom) VALUES({$personSSN} , '{$foundationName}' , '{$foundationPlace}' , {$foundationId} , {$foundationLic} , {$foundationIdRoomNumber});";
		mysqli_query($conn,$query);
		header('../Submit Done/index.html');
		// $password=$_POST['password'];
		// $query= 'select * from login where EMAIL="'. $username .'" and PASSWORD ="'.$password .'"';
		// $result=mysqli_query($conn,$query);
		// $count = mysqli_num_rows($result);
		// if($count)
		// {
		// 	header('Location:../../Admin/approval/in.php');
		// }
		// else
		// {
		// 	echo"login not successful";
		// }
	}
?>