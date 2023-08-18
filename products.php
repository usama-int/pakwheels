<!-- fetching products from database -->
<?php

  $servers="localhost";
$users="root";
$pwds="";
$dbname="pakwheels";
$con=new mysqli($servers,$users,$pwds,$dbname);

$fetchProducts = "select * from products";
$fetch = mysqli_query($con, $fetchProducts);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Products</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
</head>
<style>
  .wrapper {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
}

.product-card {
    width: 300px;
    border: 1px solid #ddd;
    margin: 20px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    border-radius: 4px;
}

.product-card .badge {
    background-color: #4CAF50;
    color: white;
    padding: 4px 8px;
    border-radius: 2px;
    margin-top: 10px;
    margin-left: 10px;
}

.product-card .product-tumb img {
    width: 100%;
    height: auto;
    object-fit: cover;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
}

.product-card .product-details {
    padding: 16px;
}

.product-card .product-category {
    font-size: 14px;
    color: #777;
}

.product-card h4 {
    font-size: 18px;
    margin-top: 8px;
    margin-bottom: 12px;
}

.product-card p {
    font-size: 14px;
    color: #777;
}

.product-card .product-bottom-details {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 20px;
}

.product-card .product-price {
    font-size: 16px;
    font-weight: bold;
}

.product-card .product-links a {
    color: #777;
    margin-left: 8px;
    text-decoration: none;
}
.product-bottom-details small {
    font-size: 80%;
    font-weight: 400;
    text-decoration: line-through;
    display: inline-block;
    margin-right: 5px;
}



/* @media screen and (min-width: 768px) {
.footer{
    position: fixed;
  left: 0;
  bottom: 0;
  width: 100%;

}}  */

@media screen and (max-width: 768px) {
    .product-card {
        width: 100%;
    }
}

</style>
<body>

    <header class="header">

        <div id="menu-btn" class="fas fa-bars"></div>
    
        <a href="index.php" class="logo"> <span>Pak</span>wheels </a>
    
        <nav class="navbar">
    
          <a href="index.php">Home</a>
          <a href="about us.html">About Us</a>
          <a href="products.php">Products</a>
          <a href="contact us.html">Contact Us</a>
        </nav>
    </header>
    <br><br><br><br><br><br>
    <div class="wrapper">
    <?php while ($result = mysqli_fetch_assoc($fetch)) {
        
        if ($result['stock'] == 1) {
           
            $newPrice = $result['price'] - $result['discount'];
        //session_start();$_SESSION['singleProduct']= $result['id'];
      
    ?>
    <div class="product-card">
        <div class="badge">Hot selling</div>
        <div class="product-tumb">
            <img src="uploads/<?php echo $result['image']; ?>" alt="product" height="300" width="400">
        </div>
        <div class="product-details">
            <span class="product-category"><?php echo $result['category']; ?></span>
            <h4><a href="SingleProductDetails.php?product=<?=$result['id'];?>"><?php  echo $result['name']; ?></a></h4>
            <p><span class="fas fa-circle"></span> <?php echo $result['code']; ?></p>
            <p><?php echo $result['detail']; ?></p>
            <p>only <?php echo $result['stock']; ?> remaining</p>
            <p>Total area: <?php echo $result['size']; ?></p>
            <div class="product-bottom-details">
                <div class="product-price"><small><?php echo $result['price']; ?></small>RS <?php echo $newPrice; ?></div>
                <div class="product-links">
                    <a href=""><i class="fa fa-heart"></i></a>
                    <a href=""><i class="fa fa-shopping-cart"></i></a>
                </div>
            </div>
        </div>
    </div>
    <?php }} ?>
</div>


    
  

      
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
          <a href="index.html"> <i class="fas fa-arrow-right"></i> home  </a>
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
<script>

  //  for Responsive menu
  let menu = document.querySelector('#menu-btn')
  let navbar = document.querySelector('.navbar')
  
  menu.onclick = () => {
    console.log("Clicked")
    menu.classList.toggle('ri-close-line')
    navbar.classList.toggle('open')
    
  }
  
  window.onscroll = () => {
    menu.classList.remove('ri-close-line')
    navbar.classList.remove('open')
  }
  
  </script>
</html>



