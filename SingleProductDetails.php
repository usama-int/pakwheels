<?php
 if(isset($_GET['product'])){
    $productID =$_GET['product'];


 }
 else{
     echo "something went wrong";
 }
$servers="localhost";
$users="root";
$pwds="";
$dbname="pakwheels";
$con=new mysqli($servers,$users,$pwds,$dbname);

$fetchProduct = "select * from products WHERE id='$productID'";
$fetch = mysqli_query($con, $fetchProduct);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Product Details</title>
    <link rel="stylesheet" type="text/css" href="index.css">
    
</head>
<body>

<!--header section start-->

<header class="header">

    <div id="menu-btn" class="fas fa-bars"></div>

    <a href="index.php" class="logo"> <span>Pak</span>wheels </a>

    <nav class="navbar">

     <a href="index.php">Home</a>
     <a href="about us.html">About Us</a>
     <a href="products.php">Products</a>
     <a href="contact us.html">Contact Us</a>
     <a href="login.php">Log in as Admin</a>
     
    </nav>
</header>

<br><br><br>

<br><br><br><br><br><br><br>


<?php while ($result = mysqli_fetch_assoc($fetch)) {
        if ($result['stock'] == 1) {
            $newPrice = $result['price'] - $result['discount'];
     
    ?>

    <div class="container">
        <h1><?php echo  $result['name']; ?></h1>
        <div class="product-info">
            <div class="product-image">
            <img src="uploads/<?php echo $result['image']; ?>" alt="product" height="300" width="400">
            </div>
            <div class="product-details">
                <p><strong>Price:</strong> $<?php echo  $result['price']; ?></p>
                <p><strong>Code:</strong> <?php echo  $result['code']; ?></p>
                <p><strong>Category:</strong> <?php echo  $result['category']; ?></p>
                <p><strong>Size:</strong> <?php echo  $result['size']; ?></p>
                <p><strong>Detail:</strong> <?php echo  $result['detail']; ?></p>
            </div>
        </div>
    </div>
    <?php }} ?>
<style>

/* CSS styles for product_detail.php */

* {
    box-sizing: border-box;
}

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 20px;
    background-color: #f2f2f2;
}

.container {
    max-width: 700px;
    margin: 0 auto;
    background-color: lightyellow;
    padding: 20px;
    border-radius: 35px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

h1 {
    color: #333;
    text-align: center;
}

.product-info {
    display: flex;
    flex-wrap: wrap;
}

.product-image {
    flex: 1;
    max-width: 50%;
    text-align: center;
}

.product-image img {
    max-width: 100%;
    height: auto;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
}

.product-details {
    flex: 1;
    max-width: 50%;
    padding: 20px;
}

.product-details p {
    margin: 10px 0;
}

@media (max-width: 600px) {
    .product-info {
        flex-direction: column;
    }

    .product-image,
    .product-details {
        max-width: 100%;
    }
}



</style>
<br><br><br><br><br><br><br>
<section class="footer">

<div class="box-container">

    <div class="box">
        <h3>our branches</h3>
        <a href="#"> <i class="fas fa-map-maker-alt"></i> Lahore  </a>
        <a href="#"> <i class="fas fa-map-maker-alt"></i>  Karachi  </a>
        <a href="#"> <i class="fas fa-map-maker-alt"></i>  Peshawar  </a>
        <a href="#"> <i class="fas fa-map-maker-alt"></i> Islamabad </a>
        <a href="#"> <i class="fas fa-map-maker-alt"></i>  Multan </a>


    </div>

    <div class="box">
        <h3>quick links</h3>
        <a href="index.php"> <i class="fas fa-arrow-right"></i> home  </a>
        <a href="about us.html"> <i class="fas fa-arrow-right"></i> About Us  </a>
        <a href="products.html"> <i class="fas fa-arrow-right"></i> Products  </a>
        <a href="SingleProductDetails.php"> <i class="fas fa-arrow-right"></i>Product Details </a>
        <a href="contact us.html"> <i class="fas fa-arrow-right"></i> contact Us</a>


    </div>


    <div class="box">
        <h3>quick links</h3>
        <a href="#"> <i class="fas fa-facebook-f"></i> Facebook  </a>
        <a href="#"> <i class="fas fa-twitter"></i> Twitter  </a>
        <a href="#"> <i class="fas fa-instagram"></i> Instagram  </a>
        <a href="#"> <i class="fas fa-linkedin"></i> Linkedin  </a>

    </div>

</div>

</section>



</body>
</html>

