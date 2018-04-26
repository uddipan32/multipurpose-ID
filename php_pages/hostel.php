<?php
session_start();
include'connection.php';
if($_SESSION['name']!='')
{
	$name=$_SESSION['name'];
}
else
{
	header("Location:index.php");
}
$query="SELECT * FROM `hostel` WHERE clg_name='$name'";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
	$roll = $row['rollno'];
    $address=$row['address']; 
 	 $fname=$row['fname'];
 	 $phno=$row['phoneno'];	 
 	 $sem=$row['sem'];
} 	
?>
<html>
<link rel="stylesheet" type="text/css" href="../css/index.css">
<div class="admission" style="background:selver;width: 100px; height: 100px; position: absolute; border:6px solid green; margin:20px; positin:relative;">
<a href="#"><img src=""></a>
</div>
</html>
