<?php
require('../../Config/Database.php');
  //create query
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
  ';
  //Get results
  $result = mysqli_query($conn, $query);

  //Fetch data
  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    
  //see the data
      //var_dump($posts);
      //print_r($posts[0]);
      //var_dump($posts[1]['approven']);
      //free the result
      
  //free result Value
  mysqli_free_result($result);

  //End Connection
  mysqli_close($conn);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Table 03</title>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <link
      href="https://fonts.googleapis.com/css?family=Roboto:400,100,300,700"
      rel="stylesheet"
      type="text/css"
    />

    <link
      rel="stylesheet"
      href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <section class="ftco-section">
      <div class="fluid-container">
        <div class="row">
          <div class="col-md-12">
            <!-- Table -->
            <div class="table-wrap">
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

                <!-- Table body -->
                <tbody>
                      <?php foreach($posts as $post) :?>
                        <?php if($post['approven'] != "0" && $post['approven'] != "1"){ ?>
                        <tr>
                          <td>
                            <!-- form of Approval and Denial  buttons  -->
                            <form action="php/appro_deny.php" method="post">
                              <!-- Approval buttton -->
                              <input id=<?php echo $post['ssn'] ?> type="submit" class="btn btn-primary approval" name="submit" value="Approval">
                              <!-- input field that stores SSN of the record to push it to appro_deny.php -->
                              <input type="text" name="ssn" value="<?php echo $post['ssn'] ?>" style="display:none;">
                              <!-- Denial Button -->
                              <input id=<?php echo $post['ssn'] ?> type="submit" class="btn btn-primary denial" name="denial" value="Denial">
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
            <!-- End of Table -->
          </div>
        </div>
      </div>
    </section>
    <!-- Scripts -->
    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
