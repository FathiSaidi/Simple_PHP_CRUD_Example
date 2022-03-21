<?php
     include 'database.php';

     if(isset($_POST['addbtn'])){
          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $email = $_POST['email'];
          $adress = $_POST['adress'];
          $mobile = $_POST['mobile'];

          $insert = "INSERT INTO users (fname,lname,email,adress,mobile) VALUES ('$fname','$lname','$email','$adress','$mobile')";

          $result = mysqli_query($con , $insert);

          if($result){
               header('location: index.php');
          } else {
               mysqli_query($result);
          }
     }

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Add User</title>
     <link rel="icon" type="image/x-icon" href="img/favicon.png">
     <link rel="stylesheet" href="css/style.css">
</head>
<body>

     <div class="header">
          <h1>Add New User</h1>
     </div>

     <div class="content">

          <div class="form">
               <form method="post">

                    <div class="input-group">
                         <label>First Name :</label>
                         <input type="text" name="fname">
                    </div>

                    <div class="input-group">
                         <label>Last Name :</label>
                         <input type="text" name="lname">
                    </div>

                    <div class="input-group">
                         <label>Email :</label>
                         <input type="text" name="email">
                    </div>

                    <div class="input-group">
                         <label>Adress :</label>
                         <input type="text" name="adress">
                    </div>

                    <div class="input-group">
                         <label>Mobile :</label>
                         <input type="text" name="mobile">
                    </div>

                    <div class="input-group">
                         <button class="addbtn" name="addbtn">Add User</button>
                    </div>

               </form>
          </div>

     </div>

</body>
</html>