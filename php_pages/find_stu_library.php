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
if(isset($_POST['find']))
{
    $roll=$_POST['roll'];
    header("Location:/SID/php_pages/stu_info.php?roll=".$roll);
}
?>

<html>
<style>
.dropdown_c {
    position: relative;
    background-color: #f9f9f9;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 14px 16px;
    
    display: inline-block;
}

.dropdown_c-content {
    display: none;
    position: absolute;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    padding: 12px 16px;
    z-index: 1;
}

.dropdown_c:hover .dropdown_c-content {
    display: block;
}
</style>
<link rel="stylesheet" type="text/css" href="../css/index.css">
<link rel="stylesheet" type="text/css" href="../css/dropdown.css">
<body>
<div class="topnav">
<a href="library.php">Home</a>
<a href="barcode_reader.php">barcode scan</a>
<a href="add_student_to_library.php">Add student</a>
<a href="bookrec.php">book record</a>
<a style="float: left" href="find_stu_library.php"> Find Student details</a>
<div class="dropdown">
  <?php echo $name;?><br>
   <div class="dropdown-content">
    <a href="/SID/php_pages/edit_clg.php"> edit profile</a><br>
    <a href="/SID/php_pages/logout.php"> logout</a><br>
   </div>
  </div>
</div>
<div class="admission">

  <h2 style="background: #3498db; padding: 14px 16px;">Find student details by Branch</h2>
<div class="dropdown_c">
  <h2> 1st Sem</h2>
   <div class="dropdown_c-content">
    <a href="find_std_brnch_library.php?sem=1st&branch=computer"> Computer</a><br>
    <a href="find_std_brnch_library.php?sem=1st&branch=civil"> Civil</a><br>
    <a href="find_std_brnch_library.php?sem=1st&branch=chemical"> Chemical</a><br>
    <a href="find_std_brnch_library.php?sem=1st&branch=mechanical"> Mechanical</a><br>
    <a href="find_std_brnch_library.php?sem=1st&branch=ETC"> ETC</a><br>
    <a href="find_std_brnch_library.php?sem=1st&branch=electrical"> Electrical</a><br>
    </div>
    </div>
   <div class="dropdown_c">
  <h2> 2nd Sem</h2>
   <div class="dropdown_c-content">
    <a href="find_std_brnch_library.php?sem=2nd&branch=computer"> Computer</a><br>
    <a href="find_std_brnch_library.php?sem=2nd&branch=civil"> Civil</a><br>
    <a href="find_std_brnch_library.php?sem=2nd&branch=chemical"> Chemical</a><br>
    <a href="find_std_brnch_library.php?sem=2nd&branch=mechanical"> Mechanical</a><br>
    <a href="find_std_brnch_library.php?sem=2nd&branch=ETC"> ETC</a><br>
    <a href="find_std_brnch_library.php?sem=2nd&branch=electrical"> Electrical</a><br>
    </div>
    </div>
    <div class="dropdown_c">
  <h2> 3rd Sem</h2>
   <div class="dropdown_c-content">
    <a href="find_std_brnch_library.php?sem=3rd&branch=computer"> Computer</a><br>
    <a href="find_std_brnch_library.php?sem=3rd&branch=civil"> Civil</a><br>
    <a href="find_std_brnch_library.php?sem=3rd&branch=chemical"> Chemical</a><br>
    <a href="find_std_brnch_library.php?sem=3rd&branch=mechanical"> Mechanical</a><br>
    <a href="find_std_brnch_library.php?sem=3rd&branch=ETC"> ETC</a><br>
    <a href="find_std_brnch_library.php?sem=3rd&branch=Electrical"> Electrical</a><br>
    </div>
    </div>
    <div class="dropdown_c">
  <h2> 4th Sem</h2>
   <div class="dropdown_c-content">
    <a href="find_std_brnch_library.php?sem=4th&branch=computer"> Computer</a><br>
    <a href="find_std_brnch_library.php?sem=4th&branch=civil"> Civil</a><br>
    <a href="find_std_brnch_library.php?sem=4th&branch=chemical"> Chemical</a><br>
    <a href="find_std_brnch_library.php?sem=4th&branch=mechanical"> Mechanical</a><br>
    <a href="find_std_brnch_library.php?sem=4th&branch=ETC"> ETC</a><br>
    <a href="find_std_brnch_library.php?sem=4th&branch=electrical"> Electrical</a><br>
    </div>
    </div>
    <div class="dropdown_c">
  <h2> 5th Sem</h2>
   <div class="dropdown_c-content">
    <a href="find_std_brnch_library.php?sem=5th&branch=computer"> Computer</a><br>
    <a href="find_std_brnch_library.php?sem=5th&branch=civil"> Civil</a><br>
    <a href="find_std_brnch_library.php?sem=5th&branch=chemical"> Chemical</a><br>
    <a href="find_std_brnch_library.php?sem=5th&branch=mechanical"> Mechanical</a><br>
    <a href="find_std_brnch_library.php?sem=5th&branch=ETC"> ETC</a><br>
    <a href="find_std_brnch_library.php?sem=5th&branch=electrical"> Electrical</a><br>
    </div>
    </div>
    <div class="dropdown_c">
  <h2> 6th Sem</h2>
   <div class="dropdown_c-content">
    <a href="find_std_brnch_library.php?sem=6th&branch=computer"> Computer</a><br>
    <a href="find_std_brnch_library.php?sem=6th&branch=civil"> Civil</a><br>
    <a href="find_std_brnch_library.php?sem=6th&branch=chemical"> Chemical</a><br>
    <a href="find_std_brnch_library.php?sem=6th&branch=mechanical"> Mechanical</a><br>
    <a href="find_std_brnch_library.php?sem=6th&branch=ETC"> ETC</a><br>
    <a href="find_std_brnch_library.php?sem=6th&branch=electrical"> Electrical</a><br>
    </div>
    </div>
<h2 style="background: #3498db; padding: 14px 16px;"> Find student details by Roll no.</h2>
<form method="POST">
<input type="text" name="roll"></input>
<input type="submit" value="FIND" name="find"></input>
<br>
</form>
    

</div>
</body>
</html>