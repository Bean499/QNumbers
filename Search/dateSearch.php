<?php

if(!isset($_POST["rangeStart"])) {
    header("Location: search.html?error=NoSubmit");
    exit();
}

require "../dbaccess.php";

$rangeStart = $_POST["rangeStart"];
$rangeEnd = $_POST["rangeEnd"];

$sql = "SELECT QNumber FROM main WHERE DateAdded <= ? AND DateAdded >= ?";

$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt,"ss", $rangeEnd, $rangeStart);
mysqli_stmt_execute($stmt);

mysqli_stmt_bind_result($stmt,$output);
mysqli_stmt_store_result($stmt);
while (mysqli_stmt_fetch($stmt)) {
    echo $output;
    echo " | ";
}

exit();