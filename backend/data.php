<?php

while ($row = mysqli_fetch_assoc($sql)) {
     $sql2 = "SELECT * FROM messages WHERE (incoming_id = {$row['reference_id']} OR outgoing_id = {$row['reference_id']} ) AND (outgoing_id = $outgoing_id OR outgoing_id = $outgoing_id) ORDER BY msg_id DESC LIMIT 1";



     $query2 = mysqli_query($conn, $sql2);
     $row2 = mysqli_fetch_assoc($query2);

     if (mysqli_num_rows($query2) > 0) {
          $result = $row2['msg'];
     } else {

          $result = "no messages available";
     }

     // trimming messags if words are more than 28
     strlen($result) > 28 ? $msg = substr($result, 0, 28) . '...' : $msg = $result;
     //  adding you: before message text
     $outgoing_id == $row2['outgoing_id'] ? $you = 'you: ' : $you = "";
     // check if user is offline
     $row['status'] == 'offline' ? $offline = 'offline' : $offline = '';
     $output .=
          '
       <a href="chat.php?user_id=' . $row['reference_id'] . '">
       <div class="content">
         <img src="backend/images/' . $row['img'] . '" alt="" />
            <div class="details">
                <span>' . $row['fname'] . ' ' . $row['lname'] . '</span>
                   <p>' . $you . $msg . '</p>
                        </div>
                           <div class="status-dot' . $offline . '">
                                <i class="fas fa-circle"></i>
                                       </div>
                                            </div>
     </a>
     
     ';
}
;