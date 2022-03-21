<?php

     include 'database.php';

     $results_per_page = 10;

     $display = "SELECT * FROM users";
     $result = mysqli_query($con , $display);

     $number_of_results = mysqli_num_rows($result);

     $number_of_pages = ceil($number_of_results / $results_per_page);

     if(!isset($_GET['page'])){
          $page = 1;
     }else{
          $page = $_GET['page'];
     }

     $this_page_first_result = ($page-1) * $results_per_page;

     $sql = 'SELECT * FROM users LIMIT ' . $this_page_first_result . ',' .  $results_per_page;

     $rslt = mysqli_query($con , $sql);


?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Users - Manager</title>
     <link rel="icon" type="image/x-icon" href="img/favicon.png">
     <link rel="stylesheet" href="css/style.css">
</head>
<body>

     <div class="header">
          <h1>Users Manager</h1>
     </div>

     <div class="content">

          <div class="addlink">
               <a href="add.php" class="addbtn">Add user</a>
          </div>

          <table>
               <thead>
                    <tr>
                         <th>ID</th>
                         <th>First Name</th>
                         <th>Last Name</th>
                         <th>Email</th>
                         <th>Adress</th>
                         <th>Mobile</th>
                         <th>Options</th>
                    </tr>
               </thead>
               <tbody>
                    <?php
                         while($row = mysqli_fetch_assoc($rslt)){

                              $id = $row['id'];
                              $fname = $row['fname'];
                              $lname = $row['lname'];
                              $email = $row['email'];
                              $adress = $row['adress'];
                              $mobile = $row['mobile'];

                              echo '
                                   <tr>
                                        <td>'.$id.'</td>
                                        <td>'.$fname.'</td>
                                        <td>'.$lname.'</td>
                                        <td>'.$email.'</td>
                                        <td>'.$adress.'</td>
                                        <td>'.$mobile.'</td>
                                        <td>
                                             <a href="update.php?updateid='.$id.'" class="updatebtn">Update</a>
                                             <a href="delete.php?deleteid='.$id.'" class="deletebtn">Delete</a>
                                        </td>
                                   </tr>
                              ';
                         }
                    ?>
               </tbody>    
          </table>

          <div class="pagination">
               <?php
                    for($page=1;$page <= $number_of_pages; $page++){
                         echo '<a href="index.php?page='.$page.'" class="pages">'.$page.' </a>';
                    }
               ?>
          </div>

     </div>

</body>
</html>