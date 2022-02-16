<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if(!isset($_POST["qNumber"])) {
    header("Location: 8D.html?error=NoSubmit");
    exit();
}

require "../dbaccess.php";

$qNumber = ucfirst($_POST["qNumber"]);
$DateClosed = $_POST["DateClosed"];
$QuantityRejected = $_POST["QuantityRejected"];
$PRSSendDate = $_POST["PRSSendDate"];
$PRSReceived = $_POST["PRSReceived"];
$RejectNote = $_POST["RejectNote"];
$DefectCode = $_POST["DefectCode"];
$QualityConcern = $_POST["QualityConcern"];
$Status = $_POST["Status"];
$DebitNote = $_POST["DebitNote"];
$ScrapDate = $_POST["ScrapDate"];
$Notes = $_POST["Notes"];

$sql = "SELECT * FROM main WHERE QNumber = ?";
$stmt = mysqli_stmt_init($conn);

mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "s", $qNumber);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$results = mysqli_fetch_assoc($result);

$sql = "SELECT * FROM 8d WHERE QNumber = ?";
$stmt = mysqli_stmt_init($conn);

mysqli_stmt_prepare($stmt,$sql);
mysqli_stmt_bind_param($stmt, "s", $qNumber);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
$num8D = mysqli_stmt_num_rows($stmt);

$dateA = strtotime($DateClosed);
$dateB = strtotime($results["DateAdded"]);
$datediff = $dateA - $dateB;
$NetworkDays = abs(round($datediff / (60 * 60 * 24)));

if ($num8D===0) {
    $sql = "INSERT INTO 8d (QNumber, PartNumber, DrawingNumber, Originator, Customer, SerialNumber, SalesNumber, Description, DateAdded, DateClosed, NetworkDays, QuantityRejected, PRSSendDate, PRSReceived, RejectNote, DefectCode, QualityConcern, Status, DebitNote, ScrapDate, Notes) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssssiiissssssss", $qNumber, $results["PartNumber"], $results["DrawingNumber"], $results["Originator"], $results["Customer"], $results["SerialNumber"], $results["SalesNumber"], $results["Description"], $results["DateAdded"], $DateClosed, $NetworkDays, $QuantityRejected, $PRSSendDate, $PRSReceived, $RejectNote, $DefectCode, $QualityConcern, $Status, $DebitNote, $ScrapDate, $Notes);
    $check = mysqli_stmt_execute($stmt);

    if ($check === FALSE) {
        echo("Failed to create 8D entry.");
    }
    else {
        echo("8D entry created successfully.");
    }
    die();
    exit();
}
else {
    $sql = "UPDATE 8D SET DateClosed = ?, NetworkDays = ?, QuantityRejected = ?, PRSSendDate = ?, PRSReceived = ?, RejectNote = ?, DefectCode = ?, QualityConcern = ?, Status = ?, DebitNote = ?, ScrapDate = ?, Notes = ? WHERE QNumber = ?";
    $stmt = mysqli_stmt_init($conn);

    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt, "siissssssssss", $DateClosed, $NetworkDays, $QuantityRejected, $PRSSendDate, $PRSReceived, $RejectNote, $DefectCode, $QualityConcern, $Status, $DebitNote, $ScrapDate, $Notes, $qNumber);
    $check = mysqli_stmt_execute($stmt);

    if ($check === FALSE) {
        echo("Failed to update 8D entry.");
    }
    else {
        echo("8D entry updated successfully.");
    }
    die();
    exit();
}