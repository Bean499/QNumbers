<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if(!isset($_POST["qNumber"])) {
    header("Location: ru.html?error=NoSubmit");
    exit();
}

require "../dbaccess.php";

$qNumber = ucfirst($_POST["qNumber"]);
$type = $_POST["Type"];
$ReturnNumber = $_POST["ReturnNumber"];
$DefectCode = $_POST["DefectCode"];
$status = $_POST["Status"];
$QuantityAccepted = $_POST["QuantityAccepted"];
$QuantityRejected = $_POST["QuantityRejected"];
$TotalQuantity = $QuantityAccepted + $QuantityRejected;
$RejectNote = $_POST["RejectNote"];
$DebitNote = $_POST["DebitNote"];
$ClaimValue = $_POST["ClaimValue"];
$ScrapDate = $_POST["ScrapDate"];
$Notes = $_POST["Notes"];

$sql = "SELECT * FROM main WHERE QNumber = ?";
$stmt = mysqli_stmt_init($conn);

mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "s", $qNumber);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$results = mysqli_fetch_assoc($result);

$sql = "SELECT * FROM ru WHERE QNumber = ?";
$stmt = mysqli_stmt_init($conn);

mysqli_stmt_prepare($stmt,$sql);
mysqli_stmt_bind_param($stmt, "s", $qNumber);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
$numRU = mysqli_stmt_num_rows($stmt);

if ($numRU===0) {
    $sql = "INSERT INTO ru (QNumber, PartNumber, DrawingNumber, Originator, Customer, SerialNumber, SalesNumber, Description, DateAdded, Type, ReturnNumber, DefectCode, Status, TotalQuantity, QuantityAccepted, QuantityRejected, RejectNote, DebitNote, ClaimValue, ScrapDate, Notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "sssssssssssssiiisssss", $qNumber, $results["PartNumber"], $results["DrawingNumber"], $results["Originator"], $results["Customer"], $results["SerialNumber"], $results["SalesNumber"], $results["Description"], $results["DateAdded"], $type, $ReturnNumber, $DefectCode, $status, $TotalQuantity, $QuantityAccepted, $QuantityRejected, $RejectNote, $DebitNote, $ClaimValue, $ScrapDate, $Notes);
    $check = mysqli_stmt_execute($stmt);

    if ($check === FALSE) {
        echo("Failed to create RU entry.");
    }
    else {
        echo("RU entry created successfully.");
    }
    die();
    exit();
}
else {
    $sql = "UPDATE ru SET Type = ?, ReturnNumber = ?, DefectCode = ?, Status = ?, TotalQuantity = ?, QuantityAccepted = ?, QuantityRejected = ?, RejectNote = ?, DebitNote = ?, ClaimValue = ?, ScrapDate = ?, Notes = ? WHERE QNumber = ?";
    $stmt = mysqli_stmt_init($conn);

    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt, "ssssiiissss", $ClosingDate, $Supplier1, $Quoted1, $Supplier2, $Quoted2, $Supplier3, $Quoted3, $qNumber);
    $check = mysqli_stmt_execute($stmt);

    if ($check === FALSE) {
        echo("Failed to update RU entry.");
    }
    else {
        echo("RU entry updated successfully.");
    }
    die();
    exit();
}