<?php
include 'connection.php';
session_start();
if($_SESSION['stu_name']!='')
{
	$name=$_SESSION['stu_name'];
	$barcode=$_SESSION['barcode'];
}
else
{
	header("Location:index.php");
}

$query="SELECT * FROM `student_info` WHERE name='$name' AND barcode='$barcode'";
$result = mysqli_query($con, $query);
 $row = mysqli_fetch_assoc($result);
 $_SESSION['clg_name']=$row['clg_name'];
 $_SESSION['branch']=$row['branch'];
 $_SESSION['roll']=$row['roll'];

?>

<html>
<link rel="stylesheet" type="text/css" href="/SID/css/index.css">
<body>
<div class="topnav">
<a href="student_index.php">Home</a>
<a href="stu_marksheet.php">Marksheet</a>
<a style="float: left" href="stu_admit.php">Admit Card</a>
<a style="float: right" href="#">
<?php echo $name;?>
</a>
<a href="logout.php">logout</a>
</div>
<div class="admission" style="width:50%; left:1cm; top:90px;  position: absolute;">
<h1>NOTICE</h1>
<form method="POST">
<?php
if(empty($_POST['next'])){
$query = "SELECT id,user, text, image, date, time FROM notice ORDER BY id DESC LIMIT 5";
}
if(isset($_POST['next'])){
	$id=$_SESSION['id'];
	$query = "SELECT id,user, text, image, date, time FROM notice WHERE id<$id ORDER BY id DESC LIMIT 5";
}
if(isset($_POST['previous'])){
	$id=$_SESSION['id'];
	$query = "SELECT id,user, text, image, date, time FROM notice WHERE id<$id ORDER BY id DESC LIMIT 5";
}
	
$result = mysqli_query($con,$query);
if (mysqli_num_rows($result) > 0) {
    while($row1 = mysqli_fetch_assoc($result)) {
    	$_SESSION['id']=$row1['id'];
    	echo '<h3 style="color:blue">'.$row1['user'].'</h3>';
    	if($row1['image']!=null){
    		echo '<img src="'.$row1['image'].'" width="50%"><br>';
    		echo $row1['text'].'<br>';
    	}
    	else
    		echo $row1['text'].'<br>';
    	echo $row1['date'].' at '.$row1['time'];
    }
}

?>

<input type="submit" name="next" value="next">
<input type="submit" name="previous" value="previous">
</form>
</div>
<div style="width: 30%; position: absolute; right: .5cm">
<div class="admission" style="right:.5cm">
 <?php
echo '<img scr="/SID/stu_image/'.$row['barcode'].'.jpg"><br>
<label><b>Name: </b>'.$row['name'].'</label><br>
<label><b>Roll: </b>'.$row['roll'].'</label><br>
<label><b>Email: </b>'.$row['email'].'</label><br>
<label><b>Branch: </b>' .$row['branch'].' engineering</label>'; 
?>
</div>
<div style="width:8.7cm; position: absolute;">
<img src="/SID/id_front.jpg" width="100%">
<img src="/SID/stu_image/<?php echo $row['barcode']?>.jpg" style="width:80px ;border-radius: 50%; position: absolute; top: .5cm; left: .5cm;">
<label style="color: white; position: absolute; top: 2.6cm; left: .5cm;"><?php echo $row['name'];?></label>
<label style="color: white; position: absolute; top: 3.2cm; left: .5cm;"><?php echo $row['roll'];?></label>
<label style="color: white; position: absolute; top: 3.8cm; left: .5cm;"><?php echo $row['branch'];?></label>
<label style="color: white; position: absolute; top: 1.2cm; left: 6cm; font-size: 8px; width: 100px; text-align: center;"><?php echo $name;?></label>
</div>
</div>
</body>
</html>