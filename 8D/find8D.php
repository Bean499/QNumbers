<?php

if(!isset($_POST["qNumber"])) {
    header("Location: 8D.html?error=NoSubmit");
    exit();
}

require "../dbaccess.php";

$RFQ = 1;
$qNumber = $_POST["qNumber"];

$sql = "SELECT * FROM main WHERE 8D = ? AND QNumber = ?";
$stmt = mysqli_stmt_init($conn);

mysqli_stmt_prepare($stmt, $sql);

mysqli_stmt_bind_param($stmt,"is",$RFQ, $qNumber);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
$EntryNumber = mysqli_stmt_num_rows($stmt);

echo($EntryNumber);
exit();