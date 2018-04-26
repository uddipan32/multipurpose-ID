<?php
session_start();
if($_SESSION['name']!='')
{
	$name=$_SESSION['name'];
}
else
{
	header("Location:index.php");
}
?>

<html>
<link rel="stylesheet" type="text/css" href="../css/index.css">
<body>
<div class="topnav">
<a href="clg_index.php">Home</a>
<a href="#news">News</a>
<a href="admission.php">New Addmission</a>
<a style="float: left" href="find_stu.php"> Find Student details</a>
<a style="float: right" href="#">
<?php echo '<a href="clg_profile.php">'.$name.'</a>';?>
</a>
<a href="logout.php">logout</a>
</div>
</body>
</html>