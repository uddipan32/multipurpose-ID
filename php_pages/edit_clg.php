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
$query="SELECT * FROM `login` WHERE name='$name'";
$result = mysqli_query($con, $query);
 $row = mysqli_fetch_assoc($result);
if (isset($_POST['update']))
{
	$clg_name=$_POST['clg_name'];
	$password=$_POST['password'];
  $email=$_POST['email'];
  $pass=$_POST['password'];
  $address=$_POST['address'];
  $logo_path;

    if(isset($_FILES['image'])){
      $errors= array();
      $file_name=$clg_name;
      //$file_name = $_FILES['image']['name'];
      $file_size =$_FILES['image']['size'];
      $file_tmp =$_FILES['image']['tmp_name'];
      $file_type=$_FILES['image']['type'];
      $file_ext=strtolower(end(explode('.',$_FILES['image']['name'])));
      
      $expensions= array("jpeg","jpg","png");
      
      
      if($file_size > 2097152){
         $errors[]='File size must be excately 2 MB';
      }
      
      if(empty($errors)==true){
         move_uploaded_file($file_tmp,"../clg_logo/".$file_name.".".$file_ext);
         $logo_path="/SID/clg_logo/".$file_name.".".$file_ext;
         //echo "Success";
      }else{
         print_r($errors);
      }
  }
  $sql="UPDATE login SET name='$clg_name' , password='$password', email='$email', address='$address', logo='$logo_path' WHERE name='$name'";

    $update = mysqli_query($con, $sql);
    if($update){
        echo "Updated";
    }
    else
    {
        echo "FAIL";
    }
  }
?>

<html>
<link rel="stylesheet" type="text/css" href="../css/index.css">
<link rel="stylesheet" type="text/css" href="../css/dropdown.css">
<style type="text/css">
.form-style-1 {
    margin:auto;
    max-width: 400px;
   
    font: 20px "Lucida Sans Unicode", "Lucida Grande", sans-serif;
}
.form-style-1 label{
    margin:0 0 3px 0;
    padding:5px;
    display:block;
    font-weight: bold;
}
.form-style-1 input[type=text],
.form-style-1 input[type=password], 
.form-style-1 input[type=date],
.form-style-1 input[type=datetime],
.form-style-1 input[type=number],
.form-style-1 input[type=search],
.form-style-1 input[type=time],
.form-style-1 input[type=url],
.form-style-1 input[type=email],
textarea, 
select{
    box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    border:1px solid #BEBEBE;
    padding: 17px;
    -webkit-transition: all 0.30s ease-in-out;
    -moz-transition: all 0.30s ease-in-out;
    -ms-transition: all 0.30s ease-in-out;
    -o-transition: all 0.30s ease-in-out;
    outline: none;  
}
.form-style-1 input[type=text]:focus, 
.form-style-1 input[type=email]:focus,
.form-style-1 textarea:focus, 
.form-style-1 select:focus{
    -moz-box-shadow: 0 0 8px #88D5E9;
    -webkit-box-shadow: 0 0 8px #88D5E9;
    box-shadow: 0 0 8px #88D5E9;
    border: 1px solid #88D5E9;
}
.form-style-1 .field-long{
    width: 80%;
}

.form-style-1 .field-textarea{
    height: 80px;
}
.form-style-1 input[type=submit],
.form-style-1 input[type=button]{
    border: none;
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
}
.form-style-1 input[type=submit]:hover,
.form-style-1 input[type=button]:hover{
    background: #EA7B00;
    color: #fff;
}
}

</style>
<body>
<div class="topnav">
<a href="clg_index.php">Home</a>
<a href="#news">News</a>
<a href="admission.php">New Addmission</a>
<a style="float: left" href="#Find student details"> Find Student details</a>
<div class="dropdown">
  <?php echo $name;?><br>
   <div class="dropdown-content">
    <a href="/SID/php_pages/edit_clg.php"> edit profile</a><br>
    <a href="/SID/php_pages/logout.php"> logout</a><br>
   </div>
  </div>
</div>


<div class="admission">

<form method="post" action="" class="form-style-1" enctype="multipart/form-data">
<?php echo '<img src="'.$row['logo'].'">';?>
<label>College Name:</label><input type="text" name="clg_name" class="field-long"  value="<?php echo $row['name'] ; ?>" />
<label>Email:</label><input type="email" name="email" class="field-long"  value="<?php echo $row['email'] ; ?>"/>
<label>Password:</label><input type="password" name="password" class="field-long"  value="<?php echo $row['password'] ; ?>">
<label>Re-password:</label><input type="password" name="re-password" class="field-long"  />
<label>Address:</label><input type="text" name="address" class="field-long" value="<?php echo $row['address'] ; ?>">
<br>

<label>Change college logo:</label><input id="uploadBtn" type="file" class="upload" name="image" accept="/" />
<br>
<input type="submit" class="submit" name="update" value="Update">
</form>
</div>
</body>
</html>