<?php

mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

if(!isset($_POST["qNumber"])) {
    header("Location: CN.html?error=NoSubmit");
    exit();
}

require "../dbaccess.php";

$qNumber = ucfirst($_POST["qNumber"]);
$DateClosed = $_POST["DateClosed"];
$ClosedBy = $_POST["ClosedBy"];

$sql = "SELECT * FROM main WHERE QNumber = ?";
$stmt = mysqli_stmt_init($conn);

mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "s", $qNumber);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$results = mysqli_fetch_assoc($result);

$dateA = strtotime($DateClosed);
$dateB = strtotime($results["DateAdded"]);
$datediff = $dateA - $dateB;
$LiveDays = abs(round($datediff / (60 * 60 * 24)));

$sql = "SELECT * FROM cn WHERE QNumber = ?";
$stmt = mysqli_stmt_init($conn);

mysqli_stmt_prepare($stmt,$sql);
mysqli_stmt_bind_param($stmt, "s", $qNumber);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
$numCN = mysqli_stmt_num_rows($stmt);

if ($numCN === 0) {
    $sql = "INSERT INTO CN (QNumber, PartNumber, DrawingNumber, Originator, Customer, SerialNumber, SalesNumber, Description, DateAdded, DateClosed, LiveDays, ClosedBy) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);

    mysqli_stmt_prepare($stmt, $sql);
    mysqli_stmt_bind_param($stmt, "ssssssssssis", $qNumber, $results["PartNumber"], $results["DrawingNumber"], $results["Originator"], $results["Customer"], $results["SerialNumber"], $results["SalesNumber"], $results["Description"], $results["DateAdded"], $DateClosed, $LiveDays, $ClosedBy);

    $check = mysqli_stmt_execute($stmt);

    if ($check === FALSE) {
        echo("Failed to create CN entry.");
    }
    else {
        echo("CN entry created successfully.");
    }
    die();
    exit();
}
else {
    $sql = "UPDATE cn SET DateClosed = ?, LiveDays = ?, ClosedBy = ? WHERE QNumber = ?";
    $stmt = mysqli_stmt_init($conn);

    mysqli_stmt_prepare($stmt,$sql);
    mysqli_stmt_bind_param($stmt, "siss", $DateClosed, $LiveDays, $ClosedBy, $qNumber);
    $check = mysqli_stmt_execute($stmt);

    if ($check === FALSE) {
        echo("Failed to update CN entry.");
    }
    else {
        echo("CN entry updated successfully.");
    }
    die();
    exit();
}