<?php

session_start();

include_once "config.php";


if (isset($_SESSION['reference_id'])) {
    $outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
    $incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_id']);
    $output = "";

    $sql = "SELECT * FROM messages LEFT JOIN users ON users.reference_id = messages.outgoing_id WHERE ( outgoing_id = $outgoing_id AND incoming_id = $incoming_id ) OR (outgoing_id = $incoming_id  AND incoming_id = $outgoing_id) ORDER BY msg_id ";

    $query = mysqli_query($conn, $sql);

    if (mysqli_num_rows($query) > 0) {

        while ($row = mysqli_fetch_assoc($query)) {
            // sender 
            if ($row['outgoing_id'] === $incoming_id) {
                $output .= '
            <div class="chat outgoing">
            <div class="details">
            <p>' . $row['msg'] . '</p>
            </div>
            </div>
            ';
            } else {
                $output .= '
                <div class="chat incoming">
                <img src="backend/images/' . $row['img'] . '" />
                <div class="details">
                <p>' . $row['msg'] . '</p>
                </div>
                </div>
                ';
            }
        }

        echo $output;
    }






}