<?php
require('../../../Config/Database.php');
//get ssn or the id of the record
$username=$_POST['ssn'];
//set Approval variable to False
$approve = false;
//Check if the pressed button is Approval button or not
if( isset($_POST['submit'])){
    $approve = "True";
}
//Check if the pressed button is Denial button or not
if( isset($_POST['denial'])){
    $approve = "False"; 
}
//Query that update Approval column in table person in Database cdws 
$query = 'UPDATE persons SET approven = '. $approve .' WHERE ssn = ' . $username .';' ;

//Excute the query
$result=mysqli_query($conn,$query);

//return to Approval Page
header('Location:../ApprovalPage.php');
?>
