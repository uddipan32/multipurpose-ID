<?php
session_start();
$name=$_SESSION['name'];
include'connection.php';
$sem=$_GET['sem'];
$branch=$_GET['branch'];
?>
<html>
</style>
<link rel="stylesheet" type="text/css" href="../css/index.css">
<link rel="stylesheet" type="text/css" href="../css/dropdown.css">
<link rel="stylesheet" type="text/css" href="../css/table.css">
<body>
<div class="topnav">
<a href="clg_index.php">Home</a>
<a href="#news">News</a>
<a href="admission.php">New Addmission</a>
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
<?php
$sql = "SELECT name, gender, roll, sem FROM student_info WHERE sem='$sem' AND branch='$branch' AND clg_name='$name'";
$result = mysqli_query($con,$sql);
$no=0;
echo "<table border=1px width='100%'><th>No</th><th>Name</th><th>Roll No.</th><th>Sem</th><th>Gender</th><th>ID</th>";
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td><center>".($no+1). "</td><td><a href='stu_info.php?roll=" . $row["roll"]."'>". $row["name"] ."</a> </td><td> ".$row["roll"] ."</td><td>". $row["sem"]. " </td><td> " . $row["gender"]."</td><td><a href='id.php?roll=". $row["roll"]."'> Id</td></tr>";
     $no++;
 }
}
 else
 	echo "<h1 color='red'> no result found</h1>";

?>
</div>
</body>
</html>