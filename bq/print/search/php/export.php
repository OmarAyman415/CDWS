<?php
require ('../../../../Config/Database.php');

mysqli_set_charset($conn, "utf8");

//Filter the excel data
function filterData(&$str){
    $str = preg_replace("/\t/", "\\t" , $str);
    $str = preg_replace("/\r?\n/" , "\\n" , $str);
    if (strstr($str , '"')) {
        $str = '"' . str_replace('"' , '""' , $str) . '"';
    }
}

// Excel File name for download
$fileName = "members_export_data-" . date('Ymd') . ".xls";

// Column Names
$fields = array('id' , 'ssn' , 'name' , 'foundation_name' , 'foundationId' , 'licenceId' , 'idNumberRoom' , 'place' , 'state' , 'authorize_phone' , 'idMember' , 'phone' , 'email' , 'adjId' , 'ssnVisitor' , 'approven');

//Display column names as first row
$excelData = implode("\t" , array_values($fields)) . "\n";

// the Query
$query = 'SELECT
    p.id,
    p.ssn,
    p.name,
    f.name as foundation_name,
    f.foundationId,
    f.licenceId,
    f.idNumberRoom,
    f.place,
    a.state,
    auth.phone as authorize_phone,
    auth.idNumber as idMember,
    p.phone,
    p.email,
    p.adjId,
    p.ssnVisitor,
    p.approven
    FROM persons p
    left JOIN
    foundation f ON p.ssn = f.ssnPerson
    LEFT JOIN 
    adj_id a ON a.id = p.adjId
    LEFT JOIN
    authorize auth ON auth.ssn = p.ssnVisitor
';

//get records from database
$result = $conn->query($query);


//echo "<br>";
if ($result->num_rows > 0) {
    $i = 0;
    //output each record of the data
    while ($row = $result->fetch_assoc()) {
       // echo $i++ . " Record : ";
        $rowData = array($row['id'],$row['ssn'],$row['name'],$row['foundation_name'],$row['foundationId'],$row['licenceId'],$row['idNumberRoom'],$row['place'],$row['state'],$row['authorize_phone'],$row['idMember'],$row['phone'],$row['email'],$row['adjId'],$row['ssnVisitor'],$row['approven']);
        
        $excelData .= implode("\t" , array_values($rowData)) . "\n";
        
    }
}
else{
    $excelData .= 'No records found...' . "\n";
}



//headers for download
header("Content-Type: application/xls");
header("Content-Disposition: attachment; filename=$fileName");
header("Pragma: no-cache"); 
header("Expires: 0");

//Render excel data
echo $excelData;

exit;



