<?php



?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
        <link rel="stylesheet" href="style.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />
  <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>
    </head>
    <body>
        
        <nav class="navbar navbar-expand-lg bg-light py-3 fixed-top">
            <div class="container">
             <img src="./assets/logo.png"/>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse nav-buttons" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="shop.php">Shop</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="contact.php">Contact Us</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="cart.php"><i class="fas fa-shopping-cart">
                        <?php if(isset($_SESSION['quantity']) && $_SESSION['quantity'] != 0) {?>
                            <span class="cart-quantity"><?php echo $_SESSION['quantity'];?></span>
                            <?php }?>
                    </i>
                </a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="account.php"><i class="fas fa-user"></i></a>
                  </li>
                </ul>
                
              </div>
            </div>
          </nav>