<?php
include('fpdf184/fpdf.php');
include ('database/config.php');


$sql="SELECT * FROM donation";
$result=mysqli_query($conn,$sql);

if(isset($_POST['generate_pdf'])){

$pdf = new FPDF('p','mm','a4');
$pdf->setFont('arial','b','12');
$pdf->AddPage();
$pdf->cell('190','10','Donor List', '1','1','C');
$pdf->cell('15','10','No', '1','0','C');
$pdf->cell('75','10','Full Name', '1','0','C');
$pdf->cell('40','10','Item', '1','0','C');
$pdf->cell('20','10','Qty', '1','0','C');
$pdf->cell('40','10','Delivery Date', '1','1','C');

while($row=mysqli_fetch_assoc($result)){
$pdf->cell('15','10',$row["donationNumber"], '1','0','C');
$pdf->cell('75','10',$row["fullname"], '1','0','C');
$pdf->cell('40','10',$row["item"], '1','0','C');
$pdf->cell('20','10',$row["quantity"], '1','0','C');
$pdf->cell('40','10',$row["deliverydate"], '1','1','C');

}

$pdf->Output();

}
?>
