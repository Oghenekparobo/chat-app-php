<?php

session_start();

include_once "config.php";

$email = mysqli_real_escape_string($conn, $_POST['email']);
$password = mysqli_real_escape_string($conn, $_POST['password']);




if (!empty($email) && !empty($password)) {
    // validate the email
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // check if email is registered
        $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' ");

        // if email already exists
        if (mysqli_num_rows($sql) > 0) {
            $row = mysqli_fetch_assoc($sql);

            $dbpassword = $row['password'];

            if (password_verify($password, $dbpassword)) {

                // update this line
                $_SESSION['reference_id'] = $row['reference_id'];
                echo 'success';

            } else {
                echo "Incorrect password";
            }

        } else {
            echo "This user does not exist!";
        }

    } else {
        echo "email or password is incorrect";
    }
} else {
    echo 'invalid inputs';
}