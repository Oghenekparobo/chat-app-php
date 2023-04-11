<?php

$conn = mysqli_connect("localhost", "root", "", "chat");

if (!$conn) {
    die('database connection failed' . mysqli_connect_error());
}