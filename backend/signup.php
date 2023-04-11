<?php
session_start();

include_once "config.php";



$fname = mysqli_real_escape_string($conn, $_POST['fname']);

$lname = mysqli_real_escape_string($conn, $_POST['lname']);

$email = mysqli_real_escape_string($conn, $_POST['email']);

$password = mysqli_real_escape_string($conn, $_POST['password']);

// hash password
$password = password_hash($password, PASSWORD_BCRYPT, array('cost' => 5));

if (!empty($fname) && !empty($lname) && !empty($email) && !empty($password)) {
    // validate the e0mail
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // check if email already exists in the database
        $sql = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email' ");

        // if email already exists
        if (mysqli_num_rows($sql) > 0) {
            echo "$email - this email already exist!";
        } else {
            // check if a file was uploaded]
            if (!empty($_FILES['image']['name'])) {
                $img_name = $_FILES['image']['name'];
                $img_type = $_FILES['image']['type'];

                $tmp_name = $_FILES['image']['tmp_name'];


                // get the extension in the image name
                $img_explode = explode('.', $img_name);
                $img_ext = end($img_explode); // get the end of the file name

                $extensions = ['png', 'jpeg', 'jpg']; //valid ext


                // check if the file uploaded is a vlid file

                if (in_array($img_ext, $extensions)) {
                    // timestamp
                    $time = time();
                    // image uploade wih timestamp
                    $new_img_name = $time . $img_name;
                    // move user uploaded image to ur folder
                    if (move_uploaded_file($tmp_name, "images/" . $new_img_name)) {
                        $status = 'active now'; //once a user signs in the status is active
                        $reference_id = rand(time(), 100000);

                        // insert data inside table
                        $sql2 = mysqli_query($conn, "INSERT into users (reference_id , fname , lname , email , password ,img ,  status) VALUES('$reference_id' , '$fname' , '$lname' , '$email' , '$password' , '$new_img_name' , '$status' )");

                        if ($sql2) {
                            $sql3 = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

                            if (mysqli_num_rows($sql3) > 0) {

                                $row = mysqli_fetch_assoc($sql3);
                                $_SESSION['reference_id'] = $row['reference_id'];
                                echo 'success';
                                // var_dump($row);

                            }

                        }



                    }

                } else {
                    echo "please select a valid file -'png', 'jpeg', 'jpg' ";
                }


            } else {
                echo "Please select an image";
            }


        }


    } else {
        echo "invalid email";
    }
} else {
    echo 'invalid inputs';
}