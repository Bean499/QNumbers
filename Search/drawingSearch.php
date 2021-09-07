<?php

if(!isset($_POST["drawingNumber"])) {
    header("Location: search.html?error=NoSubmit");
    exit();
}

require "../dbaccess.php";

$drawingNumber = $_POST["drawingNumber"];

$sql = "SELECT QNumber FROM main WHERE drawingNumber = ?";

$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt,"s", $drawingNumber);
mysqli_stmt_execute($stmt);

mysqli_stmt_bind_result($stmt,$output);
mysqli_stmt_store_result($stmt);
while (mysqli_stmt_fetch($stmt)) {
    echo $output;
    echo " | ";
}

exit();