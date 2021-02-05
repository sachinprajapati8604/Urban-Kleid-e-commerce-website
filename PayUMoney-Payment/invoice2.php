

<?php

require ('fpdf182/fpdf.php');

require ('dbconnect.php');

session_start();

$id = $_SESSION['id'];

$username=$_SESSION['username'];
$transid=$_GET['transid'];
$sql2="SELECT * FROM `transcations` WHERE `trans_id`='$transid'";
$result = mysqli_query($conn, $sql2);
$row =mysqli_fetch_array($result);
$result = mysqli_query($conn, $sql2);

while ($row = mysqli_fetch_assoc($result)) {

    $sr ='UKORDER_'. $row['sr'];
    $trans_id = $row['trans_id'];
    $trans_cust_name = $row['trans_cust_name'];
    $trans_cust_email = $row['trans_cust_email'];
    $trans_prod_info = $row['trans_prod_info'];
    $trans_amount = $row['trans_amount'];
    $trans_status = $row['trans_status'];
    $trans_address = $row['trans_address'];
    $date = $row['trans_created'];
    

$pdf=new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',14);
$pdf->Cell(190,5,'Tax Invoice',0,0,'C');

$pdf->Ln(1);
$pdf->SetFont('Arial','B',18);
$pdf->Cell(100,20,'Urban Kleid',0,0);

$pdf->SetFont('Arial','',12);
$pdf->Ln(8); //linebreak
$pdf->Cell(55,20,'223-C Pocket-1 Mayur Vihar Phase-1 Delhi 110091 INDIA',0,0); 
$pdf->Ln(6); 
$pdf->Cell(55,20,'+91 9650811118',0,0); 
$pdf->Ln(6); 
$pdf->Cell(55,20,'contact@urbankleid.com',0,0);
$pdf->Ln(6);
$pdf->Image('img/logo.png',160,20,-250);  //linking an image
$pdf->Ln(4); //linebreak

$pdf->Line(10,45,200,45);
$pdf->Ln(10);

$pdf->SetFont('Arial','',12);
$pdf->Cell(100,2, 'Cutomer Name : '.$trans_cust_name ,0,0);
$pdf->Cell(100,2, 'Email : '.$trans_cust_email ,0,0);
$pdf->Ln(5);
$pdf->Cell(100,5, 'Order ID : '.$sr ,0,0);
$pdf->Cell(100,5,'Order Date : '.$date,0,0);
$pdf->Ln(8);
$pdf->Cell(100,5,'Transcation ID : '.$trans_id,0,0);
$pdf->Cell(100,5,'Order Amount : Rs. '.$trans_amount,0,0);


$pdf->Line(10,80,280,80);
$pdf->Ln(8);
$pdf->Cell(100,5,'Invoice No :  '.$sr,0,0);
$pdf->Cell(100,5,'Invoice Date : '.date("Y-m-d "),0,0);

$pdf->Line(10,95,280,95);
$pdf->Ln(8);
$pdf->Cell(55,5,'Billing Address  ',0,0);
$pdf->Ln(8);
$pdf->Cell(55,5,''.$trans_address,0,0);


$pdf->Line(10,115,280,115);
$pdf->Ln(8);
$pdf->Cell(100,5,'Shiping Address   ',0,0);
$pdf->Ln(8);
$pdf->Cell(55,5,''.$trans_address,0,0);

$pdf->Ln(8);

$pdf->Line(10,130,280,130);
$pdf->Ln(8);
$pdf->Cell(10,5,'Sr. ',0,0);
$pdf->Cell(100,5,'Product    ',0,0);
$pdf->Cell(30,5,'Gross Amount ',0,0);
$pdf->Cell(30,5,'Tax ',0,0);
$pdf->Cell(30,5,'Total ',0,0);

$pdf->Ln(15);
$pdf->Cell(10,5,'1. ',0,0);
$pdf->MultiCell(100,5,''.$trans_prod_info,0,0);
$pdf->Ln(20);
$pdf->Cell(110,5,'',0,0);
$pdf->Cell(30,5,''.$trans_amount,0,0);
$pdf->Cell(30,5,'0 ',0,0);
$pdf->Cell(30,5,' '.$trans_amount,0,0);

$pdf->Line(10,160,280,160);

$pdf->Ln(30);
$pdf->Cell(10,5,' ',0,0);
$pdf->Cell(70,5,'    ',0,0);
$pdf->Cell(30,5,' ',0,0);
$pdf->Cell(30,5,' ',0,0);
$pdf->Cell(30,5,'Grand Total : ',0,0);
$pdf->Cell(30,5,'Rs.'.$trans_amount,0,0);
$pdf->Ln(20);
$pdf->Cell(30,5,'Authorized Signatory',0,0);
$pdf->Image('img/sign.png',20,195,-150); 

$pdf->Ln(8);
$pdf->Line(10,190,280,190);
$pdf->Ln(10);

$pdf->Output();

}
?>