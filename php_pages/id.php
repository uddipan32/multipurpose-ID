<?php
session_start();
$name=$_SESSION['name'];
include'connection.php';
include'../phpqrcode/qrlib.php';
$roll=$_GET['roll'];
$sql = "SELECT * FROM student_info WHERE roll='$roll'";
$result = mysqli_query($con,$sql);
if (mysqli_num_rows($result) > 0) 
    $row = mysqli_fetch_assoc($result);    
QRcode::png($row['barcode'],'098.png', QR_ECLEVEL_M,8);
?>

<script type="text/javascript">
	function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}
</script>
<html>
<link rel="stylesheet" type="text/css" href="/SID/css/index.css">
<div id="printableArea" class="admission" style="width: 21cm; height: 29.7cm; ">
<div style="width:8.7cm; position: relative;">
<img src="/SID/id_front.jpg" width="100%">
<img src="/SID/stu_image/<?php echo $row['barcode'];?>.jpg" style="width:70px ;border-radius: 50%; position: absolute; top: .5cm; left: .5cm;">
<label style="color: white; position: absolute; top: 2.6cm; left: .5cm;"><?php echo $row['name'];?></label>
<label style="color: white; position: absolute; top: 3.2cm; left: .5cm;"><?php echo $row['roll'];?></label>
<label style="color: white; position: absolute; top: 3.8cm; left: .5cm;"><?php echo $row['branch'];?></label>
<label style="color: white; position: absolute; top: 1.2cm; left: 6cm; font-size: 8px; width: 100px; text-align: center;"><?php echo $row['clg_name'];?></label>
</div>
<br>
<div style="width:8.7cm; position: relative">
<img src="/SID/id_back.jpg" width="100%">
<img src="098.png" style="width:46%;position: absolute; top: .4cm;left: 3.7cm;" >
</div>
<br><br><br>
<input type="button" onclick="printDiv('printableArea')" value="print ID" />
</div>