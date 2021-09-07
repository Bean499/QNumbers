<?php

if(!isset($_POST["qNumber"])) {
    header("Location: cn.html?error=NoSubmit");
    exit();
}

require "../dbaccess.php";

$qNumber = $_POST["qNumber"];

$sql = "SELECT * FROM cn WHERE QNumber = ?";
$stmt = mysqli_stmt_init($conn);

mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_bind_param($stmt, "s", $qNumber);
mysqli_stmt_execute($stmt);
$result = mysqli_stmt_get_result($stmt);
$results = mysqli_fetch_assoc($result);

foreach($results as $item){
    echo($item);
    echo(" | ");
}
exit();