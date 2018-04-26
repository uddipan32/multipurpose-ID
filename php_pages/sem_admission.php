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
if(isset($_POST['submit'])){
	$roll=$_POST['roll'];
	$sem=$_POST['sem'];
	$sql="UPDATE student_info SET sem='$sem' WHERE roll='$roll'";
	$update = mysqli_query($con, $sql);
	if($update){
		echo "Admission done for ".$roll." to" .$sem;
	}
	else
	{
		echo "FAIL";
	}
}
?>

<html>
<style type="text/css">

</style>
<link rel="stylesheet" type="text/css" href="/SID/css/index.css">
<link rel="stylesheet" type="text/css" href="/SID/css/dropdown.css">
<body>
<div class="topnav">
<a href="clg_index.php">Home</a>
<a href="#news">News</a>
<a href="admission.php">New Addmission</a>
<a href="sem_admission.php">Semester Admission</a>
<a style="float: left" href="find_stu.php"> Find Student details</a>
<div class="dropdown">
  <?php echo $name;?><br>
   <div class="dropdown-content">
    <a href="/SID/php_pages/edit_clg.php"> edit profile</a><br>
    <a href="/SID/php_pages/logout.php"> logout</a><br>
   </div>
  </div>
<div class="login-pageborder">
<div class="login-page">
<div class="form">
<form method="POST" class="login-form" >
      <input type="text" name="roll" placeholder="Roll No."/>
      <input type="radio" name="sem" value="2nd">2nd sem</input>
      <input type="radio" name="sem" value="3rd">3rd sem</input>
      <input type="radio" name="sem" value="4th">4th sem</input>
      <input type="radio" name="sem" value="5th">5th sem</input>
      <input type="radio" name="sem" value="6th">6th sem</input>
      <button type="submit" value="ADMISSION" name="submit">Submit</button>
    </form>
</div>
</div>
</div>
</div>
</body>
</html>