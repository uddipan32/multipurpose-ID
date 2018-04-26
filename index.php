
<?php
include'/php_pages/connection.php';
session_start();
$_SESSION['path']="Location:/SID/index.php";
if(isset($_POST['c_login']))
{
  $u=$_POST['uname'];
  $p=$_POST['password'];
  $query="SELECT * FROM `login` WHERE name='$u' and password='$p'";
  $result = mysqli_query($con, $query) or die(mysqli_error($con));
  $count = mysqli_num_rows($result);
  $row = mysqli_fetch_assoc($result);
  if($count==1){
    $_SESSION['name']=$u;
    setcookie("name",$u,time()+43200);  // 12 hour is 4200 second-->
    if($row['type']=="college")
     header("Location:php_pages/clg_index.php");
    elseif($row['type']=="library"){
      $_SESSION['add_by']=$row['college'];
     header("Location:php_pages/library.php");
    }
    elseif($row['type']=="office")
      header("Location:php_pages/office.php");
  }
    else
      header("Location:index.php?err=".urlencode("user id or password is wrong"));
}
if(isset($_POST['s_login']))
{
  if($_SESSION['barcode']!='')
  {
  $b=$_SESSION['barcode'];
  }
  else
  {
  $b=$_POST['barcode'];
  }
  $p=$_POST['password'];
  $query="SELECT * FROM `student_info` WHERE barcode='$b' and password='$p'";
  $result = mysqli_query($con, $query) or die(mysqli_error($con));
  $count = mysqli_num_rows($result);
  if($count==1){
    $slq="SELECT * FROM `student_info` WHERE `barcode`='$b'" ;
    $reslt=mysqli_query($con,$slq);
    $row=mysqli_fetch_assoc($reslt);
    $_SESSION['stu_name']=$row['name'];
    $_SESSION['barcode']=$row['barcode'];
    setcookie("name",$b,time()+3600); // 1 hour is 3600 second-->
    header("Location:php_pages/student_index.php");
  }
  else
    header("Location:index.php?err=".urlencode("user id or password is wrong"));
}

//if the user already logged in within the cookie time then it automatically redirect to student index page
/*
if (isset($_SESSION['name'])){
header("Location:php_pages/clg_index.php");
echo "<h1>Hi</h1>";
}
*/
?>
 <script type="text/javascript" src="index.js" ></script>
 <script type="text/javascript">
   function student(){
   document.getElementById('stu-log').className='login-form';
   document.getElementById('clg-log').className='hide-form';
   }
   function clg(){
   document.getElementById('clg-log').className='login-form';
   document.getElementById('stu-log').className='hide-form';
   }
   function input_show()
   {
    document.getElementById('barcode').className='show';
   }
 </script>
 <html>
 <head>
 <title>College system</title>
 </head>
 
<link rel="stylesheet" type="text/css" href="css/index.css">
<body>
<div class="login-pageborder">
  <td><input type="submit" class="input" value="Student login" onclick="student()"></td>
  <td><input type="submit" class="input" value="College/DTE/Library login" onclick="clg()"></td>
  </div>
<div class="login-page">
  <div class="form">
  <?php if(isset($_GET['err'])){?>
        <div class="alert-wrong">
        <?php echo $_GET['err'];?>
        </div>
        <?php }?>
    <form method="POST" id="clg-log" class="hide-form">
    <h1>College/DTE/Library Login</h1>
      <input type="text" name="uname" placeholder="name" />
      <input type="password" name="password" placeholder="password" />
      <input type="submit"  name="c_login" value="login"/>
    </form>
    <form method="POST" id="stu-log" class="login-form">
    <h1>Student login</h1>
      <input type="text" name="barcode" id="barcode" class="hide-form" placeholder="Barcode" />
      <a href="/SID/php_pages/barcode_reader.php" title="barcode scan using camera"><img src="barcodecamera.png" width="30%" ></a>
      <a title="barcode scan using camera"> <img src="keyboard.jpg" width="30%" onclick="input_show()" ></a>
      <input type="password" name="password" placeholder="password" />
      <input  type="submit" name="s_login" value="login"/>
    </form>
    

</div>
</div>
</body>
</html>