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
$sql="SELECT * FROM admit WHERE barcode='$barcode' ORDER BY date desc";
$result=mysqli_query($con,$sql);
if(mysqli_num_rows($result)){
  $row=mysqli_fetch_array($result);
  $query="SELECT * FROM student_info WHERE barcode='$barcode'";
  $result1=mysqli_query($con,$query);
  $row1= mysqli_fetch_array($result1);
}
else header("Location:stu_admit.php?err=not found");
?>
<style type="text/css">
  .fileUpload {
position: relative;
overflow: hidden;
margin: 10px;
background-color: white;
border:2px solid black;
height: 128px;
width: 128px;
border-radius: 9px;
position: absolute;
    right: 20px;
    top: 250px;
text-align: center;
}
</style>
<link rel="stylesheet" type="text/css" href="/SID/css/index.css">
<body lang=EN-IN style='tab-interval:36.0pt'>

<div id="printableArea" class="admission">

<p class=MsoTitleCxSpFirst align=center style='text-align:center'><b
style='font-size:18.0pt;mso-bidi-font-weight:normal'>STATE COUNCIL FOR TECHNICAL<span style='mso-spacerun:yes'></span><o:p></o:p></b></p><p class=MsoTitleCxSpLast align=center style='text-align:center'>
<b style='mso-bidi-font-weight:normal'>EDUCATION, ASSAM<o:p></o:p></b></p>

<h1 align=center style='text-align:center'><b style='mso-bidi-font-weight:normal'><u><span style='font-size:26.0pt;line-height:107%'>ADMIT<o:p></o:p></span></u></b></h1><br><br>

<span style='font-size:28.0pt;line-height:107%;font-family:"Edwardian Script ITC"'><p class=MsoNormal style='text-align:justify'><span style='font-size:18.0pt;line-height:107%;font-family:Algerian'>Name :  </span><b><large><?php echo $name;?></large></b></span><span style='font-size:20.0pt;line-height:107%;font-family:"Brush Script MT"'><o:p></o:p></span></p>

<p style='text-align:right;'><?php echo '<img src="/SID/stu_image/'.$row['barcode'].'.jpg"'?> class="fileUpload"></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:18.0pt;line-height:107%;font-family:Algerian'>Roll no :  </span><b> <?php echo $roll;?></b></span><span style='font-size:18.0pt;line-height:107%;font-family:"Brush Script MT"'><o:p></o:p></span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:18.0pt;line-height:107%;font-family:Algerian'>To the sem : </span><b><?php echo $row['sem'];?></b>

<p class=MsoNormal style='text-align:justify'><span style='font-size:18.0pt;line-height:107%;font-family:Algerian'>final </span><b>regular</b><o:p></o:p></span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:18.0pt;line-height:107%;font-family:Algerian'>Diploma examination in  : </span><span style='mso-tab-count:3'><b><?php echo $branch ?></b></span></span>

<span style='font-size:18.0pt;line-height:107%;font-family:Algerian'><span style='mso-tab-count:6'></span><span style='mso-tab-count:7'></span>
<br>the&nbsp;&nbsp;&nbsp;<span style='mso-tab-count:2'></span></span><span style='font-size:18.0pt;line-height:107%;font-family:"Edwardian Script ITC"'></span><b><?php echo $row['date'];?></b></span>

<span style='font-size:18.0pt;line-height:107%;font-family:Algerian'><span style='mso-tab-count:2'></span><span style='mso-tab-count:1'></span>

<span style='font-size:18.0pt;line-height:107%;font-family:Algerian'><span style='mso-tab-count:1'></span><o:p></o:p></span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:18.0pt;line-height:107%;font-family:Algerian'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:18.0pt;line-height:107%;font-family:Algerian'>Note:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span style='mso-tab-count:4'></span>hours
of commencement of examination.<span style='mso-tab-count:3'></span><font size="20">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{</font> morning/afternoon<o:p></o:p></span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:18.0pt;line-height:107%;font-family:Algerian'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:18.0pt;line-height:107%;font-family:Algerian'><o:p>&nbsp;</o:p></span></p>

<p class=MsoNormal style='text-align:justify'><span style='font-size:18.0pt;line-height:107%;font-family:Algerian'><span style='mso-tab-count:1'></span></span><span
style='font-size:16.0pt;line-height:107%;font-family:Algerian'>Countersigned<o:p></o:p></span></p>



<p class=MsoNormal style='text-align:justify'><span style='mso-tab-count:6'>..........................................</span><br><span style='font-size:16.0pt;line-height:107%;font-family:Algerian'>Principal/examination<br>Supdt. Of the centre<span style='mso-tab-count:6'></span>

<p class=MsoNormal style='text-align:right;'><span style='mso-tab-count:6'></span><span style='font-size:16.0pt;line-height:107%;font-family:Algerian'>controller of examination<o:p></o:p><br>state
council for tech. education<br>Assam.</span></p>
<h1 align=center style='text-align:center'><o:p>&nbsp;</o:p></h1>

</div>


</body>

</html>
