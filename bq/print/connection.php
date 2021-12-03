<?php
$username = "root";
$password = "";
$server = 'localhost';
$db = 'cdws';
$connect = mysqli_connect($server,$username,"",$db);

if($connect){
    //echo "Connnection Successful";
    ?>
    <script>
        $alert("connection successful");
    </script>
    <?php
}
else{
    die("no connection" . mysqli_connect_error());
}