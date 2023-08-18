<?php

$update =$_GET['up'];

$servers="localhost";
$users="root";
$pwds="";
$dbname="student";
$con=new mysqli($servers,$users,$pwds,$dbname);


$query = "select * from std where sapid='$update'";
$fetch = mysqli_query($con, $query);
$result = mysqli_fetch_assoc($fetch)


?>



<form  method="POST">
Sap ID: <input type="text" name="sapid"  value="<?php if($result){ echo $result['sapid'];}?>"><br>
Name: <input type="text" name="name" value="<?php if( $result){echo $result['name'];}?>"><br>
Fee: <input type="number" name="fee" value="<?php if( $result) { echo $result['fee'];}?>"><br>
CGPA: <input type="number" name="cgpa" value="<?php if( $result) {echo  $result['cgpa'];}?>"><br>
Degree Name: <input type="name" name="degreeName" value="<?php if( $result) {echo $result['degreeName'];}?>"><br>
<br><br>

<input type="submit" name="submit">
</form>

<?php
$sapid="";
$name="";
$fee="";
$cgpa="";
$degreeName="";

if(isset($_POST['submit'])){
$sapid= $_POST['sapid'];
$name= $_POST['name'];
$fee= $_POST['fee'];
$cgpa= $_POST['cgpa'];
$degreeName= $_POST['degreeName'];

}

$del = $_GET['de'];
$update =$_GET['up'];

$servers="localhost";
$users="root";
$pwds="";
$dbname="student";
$con=new mysqli($servers,$users,$pwds,$dbname);
if($con){
echo "database connected";
}else{
echo "database error";
}

$sql = "insert into std (sapid, name, fee,cgpa,degreeName) values ('$sapid', '$name', '$fee','$cgpa','$degreeName')";
$insert = mysqli_query($con,$sql);

if($insert){echo "inserted";}
else{echo "data not inserted";}

$deleteQuery="delete from std where sapid= '$del'";
$delete = mysqli_query($con, $deleteQuery);
if($delete){
echo "row deleted successfuly";}
else{
echo "row not deleted";}

$query3 = "update std set sapid='$sapid', name ='$name', fee='$fee', cgpa='$cgpa', degreeName='$degreeName' where sapid='$update'";
$update= mysqli_query($con,$query3);


if($update){
echo"row updated";}
else{
echo"row not updated";
}

$query = "select * from std";
$fetch = mysqli_query($con, $query);
while ($result = mysqli_fetch_assoc($fetch))  {

?>
<table border="1">
<tr>
<td> <?php echo $result['sapid']; ?> </td>
<td> <?php echo $result['name']; ?> </td>
<td> <?php echo $result['fee']; ?> </td>
<td> <?php echo $result['cgpa']; ?> </td>
<td> <?php echo $result['degreeName']; ?> </td>
<td> <a href="form.php?de=<?php echo $result['sapid'];?> ">Delete </td>
<td> <a href="form.php?up=<?php echo $result['sapid'];?> ">Update </td>

</tr>
<?php } ?>
</table> 