<?php

if(!isset($_POST["qNumber"])) {
    header("Location: rfq.html?error=NoSubmit");
    exit();
}

require "../dbaccess.php";

$qNumber = $_POST["qNumber"];

$sql = "SELECT * FROM rfq WHERE QNumber = ?";
$stmt = mysqli_stmt_init($conn);

mysqli_stmt_prepare($stmt, $sql);

mysqli_stmt_bind_param($stmt,"s", $qNumber);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
$EntryNumber = mysqli_stmt_num_rows($stmt);

echo($EntryNumber);
exit();