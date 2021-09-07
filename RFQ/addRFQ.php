<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if(!isset($_POST["qNumber"])) {
    header("Location: rfq.html?error=NoSubmit");
    exit();
}

require "../dbaccess.php";

$qNumber = ucfirst($_POST["qNumber"]);
$ClosingDate = $_POST["ClosingDate"];
$Supplier1 = $_POST["Supplier1"];
$Quoted1 = $_POST["Quoted1"];
$Supplier2 = $_POST["Supplier2"];
$Quoted2 = $_POST["Quoted2"];
$Supplier3 = $_POST["Supplier3"];
$Quoted3 = $_POST["Quoted3"];

$sql = "SELECT * FROM main WHERE QNumber = ?";
$stmt = mysqli_stmt_init($conn);

mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "s", $qNumber);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$results = mysqli_fetch_assoc($result);

$sql = "SELECT * FROM rfq WHERE QNumber = ?";
$stmt = mysqli_stmt_init($conn);

mysqli_stmt_prepare($stmt,$sql);
mysqli_stmt_bind_param($stmt, "s", $qNumber);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
$numRFQ = mysqli_stmt_num_rows($stmt);

if ($numRFQ===0) {
    $sql = "INSERT INTO rfq (QNumber, PartNumber, DrawingNumber, Originator, Customer, SerialNumber, SalesNumber, Description, DateAdded, ClosingDate, Supplier1, Quoted1, Supplier2, Quoted2, Supplier3, Quoted3) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "sssssssssssisisi", $qNumber, $results["PartNumber"], $results["DrawingNumber"], $results["Originator"], $results["Customer"], $results["SerialNumber"], $results["SalesNumber"], $results["Description"], $results["DateAdded"], $ClosingDate, $Supplier1, $Quoted1, $Supplier2, $Quoted2, $Supplier3, $Quoted3);
    $check = mysqli_stmt_execute($stmt);

    if ($check === FALSE) {
        echo("Failed to create RFQ entry.");
    }
    else {
        echo("RFQ entry created successfully.");
    }
    die();
    exit();
}
else {
    $sql = "UPDATE rfq SET ClosingDate = ?, Supplier1 = ?, Quoted1 = ?, Supplier2 = ?, Quoted2 = ?, Supplier3 = ?, Quoted3 = ? WHERE QNumber = ?";
    $stmt = mysqli_stmt_init($conn);

    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt, "ssisisis", $ClosingDate, $Supplier1, $Quoted1, $Supplier2, $Quoted2, $Supplier3, $Quoted3, $qNumber);
    $check = mysqli_stmt_execute($stmt);

    if ($check === FALSE) {
        echo("Failed to update RFQ entry.");
    }
    else {
        echo("RFQ entry updated successfully.");
    }
    die();
    exit();
}