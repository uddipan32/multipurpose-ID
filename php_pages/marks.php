<link rel="stylesheet" type="text/css" href="/SID/css/index.css">
<link rel="stylesheet" type="text/css" href="/SID/css/dropdown.css">

<div class="admission">
<?php
session_start();
include'connection.php';
/*if($_SESSION['name']!='')
{
	$name=$_SESSION['name'];
}
else
{
	header("Location:index.php");
}
*/
if(isset($_GET['sem'])){
$sem=$_GET['sem'];
$roll=$_GET['roll'];
$branch=$_GET['branch'];
$c_name=$_GET['college'];
$table=$c_name."_".$branch."_".$sem;
$sql="SHOW TABLES WHERE Tables_in_sid='".$table."'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)==1)
{
	$query="SHOW columns FROM ".$table;
	$result = mysqli_query($con,$query);
	$i=0;
	echo "<form method='POST'>";
	while($row = mysqli_fetch_assoc($result)) {
	echo "<lable>".$row['Field'].": </label> <input type='text' name='".$row['Field']."'></br>";
}
echo "<input type='submit' name='mark' class='button' value='SUBMIT'></form>";
if(isset($_POST['mark'])){
	$query="SHOW columns FROM ".$table;
	$result = mysqli_query($con,$query);
	while($row = mysqli_fetch_assoc($result)) {
			$mrk[$i]='"'.$_POST[$row['Field']].'"';
			$i=$i+1;
		}
		$mrk[0]='"'.$roll.'"';
		$crt='INSERT INTO '.$table.' VALUES('.implode(" ,",$mrk).')';
		echo $crt;
			mysqli_query($con,$crt);
		}
}

else{
	echo "<form method='post'><input type='number' name='sub'><input type='submit' name='number' class='button' value='ok'></form>";
	if(isset($_POST['number'])){
		$n=$_POST['sub'];
		$_SESSION['n']=$n;
		echo "Enter the subjects name<br>";
		for($i=1;$i<=$n;$i++)
			echo "<form method='post'><input type='text' name='s_name".$i."'><br>";
		echo "<input type='submit' name='name' class='button' value='ok'></form>";
	}
	if(isset($_POST['name'])){
		$n=$_SESSION['n'];
		echo $n;
		for($i=1;$i<=$n;$i++){
			$sub[$i]=$_POST['s_name'.$i].' int(3)';
		}
		echo implode(" ", $sub);
		$crt="CREATE TABLE ".$table." (roll text, ".implode(" ,",$sub).")";
		echo $crt;
			mysqli_query($con,$crt);
		}
	}

}
?>
</div>