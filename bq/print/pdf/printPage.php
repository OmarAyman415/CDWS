<!-- get the Data of selectedd person (SSN) from database  -->
<?php
require('../../../Config/Database.php');
if (isset($_POST['submit'])) {
    $personSSN = $_POST['ssn'];
    
    $query = 'SELECT
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
                  p.approven,
                  p.NIdFrontImage,
                  p.NIdBackImage,
                  p.PImage
                  FROM persons p
                  left JOIN
                  foundation f ON p.ssn = f.ssnPerson
                  LEFT JOIN 
                  adj_id a ON a.id = p.adjId
                  LEFT JOIN
                  authorize auth ON auth.ssn = p.ssnVisitor

                  WHERE p.ssn = '. $personSSN .' ;';
    //Get results
        $result = mysqli_query($conn, $query);
              
    //Fetch data
        $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $image = $posts[0]['NIdFrontImage'];

        $personName = $posts[0]['name'];
        $personSSN = $posts[0]['ssn'];
        $foundationName = $posts[0]['foundation_name'];
        $foundationId = $posts[0]['foundationId'];
        $foundationPlace = $posts[0]['place'];
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Document</title>
    <link
      rel="stylesheet"
      href="css/bootstrap.min.css"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="pdf.css" />
    <link rel="stylesheet" href="css/style.css">
    <script src="index.js"></script>
    <script src="js/html2pdf.bundle.js"></script>
  </head>
  <body>
    <div class="container d-flex justify-content-center mt-5 mb-5">
      <div class="row">
        <!--  -->
        <div class="col-md-12 d-flex justify-content-center text-right mb-3">
          <button class="btn btn-primary" id="download">download pdf</button>
        </div>
        <div class="col-md-12" id="test">
          <div class="card" id="invoice">
            <div  class="card-header bg-transparent header-elements-inline">
              <div class="row">
                
                  <h4 class=" personSSN"><?php echo $posts[0]['ssn']; ?></h4>
                  <h5 class="personName"><?php echo $personName ?></h5>
                  <h5 class="foundName"><?php echo $foundationName ?></h5>
                  <h5 class="foundId"><?php echo $foundationId ?></h5>
                  <h5 class="foundplace"><?php echo $foundationPlace ?></h5>
              
                  <img class="prof" style="width: 160px;" src="../../../3mda/Website Form/images/<?php echo $image; ?>"  />
              
                
                  
               
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>

