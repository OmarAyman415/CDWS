<?php
require('../../../Config/Database.php');
$username=$_POST['ssn'];
$approve = false;
if( isset($_POST['submit'])){
    $approve = "True";
}
if( isset($_POST['denial'])){
    $approve = "False"; 
}
$query = 'UPDATE persons SET approven = '. $approve .' WHERE ssn = ' . $username .';' ;

$result=mysqli_query($conn,$query);
?>
