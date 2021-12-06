<?php
include_once '../../../Config/Database.php';
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

                  //Get results
                $result = mysqli_query($conn, $query);
                //Fetch data
                $posts = [];
                if($result)
                  $posts = mysqli_fetch_all($result, MYSQLI_ASSOC);
                else 
                  echo "<script> alert('Failed query.') </script>";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Member list</h2>
        <div class="row">
            <div class="col-md-12 head">
                <div class="flaot-right">
                    <a href="php/export.php" class="btn btn-primary"><i class="dwn"></i> Export</a>
                </div>
            </div>
            <table class="table table-striped table-bordered">
                <thead class="thead-dark">
                  <tr>
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
                <tbody>
                <?php foreach($posts as $post) :?>    
                        <!-- Record row -->
                        <tr>
                          
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
                          <td><?php 
                          echo $post['ssn'];
                          ?></td>
                          <!-- Name -->
                          <td><?php 
                          echo $post['name'];
                          ?>
                          <!-- ID-->
                          </td>
                          <th scope="row" class="scope" name="id"><?php 
                          echo $post['id'];
                          ?></th>
                          </tr>    
                       <?php endforeach; ?> <!-- End OF the Foreach loop -->
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>