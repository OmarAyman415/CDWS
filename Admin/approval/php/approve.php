<?php
                      $username = "root";
                      $password = "";
                      $server = 'localhost';
                      $db = 'cdws';
                      $connect = mysqli_connect($server,$username,"",$db);
                      $sqlQuery = "SELECT * FROM persons";
                      $query = mysqli_query($connect,$sqlQuery);
                      

                      
                        
                          while($row = $query->fetch_assoc()){
                              echo '<tr> <th scope="row" class="scope">' . $row["ssn"] . '</th> <td>'. $row[1]. '</td> <td>'. $row[2]. '</td> <td>'. $row[3]. '</td> <td>'. $row[4]. '</td> <td>'. $row[5]. '</td> <td>'. $row[6]. '</td> <td>'. $row[0]. '</td> <td>'. $row[1]. '</td> <td>'. $row[2]. '</td> <td>'. $row[3]. '</td> <td>'. $row[4]. '</td> <td>'. $row[5]. '</td> <td>'. $row[6]. '</td> <td>'. '<button onclick="getValue('. $x .')" class="btn btn-primary">Print</button>' .'</td> </tr>';
                          }
                    
                      $connection-> close();
                      ?>