
<?php include('layouts/header.php');?>
<section id="home">
    <div class="container">
        <h5>NEW ARRIVALS</h5>
        <h1><span>Best Prices</span>This Season</h1>
        <p>BBH offers the best product for the most affordable prices</p>
        <button>SHOP NOW</button>
    </div>
</section>
<section id="brand" class="container">
    <div class="row">
        <img src="./assets/dior.jpg" class="img-fluid col-lg-3 col-md-6 col-sm-12">
        <img src="./assets/gucci.jpg" class="img-fluid col-lg-3 col-md-6 col-sm-12">
        <img src="./assets/lv.webp" class="img-fluid col-lg-3 col-md-6 col-sm-12">
        <img src="./assets/prada.jpg" class="img-fluid col-lg-3 col-md-6 col-sm-12">
    </div>
</section>

<section id="new" class="w-100">
    <div class="row p-0 m-0">
        <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img src="./assets/1.jpeg"class="img-fluid">
            <div class="details">
                <h2>Extreme Awesome Bags</h2>
                <button class="text-uppercase">Shop Now </button>
            </div>
        </div>
        <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img src="./assets/2.jpg"class="img-fluid">
            <div class="details">
                <h2>Rare Bags</h2>
                <button class="text-uppercase">Shop Now </button>
            </div>
        </div>
        <div class="one col-lg-4 col-md-12 col-sm-12 p-0">
            <img src="./assets/3.jpg"class="img-fluid">
            <div class="details">
                <h2>Common Bags</h2>
                <button class="text-uppercase">Shop Now </button>
            </div>
        </div>
    </div>
</section>

<section id="featured" class="my-5 pb-5">
    <div class="container text-center mt-5 py-5">
        <h3>Our Featured</h3>
        <hr class="mx-auto">
        <p>Here you checked out our featured Products</p>
    </div>
    <div class="row mx-auto container-fluid">

<?php include('./server/get_featured_products.php'); ?>


<?php while($row= $featured_products->fetch_assoc()) {   ?>

        <div class="product text-center col-lg-3 col-md-4 col-sm-12">
            <img class="img-fluid mb-3" src="./assets/<?php echo $row['product_image']; ?>"/>
            <div class="star">
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
                <i class="fas fa-star"></i>
            </div>
            <h5 class="p-name"><?php echo $row['product_name']; ?> </h5>
            <h4 class="p-price">$<?php echo $row['product_price']; ?></h4>
            <a href="<?php echo "single_product.php?product_id=". $row['product_id'];?>"><button class="buy-btn">Buy Now</button></a>
        </div>


        <?php } ?>
    </div>
</section>









<?php include('layouts/footer.php');?>