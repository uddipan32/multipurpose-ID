
<?php
session_start();
$name=$_SESSION['name'];
$add_by=$_SESSION['add_by'];
include'connection.php';
?>
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
<a href="library.php">Home</a>
<a href="barcode_reader.php">barcode scan</a>
<a href="add_student_to_library.php">Add student</a>
<a href="bookrec.php">book record</a>
<a style="float: left" href="find_stu.php"> Find Student details</a>
</div>


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
  <a href="add_student_to_library.php?sem=1st&branch=computer"><button class="tablinks">Computer</button></a>
  <a href="add_student_to_library.php?sem=1st&branch=civil"><button class="tablinks">Civil</button></a>
  <a href="add_student_to_library.php?sem=1st&branch=mechanical"><button class="tablinks">Mechanical</button></a>
  <a href="add_student_to_library.php?sem=1st&branch=chemical"><button class="tablinks">Chemical</button></a>
  <a href="add_student_to_library.php?sem=1st&branch=electrical"><button class="tablinks">Electrical</button></a>
  <a href="add_student_to_library.php?sem=1st&branch=etc"><button class="tablinks">ETC</button></a>
</div>
</div>

<div id="2nd Sem" class="tabcontent">
  <div class="tab">
  <a href="add_student_to_library.php?sem=2nd&branch=computer"><button class="tablinks">Computer</button></a>
  <a href="add_student_to_library.php?sem=2nd&branch=civil"><button class="tablinks">Civil</button></a>
  <a href="add_student_to_library.php?sem=2nd&branch=mechanical"><button class="tablinks">Mechanical</button></a>
  <a href="add_student_to_library.php?sem=2nd&branch=chemical"><button class="tablinks">Chemical</button></a>
  <a href="add_student_to_library.php?sem=2nd&branch=electrical"><button class="tablinks">Electrical</button></a>
  <a href="add_student_to_library.php?sem=2nd&branch=etc"><button class="tablinks">ETC</button></a>
</div>

</div>


<div id="3rd Sem" class="tabcontent">
  <div class="tab">
  <a href="add_student_to_library.php?sem=3rd&branch=computer"><button class="tablinks">Computer</button></a>
  <a href="add_student_to_library.php?sem=3rd&branch=civil"><button class="tablinks">Civil</button></a>
  <a href="add_student_to_library.php?sem=3rd&branch=mechanical"><button class="tablinks">Mechanical</button></a>
  <a href="add_student_to_library.php?sem=3rd&branch=chemical"><button class="tablinks">Chemical</button></a>
  <a href="add_student_to_library.php?sem=3rd&branch=electrical"><button class="tablinks">Electrical</button></a>
  <a href="add_student_to_library.php?sem=3rd&branch=etc"><button class="tablinks">ETC</button></a>
</div>
</div>
<div id="4th Sem" class="tabcontent">
  <div class="tab">
  <a href="add_student_to_library.php?sem=4th&branch=computer"><button class="tablinks">Computer</button></a>
  <a href="add_student_to_library.php?sem=4th&branch=civil"><button class="tablinks">Civil</button></a>
  <a href="add_student_to_library.php?sem=4th&branch=mechanical"><button class="tablinks">Mechanical</button></a>
  <a href="add_student_to_library.php?sem=4th&branch=chemical"><button class="tablinks">Chemical</button></a>
  <a href="add_student_to_library.php?sem=4th&branch=electrical"><button class="tablinks">Electrical</button></a>
  <a href="add_student_to_library.php?sem=4th&branch=etc"><button class="tablinks">ETC</button></a>
</div>
</div>
<div id="5th Sem" class="tabcontent">
  <div class="tab">
  <a href="add_student_to_library.php?sem=5th&branch=computer"><button class="tablinks">Computer</button></a>
  <a href="add_student_to_library.php?sem=5th&branch=civil"><button class="tablinks">Civil</button></a>
  <a href="add_student_to_library.php?sem=5th&branch=mechanical"><button class="tablinks">Mechanical</button></a>
  <a href="add_student_to_library.php?sem=5th&branch=chemical"><button class="tablinks">Chemical</button></a>
  <a href="add_student_to_library.php?sem=5th&branch=electrical"><button class="tablinks">Electrical</button></a>
  <a href="add_student_to_library.php?sem=5th&branch=etc"><button class="tablinks">ETC</button></a>
</div>
</div>
<div id="6th Sem" class="tabcontent">
  <div class="tab">
  <a href="add_student_to_library.php?sem=6th&branch=computer"><button class="tablinks">Computer</button></a>
  <a href="add_student_to_library.php?sem=6th&branch=civil"><button class="tablinks">Civil</button></a>
  <a href="add_student_to_library.php?sem=6th&branch=mechanical"><button class="tablinks">Mechanical</button></a>
  <a href="add_student_to_library.php?sem=6th&branch=chemical"><button class="tablinks">Chemical</button></a>
  <a href="add_student_to_library.php?sem=6th&branch=electrical"><button class="tablinks">Electrical</button></a>
  <a href="add_student_to_library.php?sem=6th&branch=etc"><button class="tablinks">ETC</button></a>
</div>
</div>

</body>
</html>
</body>
<?php
if(isset($_GET['sem'])){
$sem=$_GET['sem'];
$branch=$_GET['branch'];
if(isset($_POST['add'])){
	$barcode=$_POST['add'];
	echo "Student added";
	$create="CREATE TABLE ".$barcode." (bookid varchar(60) ,book_name varchar(60), author text(80), return_book int(1), issue_date date, return_date date)";
	mysqli_query($con,$create);
  $updatesql="UPDATE student_info SET library='1' WHERE barcode='$barcode'";
  $update = mysqli_query($con, $updatesql);
  

}

$sql = "SELECT barcode,name, gender, roll, sem FROM student_info WHERE sem='$sem' AND branch='$branch' AND clg_name='$add_by'";
$result = mysqli_query($con,$sql);
$no=0;
echo "<form method='POST'><table border=1px width='100%'><th></th><th>No</th><th>Name</th><th>Roll No.</th><th>Sem</th><th>Gender</th><th>ID</th>";
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
        echo "<tr><td><button type='submit' name='add' value='".$row['barcode']."'>add</button><td><center>".($no+1). "</td><td><a href='stu_info.php?roll=" . $row["roll"]."'>". $row["name"] ."</a> </td><td> ".$row["roll"] ."</td><td>". $row["sem"]. " </td><td> " . $row["gender"]."</td><td><a href='id.php?roll=". $row["roll"]."'> Id</td></tr></form>";
     $no++;
 }
}
 else
 	echo "<h1 color='red'> no result found</h1>";
}
?>
