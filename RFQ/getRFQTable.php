<?php

if(!isset($_POST["a"])) {
    header("Location: tableview.html?error=NoSubmit");
    exit();
}

require "../dbaccess.php";

$sql = "SELECT * FROM rfq";

$stmt = mysqli_stmt_init($conn);
mysqli_stmt_prepare($stmt, $sql);
mysqli_stmt_execute($stmt);


$result = mysqli_stmt_get_result($stmt);
// $results = mysqli_fetch_assoc($result);
while($results = mysqli_fetch_assoc($result)){
    foreach($results as $item){
        echo($item);
        echo(" | ");
    }
    echo " % ";
}