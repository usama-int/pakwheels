
<?php

if($_POST){


$servers="localhost";
$users="root";
$pwds="";
$dbname="pakwheels";
$con=new mysqli($servers,$users,$pwds,$dbname);

$username=$_POST['username'];
$password=$_POST['password'];

$query="SELECT * FROM users WHERE username='$username' && password='$password'";
$result=mysqli_query($con,$query);
if(mysqli_num_rows($result)>0){

  // Starting session So we can use on other pages
  session_start();
  $_SESSION['auth']= 'true';
  header('location:addProducts.php');

}
else{

  header('location:login.php');
}
}
?>
<style>
  form{
    
    text-align: center;
    margin-top: 300px;
    justify-content: center;
  
  }
  input,span{
    font-size: 20px;
    font-weight: bold;
  }
  .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
}
  
 
</style>

<form method="POST" class="form">
<h1>Welcome to Admin panel</h1>
 <span>User name: </span>   <input type="text" name="username" placeholder="admin name"><br><br>
<span>Password:  </span>  <input type="password" name="password" placeholder="password" id=""><br><br>

    <input type="submit" name="submit" value="login" class="button">
</form>
