<?php 

include('server/connection.php');


if(isset($_POST['search'])){
    $category = $_POST['category'];
    $price = $_POST['price'];

    $stmt = $conn->prepare("SELECT * FROM products WHERE product_category =? AND product_price <=?");
    $stmt->bind_param('si',$category,$price);
    $stmt->execute();
    
    $products = $stmt->get_result();

}else{
$stmt = $conn->prepare("SELECT * FROM products");

$stmt->execute();

$products = $stmt->get_result();

}




?>

<?php include('layouts/header.php');?>

 
          <!--Search-->
        <section id="search" class="my-5 py-5 ms-2">
        <div class="container mt-5 py-5">
            <p>Search Product</p>
            <hr>
        </div>

        <form action="shop.php" method="POST">
            <div class="row mx-auto container">
                <div class="col-lg-12 col-md-12 col-sm-12">

                <p>Category</p>
                <div class="form-check">
                    <input type="radio" name="category" value="Local Bag" id="category_one" class="form-check-input">
                    <label class="form-check-label" for="flexRadioDefault1">
                        Local Bags
                    </label>
                </div>

                <div class="form-check">
                    <input type="radio" name="category" value="Luxury Bag" id="category_two" class="form-check-input" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Luxury Bags
                    </label>
                </div>

                <div class="form-check">
                    <input type="radio" name="category" value="Rare Bag" id="category_two" class="form-check-input" checked>
                    <label class="form-check-label" for="flexRadioDefault2">
                        Rare Bags
                    </label>
                </div>

            </div>
            </div>
            
            <div class="row mx-auto container mt-5">
                <div class="col-lg-12 col-md-12 col-sm-12">

                <p>Price</p>
                <input type="range" class="form-range w-50" name="price" value="100" min="1" max="1000" id="customRange2">
                <div class="w-50">
                    <span style="float: left;">1</span>
                    <span style="float: right;">1000</span>
                    </div>
                </div>
            <div class="form-group my-3 mx-3">
                <input type="submit" name="search" value="Search" class="btn btn-primary">
            </div>
              </div>

        </form>

        </section>



        <!--Shop-->
          <section id="shop" class="my-5 py-5">
            <div class="container text-center mt-5 py-5">
                <h3>Our Products</h3>
                <hr class="mx-auto">
                <p>Here you checked out our featured Products</p>
            </div>

            
            <div class="row mx-auto container">
                <?php while($row = $products->fetch_assoc()) {?>

                <div onclick="window.location.href='single_product.php';" class="product text-center col-lg-3 col-md-4 col-sm-12">
                    <img src="./assets/<?php echo $row['product_image'];?>" class="img-fluid mb-3">
                    <div class="star">
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                        <i class="fas fa-star"></i>
                    </div>
                    <h5 class="p-name"><?php echo $row['product_name'];?></h5>
                    <h4 class="p-price">$ <?php echo $row['product_price'];?></h4>
                    <a class="btn buy-btn" href="<?php echo "single_product.php?product_id=".$row['product_id'];?>"> Buy Now</a>
              </div>

                
                
<?php }?>
              </div>
        </section>


        <?php include('layouts/footer.php');?>