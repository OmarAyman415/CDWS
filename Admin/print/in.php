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
                  <tr>
                      <?php
                      $connection = mysqli_connect("localhost","root","","Database_Name");
                      $sqlQuery = "SELECT * FROM tableName";
                      $result = $connection->query($sqlQuery);

                      if($result->num_rows > 0){
                        $IDS = 1;
                          while($row = $result->fetch_assoc()){
                              echo '<tr> <th scope="row" class="scope">' . $row["col1_name"] . '</th> <td>'. $row["col2_name"]. '</td> <td>'. $row["col3_name"]. '</td> <td>'. $row["col4_name"]. '</td> <td>'. $row["col5_name"]. '</td> <td>'. $row["col6_name"]. '</td> <td>'. $row["col7_name"]. '</td> <td>'. $row["col8_name"]. '</td> <td>'. $row["col9_name"]. '</td> <td>'. $row["col10_name"]. '</td> <td>'. $row["col11_name"]. '</td> <td>'. $row["col12_name"]. '</td> <td>'. $row["col13_name"]. '</td> <td>'. $row["col14_name"]. '</td> <td>'. '<button onclick="getValue('. $x .')" class="btn btn-primary">Print</button>' .'</td> </tr>';
                          }
                      }
                      else{
                          echo "No results";
                      }
                      $connection-> close();
                      ?>
                    
                  </tr>
                  
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
