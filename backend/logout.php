<?php
echo 'hi';
session_start();
require_once 'config.php';
// if user is loggged in
if (isset($_SESSION['reference_id'])) {
    $logout_id = mysqli_real_escape_string($conn, $_GET['user_id']);

    if (isset($logout_id)) {
        $status = 'offline';

        $sql = mysqli_query($conn, "UPDATE SET status = '$status' WHERE reference_id = $logout_id");

        if ($sql) {
            session_unset();
            session_destroy();
            header('location: ../login.php');
        } else {
            header('location: ../users.php');
        }
    } else {
        header('location: ../login.php');
    }
}