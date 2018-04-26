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
if(isset($_POST['submit'])){
	$n=$_POST['name'];
	$a=$_POST['address'];
	$email=$_POST['email'];
	$pass=$_POST['password'];
	$re_pass=$_POST['re-password'];
	$type="college";
	if($pass!=$re_pass){
		header("Location:add_clg.php?err=password not match");
	}
	else{
		
			$query="INSERT INTO login (name,password,email,address,type) values('$n','$pass','$email','$a','$type')";
			mysqli_query($con,$query);
			echo "Successfully add new college";
			/*$sql="CREATE TABLE ".$n."_student (`barcode` varchar(50), `password` text, `branch` varchar(20), `name` text, `roll` text, `sem` varchar(5), `gender` varchar(10), `dob` date, `address` text, `pin` int(6), `ph_no` int(10), `email` varchar(60), `father` text, `clg_name` text, `library` tinyint(1),`hostel` tinyint(1))";
			mysqli_query($con,$sql);
			*/
		
}
}
?>
<html>
<link rel="stylesheet" type="text/css" href="/SID/css/index.css">
<link rel="stylesheet" type="text/css" href="/SID/css/dropdown.css">
<body>
<div class="topnav">
<a href="office.php">Home</a>
<a href="add_clg.php">Add College</a>
<a href="marksheet.php">Result</a>
<a href="admit.php">Admit</a>
</div>
<div class="dropdown" style="position: absolute; right:.5cm; top:.2cm">
  <?php echo $name;?><br>
   <div class="dropdown-content">
    <a href="/SID/php_pages/logout.php"> logout</a><br>
  </div>
  </div>
<form method="POST" class="form">
<?php if(isset($_GET['err'])){?>
        <div class="alert-wrong">
        <?php echo $_GET['err'];?>
        </div>
        <?php }?>
<label> Enter the name of the College</label>
<input type="text" name="name">
<label> Enter the address:</label>
<input type="text" name="address">
<label> E-mail:</label>
<input type="mail" name="email">
<label> Password:</label>
<input type="password" name="password"></input>
<label> Re_enter the password:</label>
<input type="password" name="re-password" ></input>
<button type="submit" name="submit">CREATE</button>
 </body>
 </html>