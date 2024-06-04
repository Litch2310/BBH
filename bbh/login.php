<?php

session_start();

include('server/connection.php');

if(isset($_SESSION['logged_in'])){
  header('location: account.php');
  exit; 
}


if(isset($_POST['login_btn'])){


  $email = $_POST['email'];
  $password = md5($_POST['password']);
  

  $stmt = $conn->prepare("SELECT user_id,user_name,user_email,user_password FROM users WHERE user_email= ? AND user_password = ? LIMIT 1");
  
  $stmt->bind_param('ss',$email,$password);
  
  if($stmt->execute()){
    $stmt->bind_result($user_id,$user_name,$user_email,$user_password);
    $stmt->store_result();

    if($stmt->num_rows() == 1){
     $row = $stmt->fetch();

      $_SESSION['user_id'] = $user_id;
      $_SESSION['user_name'] = $user_name;
      $_SESSION['user_email'] = $user_email;
      $_SESSION['logged_in'] = true;

      header('location: account.php?login_success=Logged In Successfully');



    }else{
      header('location: login.php?error=Could not verify your account');

    }


  }else{
    //error
    header('location: login.php?error=Something went wrong');


  }



}




?>


<?php include('layouts/header.php');?>

       
          
          <section class="my-5 py-5">
            <div class="container text-center mt-3 pt-5">
                <h2 class="form-weight-bold">LogIn</h2>
                <hr class="mx-auto">
            </div>
            <div class="mx-auto container">
              <p style="color:red"><?php if(isset($_GET['error'])){ echo $_GET['error'];} ?></p>
                <form id="login-form" action="login.php" method="POST">
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" id="login-email" name="email" placeholder="Email" required/>
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" class="form-control" id="login-password" name="password" placeholder="Password" required/>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn" id="login-btn" name="login_btn" value="LogIn"/>
                    </div>
                    <div class="form-group">
                        <a href="register.php" id="register-url" class="btn">Don't have an Account? Register</a>
                    </div>
                </form>
            </div>



          </section>
          
          
          
          
          
          
          
          
          
          
          
          
          
  <?php include('layouts/footer.php');?>