<?php

session_start();

include_once "config.php";


if (isset($_SESSION['reference_id'])) {
    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    if (!empty($message)) {
        $sql = mysqli_query($conn, "INSERT INTO messages (outgoing_id , incoming_id , msg) VALUES('$outgoing_id' , '$incoming_id ', '$message')");
    }


}