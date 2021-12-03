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
                    <th>ID</th>
                    <th>Name</th>
                    <th>Foundation</th>
                    <th>HQ</th>
                    <th>licence</th>
                    <th>test6</th>
                    <th>test6</th>
                    <th>test6</th>
                    <th>test6</th>
                    <th>test6</th>
                    <th>test6</th>
                    <th>test6</th>
                    <th>test6</th>
                    <th>test6</th>
                    <th>Register</th>
                  </tr>
                </thead>
                <!-- Table body -->
                <tbody>
                  
                      <?php
                      $username = "root";
                      $password = "";
                      $server = 'localhost';
                      $db = 'cdws';
                      $connect = mysqli_connect($server,$username,"",$db);
                      $sqlQuery = "SELECT * FROM persons";
                      $query = mysqli_query($connect,$sqlQuery);
                      while($row = $query->fetch_assoc()){
                        echo '<tr id="'. $row["ssn"].'"> <th scope="row"  class="scope">' . $row["ssn"] . '</th> <td>'. $row["name"]. '</td> <td>'. $row["phone"]. '</td> <td>'. $row["email"]. '</td> <td>'. $row[4]. '</td> <td>'. $row[5]. '</td> <td>'. $row[6]. '</td> <td>'. $row[0]. '</td> <td>'. $row[1]. '</td> <td>'. $row[2]. '</td> <td>'. $row[3]. '</td> <td>'. $row[4]. '</td> <td>'. $row[5]. '</td> <td>'. $row[6]. '</td> <td>'. '<button onclick="getValue('. $x .')" class="btn btn-primary">Print</button>' .'</td> </tr>';
                      }
                      $connection-> close();
                      ?> 
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
