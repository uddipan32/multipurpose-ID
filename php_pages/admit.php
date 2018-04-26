<link rel="stylesheet" type="text/css" href="/SID/css/index.css">
<link rel="stylesheet" type="text/css" href="/SID/css/dropdown.css">
<link rel="stylesheet" type="text/css" href="/SID/css/table.css">
<style>
/* Style the tab */
div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
div.tab button {
    background-color: inherit;
    float: left;
    border: none;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
div.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none;
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
    -webkit-animation: fadeEffect 1s;
    animation: fadeEffect 1s;
}
</style>
<script type="text/javascript">
	function fm(evt, sem) {
    // Declare all variables
    var i, tabcontent, tablinks;

    // Get all elements with class="tabcontent" and hide them
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    // Get all elements with class="tablinks" and remove the class "active"
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    // Show the current tab, and add an "active" class to the button that opened the tab
    document.getElementById(sem).style.display = "block";
    evt.currentTarget.className += " active";
}


</script>
<body>
<div class="topnav">
<a href="office.php">Home</a>
<a href="add_clg.php">Add College</a>
<a href="marksheet.php">Result</a>
</div>
<?php
include'connection.php';
$sql="SELECT * FROM login WHERE type='college'";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result) > 0)
{
  while($row = mysqli_fetch_assoc($result)){
  $clg=$row['name'];
  echo "<form method='post'><input type='submit' name='college' value='".$clg."'>".$clg."</input>"; }
  echo "</form>";
}
else{
  header("Location:admit.php?err=college not found");
}
if(isset($_POST['college']))
$college=$_POST['college'];
?>


<div class="tab">
  <button class="tablinks" onclick="fm(event, '1st Sem')">1st Sem</button>
  <button class="tablinks" onclick="fm(event, '2nd Sem')">2nd Sem</button>
  <button class="tablinks" onclick="fm(event, '3rd Sem')">3rd Sem</button>
  <button class="tablinks" onclick="fm(event, '4th Sem')">4th Sem</button>
  <button class="tablinks" onclick="fm(event, '5th Sem')">5th Sem</button>
  <button class="tablinks" onclick="fm(event, '6th Sem')">6th Sem</button>
</div>

<div id="1st Sem" class="tabcontent">
  <div class="tab">
  <a href="admit.php?college=<?php echo $college;?>&sem=1st&branch=computer"><button class="tablinks">Computer</button></a>
  <a href="bookrec.php?sem=1st&branch=civil"><button class="tablinks">Civil</button></a>
  <a href="bookrec.php?sem=1st&branch=mechanical"><button class="tablinks">Mechanical</button></a>
  <a href="bookrec.php?sem=1st&branch=chemical"><button class="tablinks">Chemical</button></a>
  <a href="bookrec.php?sem=1st&branch=electrical"><button class="tablinks">Electrical</button></a>
  <a href="bookrec.php?sem=1st&branch=etc"><button class="tablinks">ETC</button></a>
</div>
</div>

<div id="2nd Sem" class="tabcontent">
  <div class="tab">
  <a href="bookrec.php?sem=2nd&branch=computer"><button class="tablinks">Computer</button></a>
  <a href="bookrec.php?sem=2nd&branch=civil"><button class="tablinks">Civil</button></a>
  <a href="bookrec.php?sem=2nd&branch=mechanical"><button class="tablinks">Mechanical</button></a>
  <a href="bookrec.php?sem=2nd&branch=chemical"><button class="tablinks">Chemical</button></a>
  <a href="bookrec.php?sem=2nd&branch=electrical"><button class="tablinks">Electrical</button></a>
  <a href="bookrec.php?sem=2nd&branch=etc"><button class="tablinks">ETC</button></a>
</div>

</div>


