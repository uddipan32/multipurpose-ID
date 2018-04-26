<?php
session_start();

if($_SESSION['name']!='')
{
  $name=$_SESSION['name'];
}
else
{
  header("Location:/SID/index.php");
}
include'connection.php';
$roll=$_GET['roll'];
$sql = "SELECT * FROM student_info WHERE roll='$roll'";
$result = mysqli_query($con,$sql);
if (mysqli_num_rows($result) > 0) 
    $row = mysqli_fetch_assoc($result);
if(isset($_POST['submit'])){
  $name=$_POST['name'];
  $roll=$_POST['roll'];
  $address=$_POST['address'];
  $ph=$_POST['ph'];
  $email=$_POST['email'];
  $barcode=$row["barcode"];
  $path;
  if(isset($_FILES['image'])){
      $errors= array();
      $file_name=$barcode;
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
  $updatesql="UPDATE student_info SET name='$name' , roll='$roll', email='$email', address='$address', ph_no='$ph' WHERE barcode='$barcode'";
  $update = mysqli_query($con, $updatesql);
  if($update){
    echo "Updated";
  }
  else
  {
    echo "FAIL TO SUBMIT EDITED VALUES";
  }
}
?>
<html>
<style type="text/css">
  input {
  border: 0;
  outline: 0;
  background: transparent;
  border-bottom: 1px solid black;
}
  .img {
position: relative;
overflow: hidden;
margin: 10px;
background-color: white;
border:2px solid black;
height: 128px;
width: 128px;
border-radius: 9px;
position: absolute;
    right: -5px;
    top: 170px;
text-align: center;
}


</style>
<link rel="stylesheet" type="text/css" href="../css/index.css">
<link rel="stylesheet" type="text/css" href="../css/dropdown.css">
<body>
<div class="topnav">
<a href="clg_index.php">Home</a>
<a href="#news">News</a>
<a href="admission.php">New Admission</a>
<a style="float: left" href="find_stu.php"> Find Student details</a>
<div class="dropdown">
  <?php echo $name;?><br>
   <div class="dropdown-content">
    <a href="/SID/php_pages/edit_clg.php"> edit profile</a><br>
    <a href="/SID/php_pages/logout.php"> logout</a><br>
   </div>
  </div>
</div>


<div class="admission">
<h1 color="red"><center><b><?php echo $name ?></b></center></h1>
<img src="../design_image/wave.gif" width="100%" height="10%">
  
<form method="POST" enctype="multipart/form-data" >
  <hr size="2px">
  <br>
      <b>Name of Student: </b>
      <input type="text" name="name" value='<?php echo $row["name"]; ?>' style="width:80%"/>
      <br>
      <br>
      <b> Gender: </b>
      <?php echo $row["gender"]; ?>
      <br>
      <br>
      <b>Roll No.</b>
      <input type="text" name="roll" value="<?php echo $row["roll"]; ?>" style="width:50%" placeholder="Roll No."/>
      
      <b> Date of Birth:</b>
      <input type="date" value="<?php echo $row["dob"]; ?>" name="dob">
      <br><br>
      <b>Address:</b>
      <input type="text" name="address" value="<?php echo $row["address"]; ?>" style="width:90%"/>
      <br><br>
      <b>Pincode:</b>
      <input type="text" name="pin" value="<?php echo $row["pin"]; ?>">
      <br><br>
      <b>E-mail:</b>
      <input type="email" name="email"  value="<?php echo $row["email"]; ?>" style="width:50%" placeholder="abc@gmail.com" />
      <b>Ph. No.</b>
      <input type="text" name="ph" value="<?php echo $row["ph_no"]; ?>">
      <br><br>
      <b>Father's Name:</b>
      <input type="text" value="<?php echo $row["father"]; ?>" style="width:50%" name="f_name">
      <br><br>
      <?php 
      if($row['profile_pic']!=""){
       echo " <img class='img'src='/SID/stu_image/".$row['barcode'].".jpg'></img>";
       }
       else{
        echo '<input id="uploadBtn" type="file" class="upload" name="image" accept="/" />';
      }
       ?>
      <div class="form">
      <button type="submit" name="submit">SUBMIT EDITED VALUES</button></div>
      <br><br>
      
  </form>
  </div>
</body>
</html>