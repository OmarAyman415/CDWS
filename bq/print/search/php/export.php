<?php
require ('../../../../Config/Database.php');


mysqli_query( $conn,"SET NAMES 'utf-8'");

// Column Names
$fields = array('id' , 'ssn' , 'name' , 'foundation_name' , 'foundationId' , 'licenceId' , 'idNumberRoom' , 'place' , 'state' , 'authorize_phone' , 'idMember' , 'phone' , 'email' , 'adjId' , 'ssnVisitor' , 'approven');

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
    $delimiter = ",";
    // Excel File name for download
    $fileName = "members_export_data-" . date('Y-m-d') . ".csv";

    // Create a file pointer
    $f = fopen('php://memory' , 'w');

    fputcsv($f, $fields, $delimiter);

    //output each record of the data
    while ($row = $result->fetch_assoc()) {
       
        $rowData = array($row['id'],$row['ssn'],$row['name'],$row['foundation_name'],$row['foundationId'],$row['licenceId'],$row['idNumberRoom'],$row['place'],$row['state'],$row['authorize_phone'],$row['idMember'],$row['phone'],$row['email'],$row['adjId'],$row['ssnVisitor'],$row['approven']);
        
        fputcsv($f, $rowData, $delimiter);
    }
    fseek($f, 0);

    //headers for download
    header('Content-Encoding: UTF-8');
    header("Content-Type: text/csv; charset=UTF-8;");
    header("Content-Disposition: attachment; filename=$fileName");
    header("Cache-Control: cache, must-revalidate");
    header("Pragma: public");
    header('Content-Type: text/xml,  charset=UTF-8; encoding=UTF-8');
    echo "\xEF\xBB\xBF"; // UTF-8 BOM
    
    fpassthru($f);
}

exit;



