<?php

include 'config.php';

if(isset($_POST['submit'])){

   $name = mysqli_real_escape_string($conn, $_POST['name']);
   $email = mysqli_real_escape_string($conn, $_POST['email']);
   $pass = mysqli_real_escape_string($conn, md5($_POST['password']));
   $cpass = mysqli_real_escape_string($conn, md5($_POST['cpassword']));

   $select_users = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$pass'") or die('query failed');

   if(mysqli_num_rows($select_users) > 0){
      $message[] = 'User already exist!';
   }else{
      if($pass != $cpass){
         $message[] = 'Passwords do not match!';
      }else{
         mysqli_query($conn, "INSERT INTO `users`(name, email, password, user_type) VALUES('$name', '$email', '$cpass', '$user_type')") or die('query failed');
         $message[] = 'Registered successfully!';
         header('location:login.php');
      }
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>register</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">

     <!-- botstrap -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>
<body>



<?php
if(isset($message)){
   foreach($message as $message){
      echo '
      <div class="message">
         <span>'.$message.'</span>
         <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
      </div>
      ';
   }
}
?>



<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <div class="text-center">
                  <img src="images/lcu_logo.png"
                    style="width: 185px;" alt="logo">
                  <h1 class="mt-1 mb-5 pb-1">Lead City E-Learning</h1>
                </div>

                <br>
                <br>

                <form action="" method="post">
                  <h2 class="text-center">Register</h2>
                  <br>
                  <br>
                  <div class="form-outline mb-4">
                     <h5><label class="form-label" for="form2Example11">Name</label></h5>
                    <input type="text" name="name" placeholder="Enter your Name" required id="form2Example11" class="form-control"/>
                  </div>

                  <div class="form-outline mb-4">
                     <h5><label class="form-label" for="form2Example11">Email</label></h5>
                    <input type="email" name="email" placeholder="Enter your Email" required id="form2Example11" class="form-control"/>
                  </div>

                  <div class="form-outline mb-4">
                     <h5><label class="form-label" for="form2Example11">Password</label></h5>
                    <input type="password" name="password" placeholder="Enter your Password" required id="form2Example11" class="form-control"/>
                  </div>

                  <div class="form-outline mb-4">
                  <h5><label class="form-label" for="form2Example22">Confirm Password</label></h5>
                     <input type="password" name="cpassword" placeholder="Confirm your Password" required id="form2Example22" class="form-control" />
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" name="submit" value="register now">Register</button>
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <h4 class="mb-0 me-2">Do not have an account?</h4>
                    <a href="login.php"><button type="button" class="btn btn-outline-danger">Login Now</button></a>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-black px-3 py-4 p-md-5 mx-md-4">
                <h1 class="mb-4">Welcome to Lead City University E-Learning Center</h1>
                <br>
                <br>
                <h4 class="big mb-0">You can find and download any book of your choice here at our website. Login in to your account and check varities of books or create an account now</h4>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


</body>
</html>