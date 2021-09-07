<?php

if(!isset($_POST["QNumber"])) {
    header("Location: index.html?error=NoSubmit");
    exit();
}

require "../dbaccess.php";

$QNumber = $_POST["QNumber"];
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



$sql = "UPDATE main SET PartNumber = ?, RU = ?, CU = ?, 8D = ?, CN = ?, ECNDR = ?, ISIR = ?, PSW = ?, ELV = ?, RFQ = ?, NPI = ?, CofC = ?, TestCert = ?, Concession = ?, DesignReview = ?, StockFreeze = ?, RejectNote = ?, StopNote = ?, QualityAlert = ?, DebitNote = ?, ASME = ?, Other = ?, DrawingNumber = ?, Description = ?, Originator = ?, Customer = ?, SalesNumber = ?, SerialNumber = ? WHERE QNumber = ?";
$stmt = mysqli_stmt_init($conn);

mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "siiiiiiiiiiiiiiiiiiiiisssssss", $PartNumber, $RU, $CU, $D8, $CN, $ECNDR, $ISIR, $PSW, $ELV, $RFQ, $NPI, $CofC, $TestCert, $Concession, $DesignReview, $StockFreeze, $RejectNote, $StopNote, $QualityAlert, $DebitNote, $ASME, $Other, $DrawingNumber, $Description, $Originator, $Customer, $SalesNumber, $SerialNumber, $QNumber);

$check = mysqli_stmt_execute($stmt);

if ($check === FALSE) {
    echo("Failed to update Q Number.");

}
else {
    echo ($QNumber." successfully updated.");
}

die();
exit();


