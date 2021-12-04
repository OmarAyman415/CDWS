<?php
//get Database Connection
require('../../../Config/Database.php');


?>
<html>
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link
      href="https://fonts.googleapis.com/css?family=Poppins"
      rel="stylesheet"
    />
    
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/extras.css">
    <link href="css/main.css" rel="stylesheet" />
  </head>
  <body>
    <div class="s130">
      <form  method="post">
        <div class="inner-form">
          <div class="input-field first-wrap">
            <div class="svg-wrapper">
              <!-- Search icon -->
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="24"
                height="24"
                viewBox="0 0 24 24"
              >
                <path
                  d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"
                ></path>
              </svg>
            </div>
            <!-- Search Button -->
            <input
              id="search"
              name="search"
              type="text"
              value=" "
              placeholder="What are you looking for?"
            />
          </div>
          <div class="input-field second-wrap">
            <button class="btn-search" onclick="" name="submit" type="submit">
              SEARCH
            </button>
          </div>
        </div>
        
      </form>
    </div>
    <div class="Table-wrap">
              <table class="table">
                <thead class="thead-primary">
                  <!-- Columns Heads or The Titles -->
                  <tr>
                    <th>الحالة</th>
                    <th>رقم العضوية (المفوض)</th>
                    <th>رقم الترخيص</th>
                    <th>المقر</th>
                    <th>اسم المنشأة</th>
                    <th>رقم بطاقة الغرفة</th>
                    <th>رقم الهاتف (المفوض)</th>
                    <th>رقم الفومي (المفوض)</th>
                    <th>تفويض</th>
                    <th>الصفة</th>
                    <th>البريد الالكتروني</th>
                    <th>رقم الهاتف</th>
                    <th>الرقم القومي</th>
                    <th>الاسم</th>
                    <th>ID</th>
                  </tr>
                </thead>
                <?php
                // Get the input from the search bar
                $searchSSN = "";
                if (isset($_POST['submit'])) {
                  $searchSSN = $_POST['search'];
                }
                $query = "";
                //if the search is empty display all records from Database
                if ($searchSSN == "") {
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
                  p.approven
                  FROM persons p
                  left JOIN
                  foundation f ON p.ssn = f.ssnPerson
                  LEFT JOIN 
                  adj_id a ON a.id = p.adjId
                  LEFT JOIN
                  authorize auth ON auth.ssn = p.ssnVisitor';
                }
                // else display the searched ID or SSN
                else{
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
                  p.approven
                  FROM persons p
                  left JOIN
                  foundation f ON p.ssn = f.ssnPerson
                  LEFT JOIN 
                  adj_id a ON a.id = p.adjId
                  LEFT JOIN
                  authorize auth ON auth.ssn = p.ssnVisitor

                  WHERE p.ssn = '. $searchSSN .' ;';
                }
                
                //Get results
                 $result = mysqli_query($conn, $query);
              
                //Fetch data
                 $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);

                ?>

                <!-- Table body -->
                <tbody>
                      <?php foreach($posts as $post) :?>
                        <?php if($post['approven'] == "1" ){ ?>
                        <tr>
                          <td>
                            <!-- form of Approval and Denial  buttons  -->
                            <form action="../pdf/printPage.php"  method="post">
                              <!-- Approval buttton -->
                              <input id=<?php echo $post['ssn'] ?> type="submit" class="btn btn-primary approval" name="submit" value="Print">
                                <!-- input field that stores SSN of the record to push it to appro_deny.php -->
                              <input type="text" name="ssn" value="<?php echo $post['ssn'] ?>" style="display:none;">
                            </form>
                          </td>

                          <!-- Authorized ID member -->
                          <td><?php
                          // As the defualt value in database is NULL
                              if($post['idMember'] == NULL){
                                echo "None";
                              }
                              else{
                              echo $post['idMember'];
                              }
                            ?>
                          </td>
                          <!-- Licence ID -->
                          <td><?php 
                          echo $post['licenceId'];
                          ?></td>
                          <!-- HQ place -->
                          <td><?php 
                          echo $post['place'];
                          ?></td>
                          <!-- Foundation name -->
                          <td><?php 
                          echo $post['foundation_name'];
                          ?></td>
                          <!-- Room ID -->
                          <td><?php 
                          echo $post['idNumberRoom'];
                          ?></td>
                          <!-- authorized Phone number -->
                          <td><?php
                          // As the defualt value in database is NULL
                          if($post['authorize_phone'] == NULL){
                            echo "None";
                          }
                          else{
                          echo $post['authorize_phone'];
                          }
                          ?></td>
                          <!-- authorized Natioonal ID -->
                          <td><?php
                          // As the defualt value in database is NULL
                          if($post['ssnVisitor'] == NULL){
                            echo "None";
                          }
                          else{
                          echo $post['ssnVisitor'];
                          }
                          ?></td>
                          <!-- authorize -->
                          <td><?php 
                          // As the defualt value in database is NULL
                          if($post['approven'] == NULL || $post['approven'] == "0"){
                          echo 'False';
                          }
                          else{
                            echo 'True';
                          }
                          ?></td>
                          <!-- State -->
                          <td><?php 
                          echo $post['state'];
                          ?></td>
                          <!-- Email -->
                          <td><?php 
                          echo $post['email'];
                          ?></td>
                          <!-- phone number -->
                          <td><?php 
                          echo $post['phone'];
                          ?></td>
                          <!-- National ID -->
                          <td>$14</td>
                          <!-- Name -->
                          <td><?php 
                          echo $post['name'];
                          ?>
                          <!-- SSN Or ID-->
                          </td>
                          <th scope="row" class="scope" name="ssn"><?php 
                          echo $post['ssn'];
                          ?></th>
                          </tr>
                          <?php } ?>
                       <?php endforeach; ?> <!-- End OF the Foreach loop -->
                </tbody>
              </table>
            
        </div>

    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
