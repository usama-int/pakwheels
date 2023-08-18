<?php

error_reporting (E_ALL ^ E_WARNING);
// error_reporting(E_ALL ^ E_WARNING); 
$update =$_GET['up'];
$servers="localhost";
$users="root";
$pwds="";
$dbname="pakwheels";
$con=new mysqli($servers,$users,$pwds,$dbname);
$query = "select * from products where id='$update'";
$fetch = mysqli_query($con, $query);
$result = mysqli_fetch_assoc($fetch)
?>
<form method="POST" enctype="multipart/form-data">
<span>Product id:</span>  <input type="number" name="id" value="<?php if($result){ echo 
$result['id'];}?>"><br><br>
<span>Product name:</span> <input type="text" name="name" value="<?php if($result){ 
echo $result['name'];}?>"><br><br>
<span>Product price:</span> <input type="float" name="price" value="<?php if($result){ echo 
$result['price'];}?>"><br><br>
<span>Product code:</span> <input type="text" name="code" value="<?php if($result){ echo 
$result['code'];}?>"><br><br>
<span>Product category:</span> <input type="text" name="category" value="<?php 
if($result){ echo $result['category'];}?>"><br><br>
<span>Product discount:</span> <input type="number" name="discount" value="<?php 
if($result){ echo $result['discount'];}?>"><br><br>
<span>Product size:</span> <input type="text" name="size" value="<?php if($result){ echo 
$result['size'];}?>"><br><br>
<span>Product in stock:</span>  <input type="checkbox" name="stock" value="1"><br><br>

<span>Product detail:</span> <input type="text" name="detail" value="<?php if($result){ 
echo $result['detail'];}?>"><br><br>
<span>Product image:</span> <input type="file" name="image" value="<?php if($result){ 
echo $result['image'];}?>"><br><br> 

<br><br>
<input type="submit" name="submit">

<a href="logout.php" class="button">Logout</a>
</form>
<?php

$id="";
$name="";
$price="";
$code="";
$category="";
$discount="";
$size="";
$stock="";
$detail="";
$file_name="";

if(isset($_POST['submit'])){

  $target_dir = "uploads/";
  $target_file = $target_dir . basename($_FILES["image"]["name"]);
  $file_name = basename($_FILES["image"]["name"]);
  $uploadOk = 1;
  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
  
  //Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    
  }
  
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" && $imageFileType != "docx") {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    }
  
  else if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
  {
        echo "The file  has been uploaded.";
    } 


$id=$_POST['id'];
$name= $_POST['name'];
$price= $_POST['price'];
$code= $_POST['code'];
$category= $_POST['category'];
$discount= $_POST['discount'];
$size= $_POST['size'];
$stock= $_POST['stock'];
$detail= $_POST['detail'];
$picture= $_POST['picture'];
}
$del = $_GET['de'];
$update =$_GET['up'];
$servers="localhost";
$users="root";
$pwds="";
$dbname="pakwheels";
$con=new mysqli($servers,$users,$pwds,$dbname);
if($con){
echo "database connected";
}else{
echo "database error";
}
// insertion into the data base
$sql = "insert into products (id, name, 
price,code,category,discount,size,stock,detail,image) values 
('$id', '$name', 
'$price','$code','$category','$discount','$size','$stock','$detail','$file_name')";
$insert = mysqli_query($con,$sql);
if($insert){echo "inserted";}
else{echo "data not inserted";}



$deleteQuery="delete from products where id= '$del'";
$delete = mysqli_query($con, $deleteQuery);
if($delete){
echo "row deleted successfuly";}
else{
echo "row not deleted";}
$query3 = "update products set id='$id', name ='$name', price='$price', 
code='$code', category='$category', discount='$discount', size='$size', 
stock='$stock', detail='$detail' where id='$update'";
$update= mysqli_query($con,$query3);
if($update){
 echo"row updated";}
 else{
 echo"row not updated";
 }
 $query = "select * from products";
$fetch = mysqli_query($con, $query);
while ($result = mysqli_fetch_assoc($fetch)) {
?>
    <style>
        /* CSS styles for addProducts.php */
        
        * {
            box-sizing: border-box;
        }
        
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f2f2f2;
        }
        
        form {
            text-align: center;
            margin-top: 200px;
            justify-content: center;
        }
        
        input,
        span {
            font-size: 20px;
            font-weight: bold;
        }
        
        .button {
            background-color: #4CAF50;
            /* Green */
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
        }
        
        table {
    width: 100%;
    border-collapse: collapse;
}

table td,
table th {
    padding: 8px;
    text-align: left;
    border: 1px solid #ddd;
}

table th {
    background-color: #4CAF50;
    color: white;
}

table tr:nth-child(even) {
    background-color: #f2f2f2;
}

table th:first-child,
table td:first-child {
    border-left: none;
}

table th:last-child,
table td:last-child {
    border-right: none;
}

table tr:first-child th {
    border-top: none;
}

table tr:last-child td {
    border-bottom: none;
}

table tr td:first-child {
    counter-increment: rowNumber;
}

table tr td:first-child::before {
    content: counter(rowNumber);
    min-width: 1em;
    margin-right: 0.5em;
}
    </style>
<table border="1">
<tr>
    
<td> <?php echo $result['id']; ?> </td>
<td> <?php echo $result['name']; ?> </td>
<td> <?php echo $result['price']; ?> </td>
<td> <?php echo $result['code']; ?> </td>
<td> <?php echo $result['category']; ?> </td>
<td> <?php echo $result['discount']; ?> </td>
<td> <?php echo $result['size']; ?> </td>
<td> <?php echo $result['stock']; ?> </td>
<td> <?php echo $result['detail']; ?> </td>

<td> <img src="uploads/<?php echo $result['image']; ?>" alt="product" height="100" width="100">
</td> 
<td> <a href="addProducts.php?de=<?php echo $result['id'];?> ">Delete </td>
<td> <a href="addProducts.php?up=<?php echo $result['id'];?> ">Update 
</td>
</tr>
<?php } ?>
</table>