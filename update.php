<?php

     require 'database.php';

     $id = $_GET['updateid'];

     $display = "SELECT * FROM users WHERE id=".$id;
     $result = mysqli_query($con , $display);

     $row = mysqli_fetch_assoc($result);

     $fname = $row['fname'];
     $lname = $row['lname'];
     $email = $row['email'];
     $adress = $row['adress'];
     $mobile = $row['mobile'];

     if(isset($_POST['updatebtn'])){
          
          $fname = $_POST['fname'];
          $lname = $_POST['lname'];
          $email = $_POST['email'];
          $adress = $_POST['adress'];
          $mobile = $_POST['mobile'];

          $update = "UPDATE users SET id=$id,fname='$fname',lname='$lname',email='$email',adress='$adress',mobile='$mobile' WHERE id=$id";
          $result = mysqli_query($con,$update);

          if($result){
               header('location: index.php');
          }else{
               echo mysqli_error($result);
          }
     }

?>

<!DOCTYPE html>
<html lang="en">
<head>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <title>Update User</title>
     <link rel="icon" type="image/x-icon" href="img/favicon.png">
     <link rel="stylesheet" href="css/style.css">
</head>
<body>

     <div class="header">
          <h1>Update User</h1>
     </div>

     <div class="content">

          <div class="form">
               <form method="post" action="">

                    <div class="input-group">
                         <label>First Name :</label>
                         <input type="text" name="fname" value="<?php echo $fname; ?>">
                    </div>

                    <div class="input-group">
                         <label>Last Name :</label>
                         <input type="text" name="lname" value="<?php echo $lname; ?>">
                    </div>

                    <div class="input-group">
                         <label>Email :</label>
                         <input type="text" name="email" value="<?php echo $email; ?>">
                    </div>

                    <div class="input-group">
                         <label>Adress :</label>
                         <input type="text" name="adress" value="<?php echo $adress; ?>">
                    </div>

                    <div class="input-group">
                         <label>Mobile :</label>
                         <input type="text" name="mobile" value="<?php echo $mobile; ?>">
                    </div>

                    <div class="input-group">
                         <button class="addbtn" name="updatebtn">Update User</button>
                    </div>

               </form>
          </div>

     </div>

</body>
</html>