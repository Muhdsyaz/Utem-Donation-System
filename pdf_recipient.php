<?php
include('fpdf184/fpdf.php');
include ('database/config.php');


$sql="SELECT s.matricNo, s.fullname, r.no, r.hostelName, r.roomNo, r.q_start, r.q_end FROM student s INNER JOIN recipient r ON s.matricNo = r.matricNo";
$result=mysqli_query($conn,$sql);

if(isset($_POST['generate_pdf'])){

$pdf = new FPDF('p','mm','a3');
$pdf->setFont('arial','b','12');
$pdf->AddPage();
$pdf->cell('275','10','Recipient List', '1','1','C');
$pdf->cell('15','10','No', '1','0','C');
$pdf->cell('85','10','Name', '1','0','C');
$pdf->cell('35','10','Matric Number', '1','0','C');
$pdf->cell('33','10','Hostel', '1','0','C');
$pdf->cell('27','10','Room No', '1','0','C');
$pdf->cell('40','10','Quarantine Start', '1','0','C');
$pdf->cell('40','10','Quarantine Start', '1','1','C');

while($row=mysqli_fetch_assoc($result)){
$pdf->cell('15','10',$row["no"], '1','0','C');
$pdf->cell('85','10',$row["fullname"], '1','0','C');
$pdf->cell('35','10',$row["matricNo"], '1','0','C');
$pdf->cell('33','10',$row["hostelName"], '1','0','C');
$pdf->cell('27','10',$row["roomNo"], '1','0','C');
$pdf->cell('40','10',$row["q_start"], '1','0','C');
$pdf->cell('40','10',$row["q_end"], '1','1','C');
}

$pdf->Output();

}
?>
