<?php

if (isset($_GET["class"]) && isset($_GET['day'])) {
    $class = $_GET['class']; // fy_it, fy_bms
    $day = $_GET['day']; // 1, 2, 3
} else {
    exit(header("include/error.php"));
}

include_once "include/dbconn.php";
$query = "SELECT * FROM $class WHERE week='$day'";
$result = mysqli_query($conn, $query);
if (!$result) {
    exit(header("include/error.php"));
}

$json_array = array();
while ($row = mysqli_fetch_assoc($result)) {
    $json_array = $row;
}
echo json_encode($json_array);
