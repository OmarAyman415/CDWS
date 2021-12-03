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
		var_dump($_POST);
		//Name file with random number so that similar images don't get replaced
		$NIdFName = rand(1000,10000)."-".$_FILES['NIdF']['name'];
		$NIdBName = rand(1000,10000)."-".$_FILES['NIdB']['name'];
		$PIName = rand(1000,10000)."-".$_FILES['PI']['name'];
		//temporary file name to store file
		$p1 = $_FILES['NIdF']['tmp_name'];
		$p2 = $_FILES['NIdB']['tmp_name'];
		$p3 = $_FILES['PI']['tmp_name'];
		$uploads_dir = '../images';
		//Move uploaded files to specific location
		move_uploaded_file($p1,$uploads_dir.'/'.$NIdFName);
		move_uploaded_file($p2,$uploads_dir.'/'.$NIdBName);
		move_uploaded_file($p3,$uploads_dir.'/'.$PIName);

		$query = "INSERT INTO persons  VALUES({$personSSN},'{$personName}',{$personPhone},'{$personEmail}',{$adjID},{$pVisitor},DEFAULT(APPROVEN),'{$NIdFName}','{$NIdBName}','{$PIName}');";
		
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
		//header('Location:../Submit Done/SuccessSubmit.html');
	}
?>