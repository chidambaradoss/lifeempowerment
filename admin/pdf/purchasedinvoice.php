<?
include "../AMframe/config.php";
include "../AMframe/jengen-pdfheader.php";

$GetFile = file("view/purchasedinvoice.html") ;
$Content = join(" ",$GetFile) ;

$id = isset($id)?$id:'';

$CnrtDate = date("d/m/Y");

$Content = preg_replace("/{{(.*?)}}/e","$$1",$Content);
//echo $Content;
//exit;

$pdf->AddPage();
$PdfContent = <<<EOF
        $Content
EOF;

$pdf->writeHTML($PdfContent, true, false, true, false, $align='center');
$pdf->Output("$CnrtDate.pdf", "D");
?>