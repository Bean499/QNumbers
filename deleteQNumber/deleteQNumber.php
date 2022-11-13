<?php

if(!isset($_POST["QNumber"])) {
    header("Location: index.html?error=NoSubmit");
    exit();
}

require "../dbaccess.php";

$QNumber = $_POST["qNumber"];



$sql = "UPDATE main SET PartNumber = ?, RU = ?, CU = ?, 8D = ?, CN = ?, ECNDR = ?, ISIR = ?, PSW = ?, ELV = ?, RFQ = ?, NPI = ?, CofC = ?, TestCert = ?, Concession = ?, DesignReview = ?, StockFreeze = ?, RejectNote = ?, StopNote = ?, QualityAlert = ?, DebitNote = ?, ASME = ?, PR = ?, Other = ?, DrawingNumber = ?, Description = ?, Originator = ?, Customer = ?, SalesNumber = ?, SerialNumber = ? WHERE QNumber = ?";
$stmt = mysqli_stmt_init($conn);

mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "siiiiiiiiiiiiiiiiiiiiiisssssss", "", 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, " ", " ", " ", " ", " ", " ", $QNumber);
 
$check = mysqli_stmt_execute($stmt);

if ($check === FALSE) {
    echo("Failed to delete Q Number from main table. ");
}
else {
    echo ($QNumber." successfully deleted from main table. ");

	$sql = "DELETE FROM 8d WHERE QNumber = ?";
	$stmt = mysqli_stmt_init($conn);
	mysqli_stmt_prepare($stmt, $sql);
	mysqli_stmt_bind_param($stmt,"s", $QNumber);
	$check = mysqli_stmt_execute($stmt);

	if ($check === FALSE) {
		echo("Failed to delete Q Number from 8D table. ");
	}
	else {
		echo ($QNumber." successfully deleted from 8D table. ");
	}

	$sql = "DELETE FROM cn WHERE QNumber = ?";
	$stmt = mysqli_stmt_init($conn);
	mysqli_stmt_prepare($stmt, $sql);
	mysqli_stmt_bind_param($stmt,"s", $QNumber);
	$check = mysqli_stmt_execute($stmt);

	if ($check === FALSE) {
		echo("Failed to delete Q Number from CN table. ");
	}
	else {
		echo ($QNumber." successfully deletedfrom CN table. ");
	}

	$sql = "DELETE FROM rfq WHERE QNumber = ?";
	$stmt = mysqli_stmt_init($conn);
	mysqli_stmt_prepare($stmt, $sql);
	mysqli_stmt_bind_param($stmt,"s", $QNumber);
	$check = mysqli_stmt_execute($stmt);

	if ($check === FALSE) {
		echo("Failed to delete Q Number from RFQ table. ");
	}
	else {
		echo ($QNumber." successfully deletedfrom RFQ table. ");
	}

	$sql = "DELETE FROM RU WHERE QNumber = ?";
	$stmt = mysqli_stmt_init($conn);
	mysqli_stmt_prepare($stmt, $sql);
	mysqli_stmt_bind_param($stmt,"s", $QNumber);
	$check = mysqli_stmt_execute($stmt);

	if ($check === FALSE) {
		echo("Failed to delete Q Number from RU table. ");
	}
	else {
		echo ($QNumber." successfully deletedfrom RU table. ");
	}

}

die();
exit();