<div id="3rd Sem" class="tabcontent">
  <div class="tab">
  <a href="bookrec.php?sem=3rd&branch=computer"><button class="tablinks">Computer</button></a>
  <a href="bookrec.php?sem=3rd&branch=civil"><button class="tablinks">Civil</button></a>
  <a href="bookrec.php?sem=3rd&branch=mechanical"><button class="tablinks">Mechanical</button></a>
  <a href="bookrec.php?sem=3rd&branch=chemical"><button class="tablinks">Chemical</button></a>
  <a href="bookrec.php?sem=3rd&branch=electrical"><button class="tablinks">Electrical</button></a>
  <a href="bookrec.php?sem=3rd&branch=etc"><button class="tablinks">ETC</button></a>
</div>
</div>
<div id="4th Sem" class="tabcontent">
  <div class="tab">
  <a href="bookrec.php?sem=4th&branch=computer"><button class="tablinks">Computer</button></a>
  <a href="bookrec.php?sem=4th&branch=civil"><button class="tablinks">Civil</button></a>
  <a href="bookrec.php?sem=4th&branch=mechanical"><button class="tablinks">Mechanical</button></a>
  <a href="bookrec.php?sem=4th&branch=chemical"><button class="tablinks">Chemical</button></a>
  <a href="bookrec.php?sem=4th&branch=electrical"><button class="tablinks">Electrical</button></a>
  <a href="bookrec.php?sem=4th&branch=etc"><button class="tablinks">ETC</button></a>
</div>
</div>
<div id="5th Sem" class="tabcontent">
  <div class="tab">
  <a href="bookrec.php?sem=5th&branch=computer"><button class="tablinks">Computer</button></a>
  <a href="bookrec.php?sem=5th&branch=civil"><button class="tablinks">Civil</button></a>
  <a href="bookrec.php?sem=5th&branch=mechanical"><button class="tablinks">Mechanical</button></a>
  <a href="bookrec.php?sem=5th&branch=chemical"><button class="tablinks">Chemical</button></a>
  <a href="bookrec.php?sem=5th&branch=electrical"><button class="tablinks">Electrical</button></a>
  <a href="bookrec.php?sem=5th&branch=etc"><button class="tablinks">ETC</button></a>
</div>
</div>
<div id="6th Sem" class="tabcontent">
  <div class="tab">
  <a href="bookrec.php?sem=6th&branch=computer"><button class="tablinks">Computer</button></a>
  <a href="bookrec.php?sem=6th&branch=civil"><button class="tablinks">Civil</button></a>
  <a href="bookrec.php?sem=6th&branch=mechanical"><button class="tablinks">Mechanical</button></a>
  <a href="bookrec.php?sem=6th&branch=chemical"><button class="tablinks">Chemical</button></a>
  <a href="bookrec.php?sem=6th&branch=electrical"><button class="tablinks">Electrical</button></a>
  <a href="bookrec.php?sem=6th&branch=etc"><button class="tablinks">ETC</button></a>
</div>
</div>
<?php
if(isset($_GET['sem'])){
$sem=$_GET['sem'];
$branch=$_GET['branch'];
$c_name=$_GET['college'];
$sql = "SELECT barcode,name, gender, roll, sem, branch FROM student_info WHERE sem='$sem' AND branch='$branch'";
$result = mysqli_query($con,$sql);
$no=0;
echo "<form method='POST'><label> EXAM DATE: </label><input type='date' name='date'></input><table border=1px width='100%'><th></th><th>No</th><th>Name</th><th>Roll No.</th><th>Sem</th>";
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td><input type='radio' name='barcode' value='".$row["barcode"]."'></td> <td><center>".($no+1). "</td><td>".$row["name"] ."</a> </td><td> ".$row["roll"] ."</td><td>". $row["sem"]. " </td></form></tr>";
     $no++;
 }
 echo "<input type='submit' class='button' name='generate' value='Generate Admit'></form>";
}
 else
  echo "<h1 color='red'> no result found</h1>";
}
if(isset($_POST['barcode'])){
	$barcode=$_POST['barcode'];
	echo $barcode;
	$date=$_POST['date'];
	$sql="INSERT INTO admit values('$barcode','$sem','$date')";
	mysqli_query($con,$sql);
}
?>
