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
    <meta name="viewport" content="width= , initial-scale=1.0">
    <title>Pak Wheels</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <link rel="stylesheet" href="index.css">
  <style>

@import url('https://fonts.googleapis.com/css?family=Roboto:400,500,700');
*
{
    -webkit-box-sizing: border-box;
            box-sizing: border-box;
    margin: 0;
    padding: 0;
}


body
{
    font-family: 'Roboto', sans-serif;
}
a
{
    text-decoration: none;
}
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

@media screen and (max-width: 768px) {
    .product-card {
        width: 100%;
    }
}

  </style>  

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

    <!--Home section start-->


<section class="home" id="home">

    <h1 class="home-parallax" data-speed="-2">what you want</h1>


    
    <img class="home-parallax" data-speed="5" src="yellow audi.png" alt="">
    <a href="#" class="btn home-parallax" data-speed="7">explore cars</a>
    
</section>
<!--Home section end-->

<!--icon section start-->

<section class="icons-container">

<div class="icons">
    <i class="fas fa-home"></i>
    <div class="content">
        <h3>150+</h3>
        <p>branches</p>
    </div>
</div>

<div class="icons">
    <i class="fas fa-car"></i>
    <div class="content">
        <h3>4770+</h3>
        <p>cars sold</p>
  
    </div>
</div>
<div class="icons">
    <i class="fas fa-users"></i>
    <div class="content">
        <h3>590+</h3>
        <p>happy clients</p>
    </div>
</div>


<div class="icons">
    <i class="fas fa-car"></i>
    <div class="content">
        <h3>890+</h3>
      
        <p>new cars</p>
    </div>
</div>

</section>

<!--icon section end-->



<!--vehicle section start-->

<section class="vehicle" id="vehicles">


<h1 class="heading"> Listed Products  <span>vehicles</span></h1>

<div class="vehicles-slider">
<div class="wrapper">
    <?php while ($result = mysqli_fetch_assoc($fetch)) {
        if ($result['stock'] == 1) {
            $newPrice = $result['price'] - $result['discount'];
    ?>
    <div class="product-card">
        <div class="badge">Hot selling</div>
        <div class="product-tumb">
            <img src="uploads/<?php echo $result['image']; ?>" alt="product" height="300" width="400">
        </div>
        <div class="product-details">
            <span class="product-category"><?php echo $result['category']; ?></span>
            <h4><a href=""><?php echo $result['name']; ?></a></h4>
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

</div>
</section>
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


