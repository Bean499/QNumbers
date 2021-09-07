<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if(!isset($_POST["CurrentYear"])) {
    header("Location: index.html?error=NoSubmit");
    exit();
}

require "dbaccess.php";

$PartNumber = $_POST["PartNumber"];     //Storing posted values
$DrawingNumber = $_POST["DrawingNumber"];
$Originator = $_POST["Originator"];
$Customer = $_POST["Customer"];
$Description = $_POST["Description"];
$RU = $_POST["RU"];
$CU = $_POST["CU"];
$D8 = $_POST["D8"];
$CN = $_POST["CN"];
$ECNDR = $_POST["ECNDR"];
$ISIR = $_POST["ISIR"];
$PSW = $_POST["PSW"];
$ELV = $_POST["ELV"];
$RFQ = $_POST["RFQ"];
$NPI = $_POST["NPI"];
$CofC = $_POST["CofC"];
$TestCert = $_POST["TestCert"];
$Concession = $_POST["Concession"];
$DesignReview = $_POST["DesignReview"];
$StockFreeze = $_POST["StockFreeze"];
$RejectNote = $_POST["RejectNote"];
$StopNote = $_POST["StopNote"];
$QualityAlert = $_POST["QualityAlert"];
$DebitNote = $_POST["DebitNote"];
$ASME = $_POST["ASME"];
$Other = $_POST["Other"];
$SalesNumber = $_POST["SalesNumber"];
$SerialNumber = $_POST["SerialNumber"];

$Date = $_POST["Date"];
$CurrentYear = $_POST["CurrentYear"];
$ShortYear = $CurrentYear[2].$CurrentYear[3];

$sql = "SELECT * FROM main WHERE YEAR(DateAdded) = ?";
$stmt = mysqli_stmt_init($conn);

if(!mysqli_stmt_prepare($stmt, $sql)){
    header("Location: index.html?error=SQLError");
    exit();
}

mysqli_stmt_bind_param($stmt, "s", $CurrentYear); //This copies in the year to find
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
$EntryNumber = mysqli_stmt_num_rows($stmt);

$EntryNumber = (string) $EntryNumber;
while (strlen($EntryNumber) < 5) {
    $EntryNumber = "0".$EntryNumber;
}

$QNumber = "Q".$ShortYear."-".$EntryNumber;



$sql = "INSERT INTO main (QNumber, PartNumber, DateAdded, RU, CU, 8D, CN, ECNDR, ISIR, PSW, ELV, RFQ, NPI, CofC, TestCert, Concession, DesignReview, StockFreeze, RejectNote, StopNote, QualityAlert, DebitNote, ASME, Other, DrawingNumber, Description, Originator, Customer, SalesNumber, SerialNumber) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
$stmt = mysqli_stmt_init($conn);

mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "sssiiiiiiiiiiiiiiiiiiiiissssss", $QNumber, $PartNumber, $Date, $RU, $CU, $D8, $CN, $ECNDR, $ISIR, $PSW, $ELV, $RFQ, $NPI, $CofC, $TestCert, $Concession, $DesignReview, $StockFreeze, $RejectNote, $StopNote, $QualityAlert, $DebitNote, $ASME, $Other, $DrawingNumber, $Description, $Originator, $Customer, $SalesNumber, $SerialNumber);

$check = mysqli_stmt_execute($stmt);

if ($check === FALSE) {
    echo("Failed to create Q Number.");

}
else {
    echo ($QNumber." successfully created.");
}

$year = substr($QNumber,0,3);   //Q21-00000
$hundred = substr($QNumber,0,7)."00";   //Q21-12300
//Q21-12345

$directory = "qnumbers/".$year."/".$hundred."/"."/".$QNumber;
mkdir($directory,0777,true);

die();
exit();


