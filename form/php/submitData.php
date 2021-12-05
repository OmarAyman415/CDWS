<?php
require('../../Config/Database.php');
	if( isset($_POST['submit'])){
		//put input values into variables
		$personSSN = $_POST['pSSN'];
		$personName = $_POST['pName'];
		$personPhone = $_POST['pPhone'];
		$personEmail = $_POST['pEmail'];
		$adjID = $_POST['rad'];
		$pVisitor = 'DEFAULT(SSNVISITOR)';
		//Check if The User will authorize another person or not
		//if yes, then assign turn on pVisitor variable 
		if ($_POST['rad2'] == "1") {
			$pVisitor = $_POST['authSSN'];
		}
		
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

		//the Query, insert person data into the Database 
		$query = "INSERT INTO persons(ssn,name,phone,email,adjId,ssnVisitor,approven,NIdFrontImage,NIdBackImage,PImage)  VALUES({$personSSN},'{$personName}',{$personPhone},'{$personEmail}',{$adjID},{$pVisitor},DEFAULT(APPROVEN),'{$NIdFName}','{$NIdBName}','{$PIName}');";
		
		//Excute the query
		mysqli_query($conn,$query);
		
		//initiate authorized person with NULL
		$authSSN = NULL;
		$authPhone = NULL;
		$authIdNumber = NULL;
		$authEmail=NULL;

		//assign authoirzed person data if the User authorized one
		if ($_POST['rad2'] == "1") {
			$pVisitor = $_POST['authSSN'];
			$authSSN = $_POST['authSSN'];
			$authPhone = $_POST['authPhone'];
			$authIdNumber = $_POST['authIdNumber'];
			$authEmail = $_POST['authEmail'];
			$query = "INSERT INTO authorize VALUES({$authSSN}, '{$authPhone}' , '{$authEmail}' , {$authIdNumber} );";
			mysqli_query($conn,$query);
		}


		//Assign foundation variables
		$foundationName =  $_POST['foundName'];
		$foundationPlace = $_POST['foundPlace'];
		$foundationId = $_POST['rad3'];
		$foundationLic = $_POST['foundLic'];
		$foundationIdRoomNumber = $_POST['foundIdRoomNumber'];
		//Query
		$query = "INSERT INTO foundation(ssnPerson ,name , place ,foundationId , licenceId ,idNumberRoom) VALUES('{$personSSN}' , '{$foundationName}' , '{$foundationPlace}' , {$foundationId} , {$foundationLic} , {$foundationIdRoomNumber});";
		
		//Excute the Query
		mysqli_query($conn,$query);

		//Redirect the user to Successful Submit Page  
		header('Location:../Submit Done/SuccessSubmit.html');
	}
?>