<?
include "../AMframe/config.php";
include "../AMframe/jengen-pdfheader.php";

$GetFile = file("view/cusreport.html") ;
$Content = join(" ",$GetFile) ;

$id = isset($id)?$id:'';

$GetPlat = $db->singlerec("select * from platbook where id='$id'");
$plat_id = $GetPlat['plat_id'];
$cust_name = ucwords($GetPlat['cust_name']);
$cust_mobile_1 = $GetPlat['cust_mobile_1'];
$cust_mobile_2 = ",".$GetPlat['cust_mobile_2'];
$cust_email = $GetPlat['cust_email'];
$cust_address = $GetPlat['cust_address'];

$GetPlatDetails = $db->singlerec("select * from plat where id='$plat_id'");
$name = $GetPlatDetails['name'];
$plat_sqpt = $GetPlatDetails['sqpt'];
$area_auto_id = $GetPlatDetails['area_auto_id'];
$GetArea = $db->singlerec("select area_name from area where area_auto_id='$area_auto_id'");
$area = ucwords($GetArea['area_name']);

$Get_Plat = $db->singlerec("select * from platbook where plat_id='$plat_id' order by id desc");
$invoice_no = $Get_Plat['id'];
$pay_mode = $Get_Plat['pay_mode'];
$paid_amount = $Get_Plat['paid_amount'];
$balance_amount = $Get_Plat['balance_amount'];
$total_amount = $Get_Plat['total_amount'];
$crcdt = $Get_Plat['crcdt'];
$crcdt = date("d/m/Y",$crcdt);
$DispDetails ="<tr>
			<td align='center'>$crcdt</td>
			<td align='center'>$pay_mode</td>
			<td align='center'>$paid_amount</td>
			<td align='center'>$balance_amount</td>
		</tr>";

$CnrtDate = date("d/m/Y");

$Content = preg_replace("/{{(.*?)}}/e","$$1",$Content);
//echo $Content;
//exit;

$pdf->AddPage();
$PdfContent = <<<EOF
        $Content
EOF;

$pdf->writeHTML($PdfContent, true, false, true, false, $align='center');
$pdf->Output("$CnrtDate $invoice_no.pdf", "D");
?>