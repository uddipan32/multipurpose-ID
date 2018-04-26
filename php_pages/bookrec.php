<?php session_start()?>
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
<a style="float: left" href="find_stu_library.php"> Find Student details</a>
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
  <a href="bookrec.php?sem=1st&branch=computer"><button class="tablinks">Computer</button></a>
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
$name=$_SESSION['name'];
include'connection.php';
if(isset($_GET['sem'])){
$sem=$_GET['sem'];
$branch=$_GET['branch'];
}
else{
	$sem="1st";
	$branch="computer";
}
?>
</div>
<div class="admission">
<?php
$clg_name=$_SESSION['clg_name'];
$sql = "SELECT barcode, name, roll FROM student_info WHERE sem='$sem' AND branch='$branch' AND library='1' AND clg_name='$clg_name'";
$result = mysqli_query($con,$sql);
$no=0;
echo "<table border=1px width='100%'><th>No</th><th>Name</th><th>Roll No.</th><th>Book Name</th><th>Author</th><th>Return</th>";
if (mysqli_num_rows($result) > 0) {
    while($row = mysqli_fetch_assoc($result)) {
    	$sql1 = "SELECT book_name, author, return_book FROM ". $row['barcode'];
		$result1 = mysqli_query($con,$sql1);
        echo "<tr><td rowspan='4'><center>".($no+1). "</td><td rowspan='4'>". $row["name"] ."</td><td rowspan='4'> ".$row["roll"] ."</td>";
        while($row1 = mysqli_fetch_assoc($result1)) {

        echo "<td>". $row1['book_name']. " </td><td> " . $row1['author']."</td><td>";
        if($row1['return_book']==1) echo "YES</td></tr>";
        else echo "NO</td></tr>";
    }
     $no++;
 }
}
else echo "not found";
 ?>
