<?php

# Logo
$pdf->Image('sysfrm/uploads/system/logo.png',10,15,35);


# Company Details
$pdf->SetFont('freesans','',13);
$address = str_replace('<br>',',',$config['caddress']);
$companyaddress = explode(',',$address);
//$tags = explode(',',$string);



$pdf->Cell(0,6,$companyaddress[0],0,1,'R');
$pdf->SetFont('freesans','',9);
foreach($companyaddress as $key) {
    if($companyaddress[0] != $key){
        $pdf->Cell(0,4,trim($key),0,1,'R');
    }

}
$pdf->Ln(5);

# Header Bar
$invoiceprefix = 'INV ';
$invoicenum = $d['id'];

$pdf->SetFont('freesans','B',15);
$pdf->SetFillColor(239);
$pdf->Cell(0,8,$invoiceprefix.$invoicenum,0,1,'L','1');
$pdf->SetFont('freesans','',10);
$pdf->Cell(0,6,'Date Created'.': '.date("M d Y", strtotime($d['date'])).'',0,1,'L','1');
$pdf->Cell(0,6,'Due On'.': '.date("M d Y", strtotime($d['duedate'])).'',0,1,'L','1');
$pdf->Ln(10);
//$startpage = $pdf->GetPage();
$startpage = $pdf->GetPage();
$addressypos = $pdf->GetY();
# Clients Details
$pdf->SetFont('freesans','B',10);
$pdf->Cell(0,4,'To',0,1);
$pdf->SetFont('freesans','',9);
$pdf->Cell(0,4,$d['account'],0,1,'L');
$pdf->Cell(0,4,'ATTN'.": ".$d['account'],0,1,'L');
$pdf->Cell(0,4,$a["address"],0,1,'L');
$pdf->Cell(0,4,$a["city"].", ".$a["state"].", ".$a["zip"],0,1,'L');
$pdf->Cell(0,4,$a["country"],0,1,'L');
$pdf->Ln(10);

# Invoice Items
$tblhtml = '<table width="100%" bgcolor="#ccc" cellspacing="1" cellpadding="2" border="0">
    <tr height="30" bgcolor="#efefef" style="font-weight:bold;text-align:center;">
        <td width="70%">Item</td>
        <td width="10%">Price</td>
        <td width="10%">Qty</td>
        <td width="10%">Total</td>
    </tr>';
foreach ($items as $item) {
    $tblhtml .= '
    <tr bgcolor="#fff">
        <td align="left">'.nl2br($item['description']).'<br /></td>
        <td align="center">'.$item['amount'].'</td>
        <td align="center">'.$item['amount'].'</td>
        <td align="center">'.$item['amount'].'</td>
    </tr>';
}
$tblhtml .= '
    <tr height="30" bgcolor="#efefef" style="font-weight:bold;">
        <td align="right" colspan="3">Total</td>
        <td align="center">Sub Total</td>
    </tr>';
if (($d['tax']) != '0.00') $tblhtml .= '
    <tr height="30" bgcolor="#efefef" style="font-weight:bold;">
        <td align="right" colspan="3">'.$d['taxrate'].'% '.$d['taxname'].'</td>
        <td align="center">'.$d['tax'].'</td>
    </tr>';
$tblhtml .= '
    <tr height="30" bgcolor="#efefef" style="font-weight:bold;">
        <td align="right" colspan="3">Credit</td>
        <td align="center">500</td>
    </tr>
    <tr height="30" bgcolor="#efefef" style="font-weight:bold;">
        <td align="right" colspan="3">Total</td>
        <td align="center">630</td>
    </tr>
</table>';

$pdf->writeHTML($tblhtml, true, false, false, false, '');

$pdf->Ln(5);

//# Transactions
//$pdf->SetFont('freesans','B',12);
//$pdf->Cell(0,4,'Transactions',0,1);
//
//$pdf->Ln(5);
//
//$pdf->SetFont('freesans','',9);
//
//$tblhtml = '<table width="100%" bgcolor="#ccc" cellspacing="1" cellpadding="2" border="0">
//    <tr height="30" bgcolor="#efefef" style="font-weight:bold;text-align:center;">
//        <td width="25%">'.$_LANG['invoicestransdate'].'</td>
//        <td width="25%">'.$_LANG['invoicestransgateway'].'</td>
//        <td width="30%">'.$_LANG['invoicestransid'].'</td>
//        <td width="20%">'.$_LANG['invoicestransamount'].'</td>
//    </tr>';
//
//if (!count($transactions)) {
//    $tblhtml .= '
//    <tr bgcolor="#fff">
//        <td colspan="4" align="center">'.$_LANG['invoicestransnonefound'].'</td>
//    </tr>';
//} else {
//    foreach ($transactions AS $trans) {
//        $tblhtml .= '
//        <tr bgcolor="#fff">
//            <td align="center">'.$trans['date'].'</td>
//            <td align="center">'.$trans['gateway'].'</td>
//            <td align="center">'.$trans['transid'].'</td>
//            <td align="center">'.$trans['amount'].'</td>
//        </tr>';
//    }
//}
//$tblhtml .= '
//    <tr height="30" bgcolor="#efefef" style="font-weight:bold;">
//        <td colspan="3" align="right">'.$_LANG['invoicesbalance'].'</td>
//        <td align="center">'.$balance.'</td>
//    </tr>
//</table>';



# Notes
if (($d['notes']) != '') {
    $pdf->Ln(5);
    $pdf->SetFont('freesans','',8);
    $pdf->MultiCell(170,5,'Notes'.": ".$d['notes']);
}

# Generation Date
$pdf->SetFont('freesans','',8);
$pdf->Ln(5);
$pdf->Cell(180,4,'PDF Generated on 14/11/2014 '.date("M d Y", time()),'','','C');
$endpage = $pdf->GetPage();
$pdf->setPage($startpage);
# Payment Status
$status = $d['status'];
//$endpage = $pdf->GetPage();
//$pdf->setPage($startpage);
$pdf->SetXY(85,$addressypos);
if ($status=="Cancelled") {
    $statustext = 'Cancelled';
    $pdf->SetTextColor(245,245,245);
} elseif ($status=="Unpaid") {
    $statustext = 'Unpaid';
    $pdf->SetTextColor(204,0,0);
} elseif ($status=="Paid") {
    $statustext = 'Paid';
    $pdf->SetTextColor(153,204,0);
} elseif ($status=="Refunded") {
    $statustext = 'Refunded';
    $pdf->SetTextColor(34,68,136);
} elseif ($status=="Collections") {
    $statustext = 'Collections';
    $pdf->SetTextColor(255,204,0);
}
$pdf->SetFont('freesans','B',40);
$pdf->Cell(110,20,strtoupper($statustext),0,0,'C');