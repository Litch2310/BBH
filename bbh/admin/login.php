<?php

session_start();

include('../server/connection.php');

if(isset($_SESSION['admin_logged_in'])){
  header('location: dashboard.php');
  exit; 
}


if(isset($_POST['login_btn'])){


  $email = $_POST['email'];
  $password = md5($_POST['password']);
  

  $stmt = $conn->prepare("SELECT admin_id,admin_name,admin_email,admin_password FROM admins WHERE admin_email= ? AND admin_password = ? LIMIT 1");
  
  $stmt->bind_param('ss',$email,$password);
  
  if($stmt->execute()){
    $stmt->bind_result($admin_id,$admin_name,$admin_email,$admin_password);
    $stmt->store_result();

    if($stmt->num_rows() == 1){
     $row = $stmt->fetch();

      $_SESSION['admin_id'] = $admin_id;
      $_SESSION['admin_name'] = $admin_name;
      $_SESSION['admin_email'] = $admin_email;
      $_SESSION['admin_logged_in'] = true;

      header('location: dashboard.php?login_success=Logged In Successfully');



    }else{
      header('location: login.php?error=Could not verify your account');

    }


  }else{
    //error
    header('location: login.php?error=Something went wrong');


  }



}




?>
<!DOCTYPE html>
<html>

<head>
      <title>Admin Login Form</title>
      <link rel="stylesheet" href="style.css">
</head>

<body>


            <div class="container text-center mt-3 pt-5">
                <h2 class="form-weight-bold text-center">Admin Log In</h2>
                <hr class="mx-auto">
            </div>


            <div class="mx-auto container">
                 <form id="login-form" enctype="multipart/form-data" action="login.php" method="POST">
              <p style="color:red"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></p>
               
                    <div class="form-group mt-2">
                        <label>Email</label>
                        <input type="email" class="form-control" id="product-name" name="email" placeholder="Email" required/>
                    </div>
                    <div class="form-group mt-2">
                        <label>Password</label>
                        <input type="password" class="form-control" id="product-desc" name="password" placeholder="Password" required/>
                    </div>


                    <div class="form-group mt-3">
                        <input type="submit" class="btn btn-primary" name="login_btn" value="LogIn"/>
                    </div>
                   
                </form>
            </div>



         
       
</body>

</html>
