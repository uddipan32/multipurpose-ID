<?php
include 'connection.php';
session_start();
if($_SESSION['name']!='')
{
	$name=$_SESSION['name'];
}
else
{
	header("Location:index.php");
}

$query="SELECT * FROM `login` WHERE clg_name='$name'";
$result = mysqli_query($con, $query);
if (mysqli_num_rows($result) > 0){
    $row = mysqli_fetch_assoc($result);
	$p = $row['password'];
 	 //$e=$row['email'];
 	 $u=$row['clg_name'];
}

 $clg_pic="/stu_image/".$name.".png";
?>
<html>
<link rel="stylesheet" type="text/css" href="../css/index.css">
<style>
.table {
    border: solid 1px #DDEEEE;
    border-collapse: collapse;
    margin: auto;
    border-spacing: 0;
    font: normal 20px Arial, sans-serif;

}
.photo {
	display: block;
  margin-left: auto;
  margin-right: auto;

}
.table tr th {
    background-color: white;
    border: solid 1px #DDEEEE;
    color: #336B6B;
    padding: 10px;
    text-align: left;
    text-shadow: 1px 1px 1px #fff;
     width:20%;
}
.table tbody td {
    border: solid 1px #DDEEEE;
    color: #333; 
    padding: 10px;
    text-shadow: 1px 1px 1px #fff;
}
</style>
<div class="topnav">
<a href="clg_index.php">Home</a>
<a href="#news">News</a>
<a href="admission.php">New Addmission</a>
<a style="float: left" href="#Find student details"> Find Student details</a>
<a style="float: right" href="clg_profile.php">
<?php echo $name;?>
</a>
<a href="logout.php">logout</a>
</div>
</body><br>
<img class="photo" src="<?php echo $clg_pic; ?>" width="150"><br>
<div class="admission">
<table class="table">
<tr><th>Username</th><td><?php echo $u ?></td></tr>
<tr><th>Email Address</th><td><?php echo $e ?></td></tr>
<tr><th>Password</th><td><?php echo $p ?></td></tr>
<tr><th></th><td><a href="edit_clg.php">Edit Profile</a></td></tr>
</table>
</div>

