<?php
session_start();
include'connection.php';
if($_SESSION['name']!='')
{
	$name=$_SESSION['name'];
}
else
{
	header("Location:/SID/index.php");
}
if(isset($_POST['submit'])){
	$n=$_POST['name'];
	$a=$_POST['address'];
	$email=$_POST['email'];
	$pass=$_POST['password'];
	$re_pass=$_POST['re-password'];
	if($pass!=$re_pass){
		header("Location:add_H_L.php?err=password not match");
	}
	else{
			$queryl="INSERT INTO login (name,password,email,address,type,college) values('$n','$pass','$email','$a','library','$name')";
			mysqli_query($con,$queryl);
		}
}

?>
<html>
<link rel="stylesheet" type="text/css" href="/SID/css/index.css">
<link rel="stylesheet" type="text/css" href="/SID/css/dropdown.css">
<body>
<div class="topnav">
<a href="clg_index.php">Home</a>
<a href="#news">News</a>
<a href="admission.php">New Addmission</a>
<a href="sem_admission.php">Semester Admission</a>
<a style="float: left" href="find_stu.php"> Find Student details</a>
</div>
<div class="dropdown" style="position: absolute; right:.5cm; top:.2cm">
  <?php echo $name;?><br>
   <div class="dropdown-content">
    <a href="/SID/php_pages/edit_clg.php"> edit profile</a><br>
    <a href="/SID/php_pages/logout.php"> logout</a><br>
  </div>
  </div>
<form method="POST" class="form">
<label> Enter the name of library:</label>
<input type="text" name="name">
<label> Enter the address:</label>
<input type="text" name="address">
<label> E-mail:</label>
<input type="mail" name="email">
<br>
<label> Password:</label>
<input type="password" name="password"></input>
<label> Re_enter the password:</label>
<input type="password" name="re-password" ></input>
<button type="submit" name="submit">CREATE</button>
 </body>
 </html>