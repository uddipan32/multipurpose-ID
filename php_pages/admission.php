<?php
session_start();
$name=$_SESSION['name'];
include'connection.php';

if($_SESSION['name']!='')
{
  $name=$_SESSION['name'];
}
else
{
  header("Location:/SID/index.php");
}
if(isset($_POST['submit']))
{
    $b=$_POST['branch'];
		$n=$_POST['name'];
		$g=$_POST['gender'];
		$r=$_POST['roll'];
		$a=$_POST['address'];
		$e=$_POST['email'];
		$f=$_POST['f_name'];
		$a=$_POST['address'];
    $d=$_POST['dob'];
    $p=$_POST['pin'];
    $ph=$_POST['ph'];
    $s="1st";
    include'barcode.php';
		
  if(isset($_FILES['image'])){
      $errors= array();
      $file_name=$br;
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
         $path="/SID/stu_image/".$file_name.".".$file_ext;
      }else{
         print_r($errors);
      }
  }
  $sql="INSERT INTO student_info (barcode,password,branch,name,gender,roll,dob,address,email,sem,father,clg_name,pin,ph_no,profile_pic) VALUES('$br','$d','$b','$n','$g','$r','$d','$a','$e','$s','$f','$name','$p','$ph','$path')";
    mysqli_query($con,$sql);

}
?>


<html>
<style type="text/css">
  .fileUpload {
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
.fileUpload input.upload {
position: absolute;
top: 0;
right: 0;
margin: 0;
padding: 0;
font-size: 20px;
cursor: pointer;
opacity: 0;
filter: alpha(opacity=0);
height: 100%;
text-align: center;
}
.custom-span{ font-family: Arial; font-weight: bold;font-size: 24px; color: black}
#uploadFile{border: none;margin-left: 10px; width: 200px;}


  input {
  border: 0;
  outline: 0;
  background: transparent;
  border-bottom: 1px solid black;
}
.submit{
  font-family: "Roboto", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #4CAF50;
  width: 100%;
  border: 0;
  padding: 15px;
  color: #FFFFFF;
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
}

</style>
<link rel="stylesheet" type="text/css" href="../css/index.css">
<link rel="stylesheet" type="text/css" href="../css/dropdown.css">
<body>
<div class="topnav">
<a href="clg_index.php">Home</a>
<a href="#news">News</a>
<a href="/SID/php_pages/admission.php">New Admission</a>
<a style="float: left" href="find_stu.php"> Find Student details</a>
<div class="dropdown">
  <?php echo $name;?><br>
   <div class="dropdown-content">
    <a href="/SID/php_pages/edit_clg.php"> edit profile</a><br>
    <a href="/SID/php_pages/logout.php"> logout</a><br>
   </div>
  </div></div>


<div class="admission">
<center><?php echo'<img src="/SID/clg_logo/'.$name.'.jpg">';?></center>
<h1 color="red"><center><b><?php echo $name ?></b></center></h1>
<img src="../design_image/wave.gif" width="100%" height="10%">
  
<form method="POST" enctype="multipart/form-data" >
  <hr size="2px">
  <br>
      <b>Name of Student: </b>
      <input type="text" name="name" style="width:80%" placeholder="" required />
      <br>
      <br>
      <b> Gender: </b>
      <input type="radio" name="gender" value="male"> Male
      <input type="radio" name="gender" value="female"> Female
      <br>
      <br>
      <b>Branch:</b>
      <input type="text" name="branch" style="width:50%" required />
      <br>
      <br>
      <b>Roll No.</b>
      <input type="text" name="roll" style="width:50%" required />
      
      <b> Date of Birth:</b>
      <input type="date" name="dob">
      <br><br>
      <b>Address:</b>
      <input type="text" name="address" style="width:90%"/>
      <br><br>
      <b>Pincode:</b>
      <input type="text" name="pin">
      <br><br>
      <b>E-mail:</b>
      <input type="email" name="email" style="width:50%" placeholder="abc@gmail.com" required />
      <b>Ph. No.</b>
      <input type="text" name="ph" required>
      <br><br>
      <b>Father's Name:</b>
      <input type="text" style="width:50%" name="f_name" required>
      <br><br>
      <div class="fileUpload">
      <span class="custom-span">upload image</span>
      <script type="text/javascript">
      </script>
       <input id="uploadBtn" type="file" class="upload" name="image" accept="/" />
       </div>
      <input type="submit" class="submit" name="submit" value="register"/>

  </form>
  </div>
</body>
</html>