<?php
require('../../Config/Database.php');
                    //create query
                    $query = 'SELECT
                    p.ssn,
                    p.name,
                    f.name,
                    f.foundationId,
                    f.licenceid,
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
                    echo $posts['name'];
                    //free the result
                    mysqli_free_result($result);
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
                  <!-- Columns Heads -->
                  <tr>
                    <th>الحالة</th>
                    <th>رقم العضوية</th>
                    <th>رقم الترخيص</th>
                    <th>المقر</th>
                    <th>اسم المنشأة</th>
                    <th>رقم الهاتف (المفوض)</th>
                    <th>رقم بطاقة الغرفة</th>
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
                        <tr>
                          <td>
                          <button onclick="" href="#" class="btn btn-primary">
                            Approval
                          </button>
                          <button onclick="" class="btn btn-primary">Denial</button>
                          </td>
                          <td>1 Year</td>
                          <td>$70.00</td>
                          <td>$5.00</td>
                          <td>$5.00</td>
                          <td>$7</td>
                          <td>$8</td>
                          <td>$9</td>
                          <td>$10</td>
                          <td>$11</td>
                          <td>$12</td>
                          <td>$13</td>
                          <td>$14</td>
                          <td><?php 
                          echo $post['ssn'];
                          ?></td>
                          <th scope="row" class="scope">$post</th>
                          </tr>
                      <?php endforeach; ?>
                    <!-- <td>
                      echo '<th scope="row" class="scope">' . $row["col1_name"] . '</th> <td>'. $row["col2_name"]. '</td> <td>'. $row["col3_name"]. '</td> <td>'. $row["col4_name"]. '</td> <td>'. $row["col5_name"]. '</td> <td>'. $row["col6_name"]. '</td> <td>'. $row["col7_name"]. '</td> <td>'. $row["col8_name"]. '</td> <td>'. $row["col9_name"]. '</td> <td>'. $row["col10_name"]. '</td> <td>'. $row["col11_name"]. '</td> <td>'. $row["col12_name"]. '</td> <td>'. $row["col13_name"]. '</td> <td>'. $row["col14_name"]. '</td> <td>'. '<a href="#" class="btn btn-primary">Approval</a>
                              <a href="#" class="btn btn-primary">Denial</a>' .'</td>';
                      <a href="#" class="btn btn-primary">Approval</a>
                      <a href="#" class="btn btn-primary">Denial</a>
                    </td> -->
                  
                  
                </tbody>
              </table>
            </div>
            <!-- End of Table -->
          </div>
        </div>
      </div>
    </section>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
