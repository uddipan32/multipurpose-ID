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
	$text=$_POST['text'];
	$date=date("y:m:d");
	$time=date("h:i:s");

	if(isset($_FILES['image'])){
      $errors= array();
      $file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../notice/".$file_name);
         echo "Success";
      }else{
         print_r($errors);
      }
      if($file_name!=null){
      $image="/SID/notice/".$file_name;
      $sql="INSERT INTO notice(user,text,image,date,time) VALUES('$name','$text','$image','$date','$time')";
		mysqli_query($con,$sql);}
  	  else
  		{
  		$sql="INSERT INTO notice(user,text,date,time) VALUES('$name','$text','$date','$time')";
		mysqli_query($con,$sql);
  		}

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
</div>
<div class="dropdown" style="position: absolute; right:.5cm; top:.2cm">
  <?php echo $name;?><br>
   <div class="dropdown-content">
    <a href="/SID/php_pages/edit_clg.php"> edit profile</a></br>
    <a href="/SID/php_pages/logout.php"> logout</a><br>
  </div>
  </div>
<table>
<td>
<div class="menu_box">
<a href="admission.php"><img src="/SID/png icon/new-user.png" width="100%">New Admission</a>
</div>
</td>
<td>
<div class="menu_box">
<a href="sem_admission.php"><img src="/SID/png icon/college-graduation.png" width="100%" >Semester Admission</a>
</div>
</td>
<td>
<div class="menu_box">
<a href="find_stu.php"><img src="/SID/png icon/zoom-tool.png" width="100%" >Find Student Details</a>
</div>
</td>
<tr>
<td>
<div class="menu_box">
<a href="add_library.php"><img src="/SID/png icon/plus-symbol-in-a-rounded-black-square.png" width="100%" >Create Library</a>
<td>
<div class="menu_box">
<a href="edit_clg.php"><img src="/SID/png icon/edit-interface-sign.png" width="100%" >Edit Profile</a>
</table>
<div class="admission" style="width:30%; right:1cm; top:90px;  position: absolute;">
<form method="POST" enctype="multipart/form-data" >
<h1>NOTICE</h1>
<textarea name="text" style="width:90%; height: 40px"></textarea>
<input type="submit" value="POST" name="submit" style="border: none;
    margin:auto;
    padding: 8px 15px 8px 15px;
    background: #FF8500;
    color: #fff;
    box-shadow: 1px 1px 4px #DADADA;
    -moz-box-shadow: 1px 1px 4px #DADADA;
    -webkit-box-shadow: 1px 1px 4px #DADADA;
    border-radius: 3px;
    -webkit-border-radius: 3px;
    -moz-border-radius: 3px;
">
<input id="uploadBtn" type="file" class="upload" name="image" accept="/" />
</form>
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
if(isset($_POST['delete'])){
	$i=$_POST['delete'];
	$sql1 = "DELETE FROM notice WHERE id=$i ";
	mysqli_query($con,$sql1);
}
$result = mysqli_query($con,$query);
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
    	$_SESSION['id']=$row['id'];
    	echo '<h3 style="color:blue">'.$row['user'].'</h3>';
    	if($row['image']!=null){
    		echo '<img src="'.$row['image'].'" width="50%"><br>';
    		echo $row['text'].'<br>';
    	}
    	else
    		echo $row['text'].'<br>';
    	echo $row['date'].' at '.$row['time'];
    	echo '<button name="delete" value="'.$row['id'].'"><img src="/SID/png icon/delete-bin.png" width="10px" height="10px"></button>';  
    }
}

?>

<input type="submit" name="next" value="next">
<input type="submit" name="previous" value="previous">
</form>
</body>
</html>