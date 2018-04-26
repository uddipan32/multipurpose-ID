<?php
include 'connection.php';
session_start();
if($_SESSION['stu_name']!='')
{
	$name=$_SESSION['stu_name'];
	$barcode=$_SESSION['barcode'];
	$clg_name=$_SESSION['clg_name'];
	$branch=$_SESSION['branch'];
	$roll=$_SESSION['roll'];
	
}
else
{
	header("Location:index.php");
}

?>
<link rel="stylesheet" type="text/css" href="/SID/css/index.css">
<link rel="stylesheet" type="text/css" href="/SID/css/dropdown.css">
<link rel="stylesheet" type="text/css" href="/SID/css/table.css">
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
<style>
.tabcontent {
	background-color: #ddd;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
    -webkit-animation: fadeEffect 1s;
    animation: fadeEffect 1s;
}
</style>
<div class="tabcontent">
 <a href="stu_marksheet.php?sem=1st">1st Sem</a>
 <a href="stu_marksheet.php?sem=2nd">2nd Sem</a>
 <a href="stu_marksheet.php?sem=3rd">3rd Sem</a>
 <a href="stu_marksheet.php?sem=4th">4th Sem</a>
 <a href="stu_marksheet.php?sem=5th">5th Sem</a>
 <a href="stu_marksheet.php?sem=6th">6th Sem</a>
 </div>
<?php
if(isset($_GET['sem'])){
$sem=$_GET['sem'];
$table=$clg_name."_".$branch."_".$sem;
$sql="SHOW TABLES WHERE Tables_in_sid='".$table."'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)==1)
{
	$query="SHOW columns FROM ".$table;
	$result = mysqli_query($con,$query);
	echo "<form method='POST'><table>";
	while($row = mysqli_fetch_assoc($result)) {
	echo "<th>".$row['Field'].": </th>";
}
echo "<tr>";
}
$query="SELECT * FROM ".$table." WHERE roll='$roll'";
$result1=mysqli_query($con,$query);
$cnt=mysqli_num_rows($result);
if(mysqli_num_rows($result1)==1){
$row = mysqli_fetch_array($result1);

for($i=0; $i<$cnt;$i++){
	echo "<td>".$row[$i]."</td>";
}
echo "</tr></table>";
}
	else header("Location:stu_marksheet.php?err=result not found");
}
if(isset($_GET['err'])){
     echo '<div class="alert-wrong">';
       echo $_GET['err'].'</div>';}
?>



