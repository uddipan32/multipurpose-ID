<?php
include'connection.php';
if(isset($_POST['submit']))
{
	if(strlen($_POST['clg_name'])<3)
	{
		header("Location:signup.php?err=".urlencode("The college must be 3 character long"));
		exit();
	}
	else if(strlen($_POST['password'])<8)
	{
		header("Location:signup.php?err=".urlencode("The password must be 8 character long"));
		exit();
	}
	else if(strlen($_POST['password']!=$_POST['re-password']))
	{
		header("Location:signup.php?err=".urlencode("The password and re-password are not same"));
		exit();
	}
	else if(!IsUnique($_POST['email'],$con))
	{
		header("Location:signup.php?err=".urlencode("The email is already registered"));
		exit();
	}
	
	else{
		$u=$_POST['clg_name'];
		$e=$_POST['email'];
		$p=$_POST['password'];
		$a=$_POST['address'];
		$sql="insert into login values('$u','$p','$e','$a')";
		mysqli_query($con,$sql);
	}
	 if(isset($_FILES['image'])){
      $errors= array();
      $file_name=$u;
      //$file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      if(in_array($file_ext,$expensions)=== false){
         $errors[]="extension not allowed, please choose a JPEG or PNG file.";
      }
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../stu_image/".$file_name.".".$file_ext);
         echo "Success";
      }else{
         print_r($errors);
      }
  }
}
function IsUnique($email,$con)
{
	$query="select * from login where email='$email'";
	$result=mysqli_query($con,$query);
	$rowctr=mysqli_num_rows($result);
	if($rowctr>0)
	{
		return false;
	}
	else return true;
}

?>


<html>
<link rel="stylesheet" type="text/css" href="../css/index.css">
<body>
<div class="login-pageborder">


<div class="login-page">
<div class="form">
<?php if(isset($_GET['err'])){?>
        <div class="alert-wrong">
        <?php echo $_GET['err'];?>
        </div>
        <?php }?>
  
<form method="POST" class="login-form" enctype="multipart/form-data">
      <input type="text" name="clg_name" placeholder="College Name" title="College Name" />
      <input type="email" name="email" placeholder="email address" title="Email address"/>
      <input type="password" name="password" placeholder="password" title="password">
      <input type="password" name="re-password" placeholder="re-enter the password" />
      <textarea placeholder="Address" name="address"></textarea>
      <input id="uploadBtn" type="file" class="upload" name="image" accept="/" />
      <input type="submit" class="form button" name="submit" value="register"/>

    </form>
   </div>
  </div>
</body>
</html>