<?php
session_start();
require_once 'config.php';

$searchTerm = mysqli_real_escape_string($conn, $_POST['searchTerm']);
$outgoing_id = $_SESSION['reference_id'];

$sql = mysqli_query($conn, "SELECT * FROM users WHERE (fname LIKE '%{$searchTerm}%' OR lname LIKE '%{$searchTerm}%') AND reference_id != $outgoing_id");

$output = "";

if (mysqli_num_rows($sql) == 0) {
    $output .= "No users are available to chat";
} elseif (mysqli_num_rows($sql) > 0) {
    include_once 'data.php';
}

echo $output;