<?php

if(!isset($_POST["qNumber"])) {
    header("Location: ru.html?error=NoSubmit");
    exit();
}

require "../dbaccess.php";

$RU = 1;
$qNumber = $_POST["qNumber"];

$sql = "SELECT * FROM main WHERE RU = ? AND QNumber = ?";
$stmt = mysqli_stmt_init($conn);

mysqli_stmt_prepare($stmt, $sql);

mysqli_stmt_bind_param($stmt,"is",$RU, $qNumber);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
$EntryNumber = (string) mysqli_stmt_num_rows($stmt);

echo($EntryNumber);
exit();