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
?>
<html>

<link rel="stylesheet" type="text/css" href="/SID/css/index.css">
<link rel="stylesheet" type="text/css" href="/SID/css/dropdown.css">
<link rel="stylesheet" type="text/css" href="/SID/css/table.css">
<body>
<div class="topnav">
<a href="library.php">Home</a>
<a href="barcode_reader.php">barcode scan</a>
<a href="add_student_to_library.php">Add student</a>
<a href="bookrec.php">book record</a>
<a style="float: left" href="find_stu_library.php"> Find Student details</a>
</div>
<div class="dropdown" style="position: absolute; right:.5cm; top:.2cm">
  <?php echo $name;?><br>
   <div class="dropdown-content">
    <a href="/SID/php_pages/logout.php"> logout</a><br>
  </div>
  </div>
<div class="admission">
<?php
include'connection.php';
if(isset($_SESSION['barcode']))
{
	$b=$_SESSION['barcode'];
	$sql = "SELECT barcode FROM student_info WHERE barcode='$b'";
    $result = mysqli_query($con,$sql);
    
    if(mysqli_num_rows($result) == 0)
    {
    	header("Location:library.php");
    }
    
}

$barcode=$_SESSION['barcode'];
$sql="SELECT * FROM ".$barcode."";
$result = mysqli_query($con,$sql);
echo "<form method='post' action='add_book.php'><table><th>Book ID</th><th>Book Name</th><th>Author</th><th>Issue Date</th><th>Return Date</th><th></th>";
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td>".$row['bookid']."</td><td>".$row['book_name']."</td><td>".$row['author']."</td><td>".$row['issue_date']."</td><td>".$row['return_date']."</td><td><button class='button' name='return_book' value='".$row['bookid']."'>Returned</button></tr>";

 }
 echo "</form>";
}
if(isset($_POST['return_book'])){
	$date=date("y:m:d");
	$id=$_POST['return_book'];
	 $query1="UPDATE ".$barcode." SET return_date='$date', return_book='1' WHERE bookid='$id'";
	 mysqli_query($con,$query1);

}
if(isset($_POST['submit']))
{
	$bookid=$_POST['bookid'];
	$book_name=$_POST['bookname'];
	$author=$_POST['author'];
	$issue_date=$_POST['idate'];
  $query="INSERT INTO ".$barcode."(bookid,book_name,author,issue_date) values('$bookid','$book_name','$author','$issue_date')";
			mysqli_query($con,$query);

}
?>
<form method="post" action="add_book.php" class="admission">
<table >
<th>Book ID</th><th>Book Name</th><th>Author</th><th>Issue Date</th>
<tr><td><input type="text" name="bookid"></td><td><input type="text" name="bookname"></td><td><input type="text" name="author"></td><td><input type="date" name="idate"></td></tr>
</table>
<input class="button"type="submit" name="submit"></input>
</form>
</div>
