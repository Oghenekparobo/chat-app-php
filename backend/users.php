<?php

session_start();
require_once 'config.php';

$outgoing_id = $_SESSION['reference_id'];

$sql = mysqli_query($conn, "SELECT * FROM users WHERE reference_id != $outgoing_id");

$output = "";

if (mysqli_num_rows($sql) == 0) {
    $output .= "No users are available to chat";
} elseif (mysqli_num_rows($sql) > 0) {
    include_once 'data.php';
}

echo $output;